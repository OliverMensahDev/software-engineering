<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanSubscription extends Model
{
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'subscription_type',
        'description',
        'cycle',
        'is_recurring',
        'terms',
        'start_timestamp',
        'end_timestamp',
        'plan_id'
    ];
}
