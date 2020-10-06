<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class IspExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('isp')
         ->join('locations','isp.lokasi_id','=','locations.location_id')
         ->select('isp.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
