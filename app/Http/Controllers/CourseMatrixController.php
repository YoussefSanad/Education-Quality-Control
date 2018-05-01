<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseMatrix;
use Illuminate\Http\Request;

class CourseMatrixController extends Controller
{
    private $folderName = 'course-matrix.';
    private $controllerRoot = "course-matrices";
    private $messageName = "Course Matrix";

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
        $courseMatrices = Course::find($courseId)->courseMatrices;
        return view($this->folderName . 'course-matrices')->with('courseMatrices', $courseMatrices);
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
                'main_topic' => 'required',
                'duration' => 'required',
                'knowledge_understanding' => 'required',
                'intellectual_skill' => 'required',
                'professional_skill' => 'required',
                'general_skill' => 'required'
            ]);
        $courseMatrix = new CourseMatrix;
        $courseMatrix->course_id = session()->get('selectedCourse')->id;
        $courseMatrix->main_topic = $request->input('main_topic');
        $courseMatrix->duration = $request->input('duration');
        $courseMatrix->knowledge_understanding = $request->input('knowledge_understanding');
        $courseMatrix->intellectual_skill = $request->input('intellectual_skill');
        $courseMatrix->professional_skill = $request->input('professional_skill');
        $courseMatrix->general_skill = $request->input('general_skill');
        $courseMatrix->save();
        return redirect($this->controllerRoot . '/create#main')->with('success' , $this->messageName . ' created');
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
        $courseMatrix = CourseMatrix::find($id);
        return view($this->folderName . 'edit')->with('courseMatrix', $courseMatrix);
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
                'main_topic' => 'required',
                'duration' => 'required',
                'knowledge_understanding' => 'required',
                'intellectual_skill' => 'required',
                'professional_skill' => 'required',
                'general_skill' => 'required'
            ]);
        $courseMatrix = CourseMatrix::find($id);
        $courseMatrix->main_topic = $request->input('main_topic');
        $courseMatrix->duration = $request->input('duration');
        $courseMatrix->knowledge_understanding = $request->input('knowledge_understanding');
        $courseMatrix->intellectual_skill = $request->input('intellectual_skill');
        $courseMatrix->professional_skill = $request->input('professional_skill');
        $courseMatrix->general_skill = $request->input('general_skill');
        $courseMatrix->save();
        return redirect('/course-matrices#main')->with('success' , $this->messageName . ' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseMatrix = CourseMatrix::find($id);
        $courseMatrix->delete();
        return redirect($this->controllerRoot . '#main')->with('success' , $this->messageName . ' deleted');

    }
}
