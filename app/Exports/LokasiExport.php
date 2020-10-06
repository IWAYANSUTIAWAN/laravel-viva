<?php

namespace App\Exports;

use App\Lokasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class LokasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lokasi::all();
    }
}
