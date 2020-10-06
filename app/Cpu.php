<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    protected $table='cpu';
    protected $fillable=[
        'merek','tipe','sn','kondisi','lokasi_id','region','nama_pengguna','os','sn_os','keterangan'       
    ];
}
