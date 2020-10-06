<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class TelponExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('telpon')
         ->join('locations','telpon.lokasi_id','=','locations.location_id')
         ->select('telpon.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
