<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dvr extends Model
{
    protected $table='dvr';
    protected $fillable=[
        'merek','tipe','sn','kondisi','lokasi_id','region','ukuran_hd','keterangan'      
    ];
}
