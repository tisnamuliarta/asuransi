<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusHistory extends Model
{
    protected $fillable = [
        'user_id', 'setoran_id','bonus_id'
    ];
}
