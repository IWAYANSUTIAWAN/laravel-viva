<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='transaksi';
    protected $fillable=[
        'no_transaksi','lokasi_id','user_id','nama_aset',
        'cpu_id','monitor_id','keyboard_id','mouse_id','printer_id',
        'scaner_id','finger_id','dvr_id','cctv_id','webcame_id','modem_id','isp_id','ups_id'        
    ];
}
