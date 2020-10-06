<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isp extends Model
{
    protected $table='isp';
    protected $fillable=[
        'lokasi_id','provider','region','nomor_tlp','nomor_inet','kecepatan','status','keterangan'        
    ];
}
