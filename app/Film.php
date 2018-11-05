<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Film extends Model
{

    use Sluggable;
    
    protected $fillable = [
        'title',
        'slug',
        'award',
        'synopsis',
        'photo',
        'single_photo',
        'runningtime',
        'youtube_url',
        'yearfinish',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // public function director()
    // {
    //     return $this->belongsTo('App\Director');
    // }

    // public function producer()
    // {
    //     return $this->belongsTo('App\Producer');
    // }
    // public function cast()
    // {
    //     return $this->belongsTo('App\Cast');
    // }

    public function getPhotoAttribute($photo){
        return '/images/film/thumbnail/'.$photo;
    }

    public function getSinglePhotoAttribute($photo){
        return '/images/film/singlepage/'.$photo;
    }

    public function members(){
        return $this->belongsToMany('App\Member')->withPivot('member_profession','member_name');;
    }


    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function stills()
    {
        return $this->hasMany('App\Still');
    }


    
}
