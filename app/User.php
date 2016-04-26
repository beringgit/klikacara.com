<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex',
        'bdate','phone','gender','facebook_id','twitter_id','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events(){
        return $this->morphMany('App\Event','eventable');
    }

    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function shop_carts(){
        return $this->hasMany('App\ShopCart','user_id');
    }
}
