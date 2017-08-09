<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPinCode extends Model
{
    protected $table = 'order_pin_codes';

    protected $fillable = [
        'user_id', 'amount', 'total', 'status','orderTotal'
    ];

    public function pinCode()
    {
        return $this->hasMany('App\PinCode','order_pin_id');
    }
}
