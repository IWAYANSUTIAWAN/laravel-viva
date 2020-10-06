<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
class EmailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $data=DB::table('email')
         ->join('locations','email.lokasi_id','=','locations.location_id')
         ->select('email.merek','email.tipe','email.sn','email.kondisi','locations.location_name as location_name',
         'email.region','email.ukuran_hd','email.keterangan')
         ->get();

         return ($data);
    }
}
