<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function events(){
        return $this->morphMany('App\Event','eventable');
    }

    public function products(){
        return $this->hasMany('App\ProductProvider');
    }

    public function requested_products(){

    }
}
