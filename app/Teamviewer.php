<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamviewer extends Model
{
    protected $table='teamviewer';
    
    protected $fillable=[
        'lokasi_id',
        'kode_id',
        'password',
        'pengguna'       
    ];
}

