<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseKnowledge;
use App\KnowledgeUnderstanding;
use Illuminate\Http\Request;

class CourseToKnowledgeController extends Controller
{
    protected $folderName = 'course-to-knowledge.';
    protected $messageName = 'Knowledge Understanding';
    protected $rootLink = 'course-to-knowledge';
    protected $tableLink= 'knowledge-understandings';
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
                'knowledge_understanding_id' => 'required'
            ]);
        $courseKnowledge = new CourseKnowledge();
        $courseKnowledge->course_id = session()->get('selectedCourse')->id;
        $courseKnowledge->knowledge_understanding_id = $request->input('knowledge_understanding_id');
        $courseKnowledge->save();
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
        $courseTopics = CourseKnowledge::where('course_id', $courseId)->where('knowledge_understanding_id', $id)->get();
        foreach($courseTopics as $topic){
            $topic->delete();
        }
        return redirect($this->tableLink . '#main');
    }

    public function getUnselectedTopics(){
        $courseId = session()->get('selectedCourse')->id;
        $selected = Course::find($courseId)->knowledgeUnderstandings;
        $all = KnowledgeUnderstanding::all()->diff($selected);
        return $all;
    }
}
