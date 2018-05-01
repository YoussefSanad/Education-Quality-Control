<?php

namespace App\Http\Controllers;

use App\Course;
use App\LearningMethod;
use Illuminate\Http\Request;

class LearningMethodController extends Controller
{
    private $folderName = 'learning-method.';
    private $controllerRoot = "learning-methods";
    private $messageName = "Learning Method";

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
        $learningMethods = Course::find($courseId)->learningMethods;
        return view($this->folderName . 'learning-methods')->with('learningMethods', $learningMethods);
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
                'knowledge_understanding' => 'required',
                'intellectual_skill' => 'required',
                'professional_skill' => 'required',
                'general_skill' => 'required'
            ]);
        $learningMethod = new LearningMethod;
        $learningMethod->course_id = session()->get('selectedCourse')->id;
        $learningMethod->name = $request->input('name');
        $learningMethod->knowledge_understanding = $request->input('knowledge_understanding');
        $learningMethod->intellectual_skill = $request->input('intellectual_skill');
        $learningMethod->professional_skill = $request->input('professional_skill');
        $learningMethod->general_skill = $request->input('general_skill');
        $learningMethod->save();
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
        $learningMethod = LearningMethod::find($id);
        return view($this->folderName . 'edit')->with('learningMethod', $learningMethod);
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
                'knowledge_understanding' => 'required',
                'intellectual_skill' => 'required',
                'professional_skill' => 'required',
                'general_skill' => 'required'
            ]);
        $learningMethod = LearningMethod::find($id);
        $learningMethod->name = $request->input('name');
        $learningMethod->knowledge_understanding = $request->input('knowledge_understanding');
        $learningMethod->intellectual_skill = $request->input('intellectual_skill');
        $learningMethod->professional_skill = $request->input('professional_skill');
        $learningMethod->general_skill = $request->input('general_skill');
        $learningMethod->save();
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
        $learningMethod = LearningMethod::find($id);
        $learningMethod->delete();
        return redirect($this->controllerRoot . '#main')->with('success' , $this->messageName . ' deleted');

    }
}
