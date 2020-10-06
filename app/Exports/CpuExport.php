<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
class CpuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=DB::table('cpu')
         ->join('locations','cpu.lokasi_id','=','locations.location_id')
         ->select('cpu.*','locations.location_name as location_name')
         ->get();

         return ($data);;
    }
}
