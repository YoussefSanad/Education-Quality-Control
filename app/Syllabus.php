<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $table = 'syllabuses';

    public function course(){
        return $this->hasOne('App\Course');
    }
}
