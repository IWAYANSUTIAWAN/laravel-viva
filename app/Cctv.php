<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    protected $table='cctv';
    protected $fillable=[
        'merek','tipe','sn','kondisi','lokasi_id','jenis_cam','keterangan'       
    ];
}
