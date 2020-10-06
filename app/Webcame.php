<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webcame extends Model
{
    protected $table='webcame';
    protected $fillable=[
        'lokasi_id','region','merek','tipe','sn','kondisi','keterangan'        
    ];
}
