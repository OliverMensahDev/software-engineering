<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [ 
        'name',
        'logo',
        'location_id',
        'timezone',
        'location',
        'billing_id',
        'currency',
        'payment_instructions',
        'tax_rate',
        'plans'
    ];
}
