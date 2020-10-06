<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table='email';
    protected $fillable=[
        'lokasi_id','region','gmail','pwd_gmail','zimbra','pwd_zimbra','dropbox','pwd_dropbox'     
    ];
}
