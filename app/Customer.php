<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'customers';

  protected $fillable = [
    'name', 'email', 'address','parent_id'
  ];

  public function customer()
  {
    $this->hasMany('\App\Customer', 'parent_id');
  }
}
