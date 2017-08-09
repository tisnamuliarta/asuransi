<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminNote extends Model
{
    protected $fillable = [
    	'user_id','created_by','name','password','pinCode'
    ];

    protected $hidden = [
    	'password','pinCode'
    ];
}
