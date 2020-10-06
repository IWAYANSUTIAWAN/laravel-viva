<?php

namespace App\Exports;

use App\Laptop;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaptopExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Laptop::All();
    }
}
