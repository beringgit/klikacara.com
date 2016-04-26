<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_category';

    public function articles(){
        return $this->belongsToMany('App\Article','articles_article_category','category_id','article_id');
    }


}
