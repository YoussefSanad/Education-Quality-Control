<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function collage(){
        return $this->hasOne('App\Collage');
    }
}
