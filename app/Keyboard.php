<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    protected $table='keyboard';
    protected $fillable=[
        'lokasi_id','region','jenis','merek','model','sn','kondisi','keterangan'        
    ];
}
