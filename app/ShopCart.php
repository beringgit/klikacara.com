<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
{
    protected $table = 'shop_carts';

    public function owner(){
        return $this->belongsTo('App\User');
    }

    public function product(){
        return $this->belongsTo('App\ProductProvider','product_id');
    }
}
