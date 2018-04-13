<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function collage()
    {
        return $this->belongsTo('App\Collage');
    }
    public function academicYear()
    {
        return $this->belongsTo('App\AcademicYear');
    }
    public function syllabuses(){
        return $this->hasMany('App\Syllabus');
    }
}
