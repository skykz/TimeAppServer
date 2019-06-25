<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
//    protected $fillable=[];

    public function images(){
        return $this->hasMany('App\Image');
    }
}
