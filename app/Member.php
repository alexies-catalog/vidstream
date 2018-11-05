<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class Member extends Model
{
	use SoftDeletes;
    use Sluggable;

    protected $dates = ['deleted_at','created_at'];
    protected $fillable = [
        'name',
        'slug',
        'awards',
        'about',
        'halloffame',
        'profilepic',
        'coverphoto',
        'workshop',
        'fb_link',
        'tw_link',
        'ig_link',
        'li_link'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function films(){
    	return $this->belongsToMany('App\Film');
    }

    public function professions(){
    	return $this->belongsToMany('App\Profession');
    }

    public function getCreatedAtAttribute($value){
        $newFormat = Carbon::parse($value)->formatLocalized('%B %d %Y %A').' , '.Carbon::parse($value)->format('h:i A');
        return $newFormat;
    }

    public function getProfilepicAttribute($img){
        return 'images/member/thumbnail/'.$img;
    }

    public function getCoverphotoAttribute($img){
        return 'images/member/cover/'.$img;
    }

    public function ufilms(){
        return $this->films()->distinct();
    }
}
