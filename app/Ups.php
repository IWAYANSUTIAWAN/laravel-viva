<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ups extends Model
{
    protected $table='ups';
    protected $fillable=[
        'lokasi_id','region','merek','tipe','sn','kondisi','pengguna','tegangan','keterangan'        
    ];
}
