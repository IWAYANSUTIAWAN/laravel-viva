<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{  
    protected $table='locations';
    protected $fillable=[
        'location_id',
        'slug',
        'location_name',
        'alamat'        
    ];
}
