<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class PrinterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=DB::table('printer')
         ->join('locations','printer.lokasi_id','=','locations.location_id')
         ->select('printer.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
