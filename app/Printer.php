<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $table='printer';
    protected $fillable=[
        'lokasi_id','region','merek','tipe','sn','kondisi','keterangan'        
    ];
}
