<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $table='monitor';
    protected $fillable=[
        'lokasi_id','region','merek','model','sn','ukuran','kondisi','keterangan'      
    ];
}
