<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseSpecification;
use Illuminate\Http\Request;

class CourseSpecificationController extends Controller
{
    private $folderName = 'course-specification.';
    private $controllerRoot = "course-specifications";
    private $messageName = "Course Specification";

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

        $courseId = session()->get('selectedCourse')->id;
        $courseSpecification = Course::find($courseId)->courseSpecification;
        return view($this->folderName . 'course-specifications')->with('courseSpecification', $courseSpecification);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->folderName . 'create');
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
                'program' => 'required',
                'pre_requisite' => 'required',
                'credit_hours' => 'required',
                'approval_date' => 'required',
            ]);
        $courseSpecification = new CourseSpecification;
        $courseSpecification->course_id = session()->get('selectedCourse')->id;
        $courseSpecification->program = $request->input('program');
        $courseSpecification->pre_requisite = $request->input('pre_requisite');
        $courseSpecification->credit_hours = $request->input('credit_hours');
        $courseSpecification->approval_date = $request->input('approval_date');
        $courseSpecification->save();
        return redirect($this->controllerRoot . '#main')->with('success' , $this->messageName . ' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseSpecification = CourseSpecification::find($id);
        return view($this->folderName . 'edit')->with('courseSpecification', $courseSpecification);
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
                'program' => 'required',
                'pre_requisite' => 'required',
                'credit_hours' => 'required',
                'approval_date' => 'required',
            ]);
        $courseSpecification = CourseSpecification::find($id);
        $courseSpecification->program = $request->input('program');
        $courseSpecification->pre_requisite = $request->input('pre_requisite');
        $courseSpecification->credit_hours = $request->input('credit_hours');
        $courseSpecification->approval_date = $request->input('approval_date');
        $courseSpecification->save();
        return redirect('/course-specifications#main')->with('success' , $this->messageName . ' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseSpecification = CourseSpecification::find($id);
        $courseSpecification->delete();
        return redirect('/course-specifications#main')->with('success' , $this->messageName . ' deleted');

    }
}
