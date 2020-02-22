<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingCost extends Model
{
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'total_amount',
        'currency',
        'tax_rate',
        'tax_amount',
        'resource_price'
    ];
}
