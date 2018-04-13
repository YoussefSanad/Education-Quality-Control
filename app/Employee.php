<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function collage()
    {
        return $this->belongsTo('App\Collage');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
