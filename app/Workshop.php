<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Workshop extends Model
{
    use Sluggable;

    protected $fillable = [
    						'name', 
    						'slug', 
    						'description', 
    						'workshopimg',
    						'start_date', 
    						'end_date', 
    					];

    protected $appends = array('workshopthumbnail');

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function getWorkshopthumbnailAttribute()
    {
        return "/images/workshop/thumbnail/"."{$this->attributes['workshopimg']}";
    }

    public function getWorkshopimgAttribute($img){
    	return '/images/workshop/'.$img;
    }

    
}
