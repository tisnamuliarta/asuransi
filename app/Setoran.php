<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    protected $fillable = [
   		'user_id', 'dateSetoran', 'totalSetoran', 'images','status'
		];

		public function user()
		{
			return $this->belongsTo("App\User");
		}
}
