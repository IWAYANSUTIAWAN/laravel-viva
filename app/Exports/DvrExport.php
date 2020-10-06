<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
class DvrExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=DB::table('dvr')
         ->join('locations','dvr.lokasi_id','=','locations.location_id')
         ->select('dvr.merek','dvr.tipe','dvr.sn','dvr.kondisi','locations.location_name as location_name',
         'dvr.region','dvr.ukuran_hd','dvr.keterangan')
         ->get();

         return ($data);
    }
}
