<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The attributes that are mass assignable
     */

     protected $fillable = [
         'is_active',
         'is_active',
         'is_deleted',
         'os_lead'
     ];
}
