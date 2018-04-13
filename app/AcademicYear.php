<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    public function collage()
    {
        return $this->belongsTo('App\Collage');
    }
    public function courses(){
        return $this->hasMany('App\Course');
    }
}
