<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ModemExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('modem')
         ->join('locations','modem.lokasi_id','=','locations.location_id')
         ->select('modem.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
