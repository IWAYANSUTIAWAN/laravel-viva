<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kodelokasi extends Model
{
    protected $table='kodelokasi';
    protected $fillable=[
        'id','Kodelokasi','Tipelokasi'       
    ];
}
