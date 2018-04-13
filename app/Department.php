<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function collage()
    {
        return $this->belongsTo('App\Collage');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
