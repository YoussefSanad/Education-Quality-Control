<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collage;
use App\Course;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collageId = session()->get('selectedCollage')->id;
        $courses = Collage::find($collageId)->courses;
        return view('course.courses')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
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
                'name' => 'required',
                'code' => 'required',
                'academic_year_id' => 'required',
                'description' => 'required',
                'objectives' => 'required',
                'assessment_method' => 'required',
                'doctor_name' => 'required',
                'student_evaluation' => 'required',
                'success_percentage' => 'required'
            ]);
        $course = new Course;
        $course->collage_id = session()->get('selectedCollage')->id;
        $course->academic_year_id = $request->input('academic_year_id');
        $course->name = $request->input('name');
        $course->code = $request->input('code');
        $course->description = $request->input('description');
        $course->objectives = $request->input('objectives');
        $course->assessment_method = $request->input('assessment_method');
        $course->doctor_name = $request->input('doctor_name');
        $course->student_evaluation = $request->input('student_evaluation');
        $course->success_percentage = $request->input('success_percentage');
        $course->save();
        return redirect('courses/create')->with('success' , 'Course Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        session(['selectedCourse' => $course]);
        return redirect('/syllabuses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('course.edit')->with('course', $course);
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
        $this->validate($request,
            [
                'name' => 'required',
                'code' => 'required',
                'academic_year_id' => 'required',
                'description' => 'required',
                'objectives' => 'required',
                'assessment_method' => 'required',
                'doctor_name' => 'required',
                'student_evaluation' => 'required',
                'success_percentage' => 'required'
            ]);
        $course = Course::find($id);
        $course->academic_year_id = $request->input('academic_year_id');
        $course->name = $request->input('name');
        $course->code = $request->input('code');
        $course->description = $request->input('description');
        $course->objectives = $request->input('objectives');
        $course->assessment_method = $request->input('assessment_method');
        $course->doctor_name = $request->input('doctor_name');
        $course->student_evaluation = $request->input('student_evaluation');
        $course->success_percentage = $request->input('success_percentage');
        $course->save();
        return redirect('courses')->with('success' , 'Course updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('/courses')->with('success' , 'Course deleted');

    }
}
