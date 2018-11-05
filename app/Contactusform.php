<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contactusform extends Model
{
    //
    public $fillable = ['name','email','message'];
    
    public function getCreatedAtAttribute($value){
        $newFormat = Carbon::parse($value)->formatLocalized('%B %d %Y %A').' , '.Carbon::parse($value)->format('h:i A');
        return $newFormat;
    }
}
