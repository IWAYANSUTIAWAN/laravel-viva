<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modem extends Model
{
    protected $table='modem';
    protected $fillable=[
        'lokasi_id','region','merek','tipe','sn','kondisi','keterangan'        
    ];
}
