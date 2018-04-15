<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    public static $selectedCollage = 1;
    //Tabel name
    protected $tableName = 'collages';
    public $primaryKey = 'id';


    public function user(){
        return $this->hasOne('App\User');
    }
    public function departments()
    {
        return $this->hasMany('App\Department');
    }
    public function academicYears()
    {
        return $this->hasMany('App\AcademicYear');
    }
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
    public function doctors()
    {
        return $this->hasMany('App\Doctor');
    }
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
    public function books()
    {
        return $this->hasMany('App\Book');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function collageDocumetns()
    {
        return $this->hasMany('App\CollageDocument');
    }
}
