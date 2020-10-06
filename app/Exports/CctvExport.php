<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class CctvExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=DB::table('cctv')
         ->join('locations','cctv.lokasi_id','=','locations.location_id')
         ->select('cctv.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
