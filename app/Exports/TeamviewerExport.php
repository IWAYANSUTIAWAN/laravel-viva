<?php

namespace App\Exports;

use App\Lokasi;
use App\Teamviewer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeamviewerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return Teamviewer::all();
        $data=DB::table('teamviewer')
         ->join('locations','teamviewer.lokasi_id','=','locations.location_id')
         ->select('teamviewer.id','locations.location_name as location_name',
         'teamviewer.kode_id','teamviewer.pengguna')
         ->get();
         return ($data);
    }
}
