<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telpon extends Model
{
    protected $table='telpon';
    protected $fillable=[
        'lokasi_id','region','merek','tipe','sn','kondisi','pengguna','mac','ip','ext','keterangan'        
    ];
}
