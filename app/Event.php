<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    //
    use Sluggable;

    protected $fillable = ['name', 'slug', 'description', 'event_date', 'eventimg'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function getCreatedAtAttribute($date){
    	return Carbon::parse($date)->diffForHumans();
    }

    public function getEventimgAttribute($img){
    	return '/images/events/'.$img;
    }

    // public function getEventDateAttribute($date){
    // 	return Carbon::parse($date)->diffForHumans();
    // }
}
