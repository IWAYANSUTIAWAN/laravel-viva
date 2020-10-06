<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $table='chart';
    protected $fillable=[
        'no_tx','lokasi_id','nama_aset','merek','tipe','sn'       
    ];
}
