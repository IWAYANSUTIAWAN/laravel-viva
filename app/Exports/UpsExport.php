<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class UpsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          $data=DB::table('ups')
         ->join('locations','ups.lokasi_id','=','locations.location_id')
         ->select('ups.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
