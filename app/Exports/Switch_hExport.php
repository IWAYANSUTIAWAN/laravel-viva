<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class Switch_hExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=DB::table('switch')
         ->join('locations','switch.lokasi_id','=','locations.location_id')
         ->select('switch.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
