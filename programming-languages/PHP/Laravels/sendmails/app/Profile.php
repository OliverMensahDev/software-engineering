<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [ 
        'name',
        'surname',
        'fullname',
        'bio',
        'email',
        'phone',
        'city',
        'skype',
        'linkedin',
        'twitter',
        'facebook',
        'website',
        'device_id',
        'picture',
        'company',
        'profession',
        'booking_id',
        'team_id',
        'extras'
    ];
}
