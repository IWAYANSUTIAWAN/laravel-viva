<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ScanerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('scaner')
         ->join('locations','scaner.lokasi_id','=','locations.location_id')
         ->select('scaner.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
