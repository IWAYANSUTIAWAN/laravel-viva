<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
class MonitorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=DB::table('monitor')
         ->join('locations','monitor.lokasi_id','=','locations.location_id')
         ->select('monitor.*','locations.location_name as location_name')
         ->get();

         return ($data);
    }
}
