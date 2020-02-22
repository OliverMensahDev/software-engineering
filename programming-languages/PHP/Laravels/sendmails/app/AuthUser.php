<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthUser extends Model
{  
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
       'email', 
       'password', 
       'auth_type',
       'organization_id',
       'capabilities'
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
       'password',
    ];

}
