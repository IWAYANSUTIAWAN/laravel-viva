<?php

namespace App\Exports;

use App\Kondisi;
use Maatwebsite\Excel\Concerns\FromCollection;

class KondisiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kondisi::all();
    }
}
