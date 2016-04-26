<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $table = 'admins';
    protected $fillable = ['name','email','password'];

    public function events(){
        return $this->morphMany('App\Event','eventable');
    }

    public function articles(){
        return $this->hasMany('App\Article','admin_id');
    }

    public function allAttachments(){
        $arr = [];
        foreach($this->articles->all() as $article) {
            foreach($article->attachments->all() as $attachment){
                array_push($arr,$attachment);
            }
        }
        foreach($this->events->all() as $event) {
            foreach($event->attachments->all() as $attachment){
                array_push($arr,$attachment);
            }
        }
        return $arr;
    }

}
