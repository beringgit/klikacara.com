<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{


    public function eventable(){
        return $this->morphTo();
    }

    public function speakers(){
        return $this->belongsToMany('App\Speaker','event_speaker');
    }

    public function location(){
        return $this->belongsTo('App\EventLocation','location_id');
    }

    public function categories(){
        return $this->belongsToMany('App\EventCategory','events_event_category','event_id','category_id');
    }

    public function date(){
        return $this->belongsTo('App\EventDate','date_id');
    }

    public function attachments(){
        return $this->morphMany('App\Attachment','attach');
    }


}
