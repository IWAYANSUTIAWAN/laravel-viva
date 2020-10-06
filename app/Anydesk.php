<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anydesk extends Model
{
    protected $table='anydeks';
    protected $fillable=[
        'lokasi_id',
        'kode_id',
        'password',
        'pengguna'        
    ];
}
