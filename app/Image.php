<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public function Organization()
    {
        return $this->belongsTo('App\Organization');
    }
}
