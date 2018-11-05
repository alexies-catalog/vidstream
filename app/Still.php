<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Still extends Model
{
    //
    protected $fillable = [
        'file_name'
    ];

    public function stills()
    {
        return $this->belongsTo('App\Film');
    }

    public function getFileNameAttribute($photo){
        return '/images/film/stills/'.$photo;
    }
}
