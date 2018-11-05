<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{

    protected $fillable = [
        'logo_url',
        'about',
        'fb_link',
        'tw_link',
        'gmail_link',
    ];
    public function getLogoUrlAttribute($logo){
        return '../images/' . $logo ;
    }
}
