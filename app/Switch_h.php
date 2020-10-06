<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switch_h extends Model
{
     protected $table='switch';
    protected $fillable=[
        'lokasi_id','merek','region','port','tipe','sn','kondisi','keterangan'        
    ];
}
