<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    protected $table = 'product_requests';

    public function requested(){
        return $this->belongsTo('App\ShopCart','product_id');
    }
}
