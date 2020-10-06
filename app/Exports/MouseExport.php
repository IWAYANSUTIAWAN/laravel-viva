<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class MouseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('mouse')
         ->join('locations','mouse.lokasi_id','=','locations.location_id')
         ->select('mouse.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
