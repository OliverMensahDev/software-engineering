<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [ 
        'name',
        'description',
        'country',
        'region',
        'city',
        'neighborhood',
        'zip_code',
        'address',
        'latitude',
        'longitude',
        'timezone',
        'timezone_name',
        'wifi_name',
        'wifi_password',
        'is_deleted',
        'is_visible',
        'resource_id',
        'booking_id'
    ];
}
