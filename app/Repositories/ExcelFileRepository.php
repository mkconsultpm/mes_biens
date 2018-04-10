<?php

namespace App\Repositories;

use App\ExcelFile;
use App\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ExcelFileRepository
{
    public function importExcelFile(Request $request)
    {
        try {
            if ($request->hasFile('import_file')) {
                $prospects = [];
                $valid_data = 0;

                $path = Input::file('import_file')->getRealPath();

                $data = Excel::load($path, function($reader) {
                })->get();

                if(!empty($data) && $data->count()){

                    foreach ($data as $key => $value) {
                        // check if data does not exist
                        /*$prospect = Prospect::all()->filter(function ($v, $k) use ($value) {
                            return $value->phone == $v->phone;
                        })->all();*/

                        if (!empty($value)) {
                            if ($value->phone) {

                                $pros = array_filter($prospects, function ($v, $k) use ($value) {
                                    return $v->phone == $value->phone;
                                }, ARRAY_FILTER_USE_BOTH);

                                if (empty($pros)) {

                                    $p = new Prospect();
                                    $p->first_name = $value->first_name;
                                    $p->last_name = $value->last_name;
                                    $p->information = $value->information;
                                    $p->phone = $value->phone;
                                    //$p->cin = '123';
                                    $p->status = 0;

                                    $prospects[] = $p;

                                    $valid_data++;

                                }
                            }
                        }

                        /*if (empty($prospect)) {
                            // insert data
                            $p = new Prospect();
                            $p->first_name = $value->first_name;
                            $p->last_name = $value->last_name;
                            $p->information = $value->information;
                            $p->phone = $value->phone;
                            $p->status = 0;

                            $prospects[] = $p;

                            $valid_data++;

                        }*/

                    }

                    // check if file contains valid data
                    if ($valid_data > 0) {

                        // save file
                        $file = $request->file('import_file')->store('excel_files');

                        $total_files = ExcelFile::all()->count() == 0;

                        $excel_file = ExcelFile::create([
                            'name' => $file,
                            'description' => 'Some description',
                            'data_count' => $valid_data,
                            'is_active' => $total_files ? 1 : 0
                        ]);

                        foreach ($prospects as $prosp) {
                            $prosp->excel_file_id = $excel_file->id;
                            $prosp->save();
                        }
                    } else {
                        Session::flash('message', 'Contenu du fichier non pris en compte');
                        return redirect()->back();
                    }
                }
            }
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    public function exportExcelFile($excel_file)
    {
        Excel::create($excel_file->name, function($excel) use ($excel_file) {

            $excel->sheet('Sheet1', function($sheet) use ($excel_file) {

                $prospects = Prospect::with('prospect_histories')
                    ->where('excel_file_id', '=', $excel_file->id)
                    ->get();
                $prospects_array = [];

                foreach ($prospects as $prospect) {
                    $prospects_array[] = $prospect->toArray();
                }

                //dd($prospects_array);

                $sheet->fromArray(
                    $prospects_array
                );

            });

        })->export('xls');
    }
}