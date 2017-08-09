<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTree extends Model
{
	/**
	 * { var_description }
	 *
	 * @var        array
	 */
    protected $fillable = [
			'user_id', 'parent_id'
		];

		/**
		 * { function_description }
		 *
		 * @return     <type>  ( description_of_the_return_value )
		 */
		public function user() {
			return $this->belongsTo('App\User');
		}

}
