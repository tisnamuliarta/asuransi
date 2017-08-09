<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    public $timestamps = false;
    protected $table = 'banks';

    protected $fillable = [
        'name','code'
    ];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
