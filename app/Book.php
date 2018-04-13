<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function collage(){
        $this->belongsTo('App/Collage');
    }
}
