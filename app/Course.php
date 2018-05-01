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

    //One to one relationships
    public function courseSpecification(){
        return $this->hasOne('App\CourseSpecification');
    }

    //one to many relationships
    public function syllabuses(){
        return $this->hasMany('App\Syllabus');
    }
    public function books(){
        return $this->hasMany('App\Book');
    }
    public function courseDocuments(){
        return $this->hasMany('App\CollageDocument');
    }
    public function assessmentMethods(){
        return $this->hasMany('App\AssessmentMethod');
    }
    public function courseMatrices(){
        return $this->hasMany('App\CourseMatrix');
    }
    public function learningMethods(){
        return $this->hasMany('App\LearningMethod');
    }

    //many to many relationships
    public function generalSkills()
    {
        return $this->belongsToMany('App\GeneralSkill');
    }
    public function intellectualSkills()
    {
        return $this->belongsToMany('App\IntellectualSkill');
    }
    public function knowledgeUnderstandings()
    {
        return $this->belongsToMany('App\KnowledgeUnderstanding' , "course_knowledge");
    }
    public function professionalSkills()
    {
        return $this->belongsToMany('App\ProfessionalSkill');
    }
}
