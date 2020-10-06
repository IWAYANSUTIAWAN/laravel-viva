<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finger extends Model
{
    protected $table='finger';
    protected $fillable=[
        'lokasi_id','sn','vc','ac','kondisi','keterangan'       
    ];
}
