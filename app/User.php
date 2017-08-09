<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pinCode','parent_id','name', 'email', 'password', 'sponsorName', 'slug',
        'address', 'phoneNumber','momName', 'ahliwaris', 'bank_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','bankNumber',
    ];

    public function banks()
    {
        return $this->belongsTo(Banks::class);
    }

    public function child()
    {
        return $this->hasMany(User::class,'parent_id');
    }

    // child recursive
    public function children()
    {
        return $this->child()->with('children');
    }


    public function parent()
    {
        return $this->belongsTo('App\User','parent_id');
    }

    public function parentRec()
    {
        return $this->parent()->with('parentRecursive');
    }

    public function userTree()
    {
        return $this->hasMany('App\User', 'parent_id');
    }

    public function sponsors()
    {
        return $this->hasMany('App\User','sponsorName');
    }

    public function setoran()
    {
        return $this->hasMany("App\Setoran");
    }

}
