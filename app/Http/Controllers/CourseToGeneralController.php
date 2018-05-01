<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseGeneral;
use App\GeneralSkill;
use Illuminate\Http\Request;

class CourseToGeneralController extends Controller
{
    protected $folderName = 'course-to-general.';
    protected $messageName = 'General Skill';
    protected $rootLink = 'course-to-generals';
    protected $tableLink= 'general-skills';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folderName . 'create')->with('topics', $this->getUnselectedTopics());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'general_skill_id' => 'required'
            ]);
        $courseGeneral = new CourseGeneral;
        $courseGeneral->course_id = session()->get('selectedCourse')->id;
        $courseGeneral->general_skill_id = $request->input('general_skill_id');
        $courseGeneral->save();
        return redirect($this->rootLink . '/create#main')->with('success' , $this->messageName . ' added to course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseId = session()->get('selectedCourse')->id;
        $courseTopics = CourseGeneral::where('course_id', $courseId)->where('general_skill_id', $id)->get();
        foreach($courseTopics as $topic){
            $topic->delete();
        }
        return redirect($this->tableLink . '#main');
    }

    public function getUnselectedTopics(){
        $courseId = session()->get('selectedCourse')->id;
        $selected = Course::find($courseId)->generalSkills;
        $all = GeneralSkill::all()->diff($selected);
        return $all;
    }
}
