<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table='Laptops';
    protected $fillable=[
        'vendor',
        'tipe',
        'sn_laptop',
        'os',
        'sn_os',
        'pengguna',
        'keterangan'
    ];
}
