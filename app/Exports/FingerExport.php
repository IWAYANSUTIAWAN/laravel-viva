<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class FingerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('finger')
         ->join('locations','finger.lokasi_id','=','locations.location_id')
         ->select('finger.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
