<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
// use App\Lokasi;
// use App\Teamviewer;
use Illuminate\Support\Facades\DB;

class AnydeskExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('anydeks')
         ->join('locations','anydeks.lokasi_id','=','locations.location_id')
         ->select('anydeks.id','locations.location_name as location_name',
         'anydeks.kode_id','anydeks.pengguna')
         ->get();
         return ($data);
    }
}
