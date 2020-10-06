<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeyboardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('keyboard')
         ->join('locations','keyboard.lokasi_id','=','locations.location_id')
         ->select('keyboard.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
