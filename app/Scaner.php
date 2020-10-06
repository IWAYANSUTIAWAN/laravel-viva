<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scaner extends Model
{
    protected $table='scaner';
    protected $fillable=[
        'lokasi_id','region','merek','tipe','sn','kondisi','keterangan'        
    ];
}
