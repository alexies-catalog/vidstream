<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class Equipment extends Model
{
    use SoftDeletes;
    use Sluggable;
    
    protected $dates = ['deleted_at','created_at'];
    protected $uploads = '/images/equip/';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'img',
        'affliates'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getCreatedAtAttribute($value){
        $newFormat = Carbon::parse($value)->formatLocalized('%B %d %Y %A').' , '.Carbon::parse($value)->format('h:i A');
        return $newFormat;
    }

    public function getImgAttribute($value){
        return $this->uploads . $value;
    }
}
