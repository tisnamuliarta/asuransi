<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $fillable = [
        'user_id', 'bonus_referensi', 'bonus_berbagi', 'star_bonus'
    ];

    public function history()
    {
        return $this->hasMany('App\BonusHistory','bonus_id');
    }
}
