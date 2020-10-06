<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class WebcameExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=DB::table('webcame')
         ->join('locations','webcame.lokasi_id','=','locations.location_id')
         ->select('webcame.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
