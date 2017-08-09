<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinCode extends Model
{
    protected $table = "pin_codes";

    /**
     * [$fillable description]
     * @var [type]
     */
    protected $fillable = [
        'order_pin_id', 'pinCode', 'status'
    ];

    public function orderPinCodes()
    {
        return $this->belongsTo('App\OrderPinCode');
    }
}
