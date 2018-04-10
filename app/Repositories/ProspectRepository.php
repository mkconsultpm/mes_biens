<?php

namespace App\Repositories;

use App\Prospect;
use Illuminate\Support\Facades\Session;
use function Psy\debug;

class ProspectRepository
{
    public function nextProspect()
    {
        try {
            $prospect = Prospect::whereHas('excel_file', function ($query){
                $query->where('is_active', '=', 1);
            })
                ->where('status', '=', 0)
                ->first();

            if (!empty($prospect)) {
                $prospect->status = 1;
                $prospect->save();
                //return redirect()->route('prospects.show', compact('prospect'));
                return $prospect;
            }

            $prospect = Prospect::whereHas('excel_file', function ($query){
                $query->where('is_active', '=', 1);
            })
                ->where('status', '=', 2)
                ->first();

            if (!empty($prospect)) {
                $prospect->status = 1;
                $prospect->save();
                //return redirect()->route('prospects.show', compact('prospect'));
                return $prospect;
            }
            /*dd('here');
            return redirect()->route('prospects.empty');*/
            return null;
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
        }
    }
}