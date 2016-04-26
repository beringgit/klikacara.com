<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProvider extends Model
{
    protected $table = 'product_providers';

    public function attachments(){
        return $this->morphMany('App\Article','attach');
    }

    public function category(){
        return $this->belongsTo('App\ProductCategory','category_id');
    }

    public function owner(){
        return $this->belongsTo('App\Provider','provider_id');
    }

    public function requested(){
        return $this->hasMany('App\ShopCart','product_id');
    }


}
