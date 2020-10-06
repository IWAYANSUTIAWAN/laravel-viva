<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    protected $table='mouse';
    protected $fillable=[
        'lokasi_id','region','merek','tipe','sn','kondisi','keterangan'        
    ];
}
