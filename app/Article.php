<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title','body','published_at','image_header'
    ];

    public function categories(){
        return $this->belongsToMany('App\ArticleCategory','articles_article_category','article_id','category_id');
    }

    public function author(){
        return $this->belongsTo('App\Admin','admin_id');
    }

    public function attachments(){
        return $this->morphMany('App\Attachment','attach');
    }
}
