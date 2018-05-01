<?php

namespace App\Http\Controllers;

use App\AssessmentMethod;
use App\Course;
use Illuminate\Http\Request;

class AssessmentMethodController extends Controller
{
    private $folderName = 'assessment-method.';
    private $controllerRoot = "assessment-methods";
    private $messageName = "Assessment Method";

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
        $assessmentMethods = Course::find($courseId)->assessmentMethods;
        return view($this->folderName . 'assessment-methods')->with('assessmentMethods', $assessmentMethods);
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
                'name' => 'required',
                'method_percentage' => 'required',
                'week_number' => 'required',
                'knowledge_understanding' => 'required',
                'intellectual_skill' => 'required',
                'professional_skill' => 'required',
                'general_skill' => 'required'
            ]);
        $assessmentMethod = new AssessmentMethod;
        $assessmentMethod->course_id = session()->get('selectedCourse')->id;
        $assessmentMethod->name = $request->input('name');
        $assessmentMethod->method_percentage = $request->input('method_percentage');
        $assessmentMethod->week_number = $request->input('week_number');
        $assessmentMethod->knowledge_understanding = $request->input('knowledge_understanding');
        $assessmentMethod->intellectual_skill = $request->input('intellectual_skill');
        $assessmentMethod->professional_skill = $request->input('professional_skill');
        $assessmentMethod->general_skill = $request->input('general_skill');
        $assessmentMethod->save();
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
        $assessmentMethod = AssessmentMethod::find($id);
        return view($this->folderName . 'edit')->with('assessmentMethod', $assessmentMethod);
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
                'method_percentage' => 'required',
                'week_number' => 'required',
                'knowledge_understanding' => 'required',
                'intellectual_skill' => 'required',
                'professional_skill' => 'required',
                'general_skill' => 'required'
            ]);
        $assessmentMethod = AssessmentMethod::find($id);
        $assessmentMethod->name = $request->input('name');
        $assessmentMethod->method_percentage = $request->input('method_percentage');
        $assessmentMethod->week_number = $request->input('week_number');
        $assessmentMethod->knowledge_understanding = $request->input('knowledge_understanding');
        $assessmentMethod->intellectual_skill = $request->input('intellectual_skill');
        $assessmentMethod->professional_skill = $request->input('professional_skill');
        $assessmentMethod->general_skill = $request->input('general_skill');
        $assessmentMethod->save();
        return redirect($this->controllerRoot . '#main')->with('success' , $this->messageName . ' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assessmentMethod = AssessmentMethod::find($id);
        $assessmentMethod->delete();
        return redirect($this->controllerRoot . '#main')->with('success' , $this->messageName . ' deleted');

    }
}
