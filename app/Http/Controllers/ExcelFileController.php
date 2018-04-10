<?php

namespace App\Http\Controllers;

use App\ExcelFile;
use App\Repositories\ExcelFileRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExcelFileController extends Controller
{
    /**
     * The ExcelFile repository instance.
     */
    protected $excel_files;

    /**
     * Create a new controller instance.
     *
     * @param  ExcelFileRepository  $excel_files
     * @return void
     */
    public function __construct(ExcelFileRepository $excel_files)
    {
        $this->middleware('auth');
        $this->excel_files = $excel_files;
    }

    public function index()
    {
        $files = ExcelFile::all();
        return view('excel_files.index', compact('files'));
    }

    public function create()
    {
        return view('excel_files.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'import_file' => 'required'
        ]);

        try {
            $this->excel_files->importExcelFile($request);
            return redirect()->back();
        } catch (Exception $e) {
            /*return view('');*/
            return ['err' => $e->getMessage()];
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function activate($id)
    {
        try {

            $excel_file = ExcelFile::findOrFail($id);

            ExcelFile::all()->each(function ($item, $key){
                $item->is_active = 0;
                $item->save();
            });

            $excel_file->is_active = 1;
            $excel_file->save();

            return redirect()->back();

        } catch (Exception $e) {

        }
    }

    public function export($id)
    {
        $excel_file = ExcelFile::findOrFail($id);
        $this->excel_files->exportExcelFile($excel_file);
        return 'ok';
    }
}
