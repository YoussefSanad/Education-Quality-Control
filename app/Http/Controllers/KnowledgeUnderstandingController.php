<?php

namespace App\Http\Controllers;

use App\Collage;
use App\Course;
use Illuminate\Http\Request;
use App\KnowledgeUnderstanding;

class KnowledgeUnderstandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if( session()->get('selectedCourse')) {
            $courseId = session()->get('selectedCourse')->id;
            $knowledgeUnderstandings = Course::find($courseId)->knowledgeUnderstandings;
        }
        else{
            $collageId = session()->get('selectedCollage')->id;
            $knowledgeUnderstandings = Collage::find($collageId)->knowledgeUnderstandings;
        }
        return view('knowledge-understanding.knowledge-understandings')->with('knowledgeUnderstandings', $knowledgeUnderstandings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('knowledge-understanding.create');
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
                'name' => 'required'
            ]);
        $knowledgeUnderstanding = new KnowledgeUnderstanding;
        $knowledgeUnderstanding->collage_id = session()->get('selectedCollage')->id;
        $knowledgeUnderstanding->name = $request->input('name');
        $knowledgeUnderstanding->save();
        return redirect('knowledge-understandings/create#main')->with('success' , 'Knowledge & Understanding Topic Added');
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
        $knowledgeUnderstanding = KnowledgeUnderstanding::find($id);
        return view('knowledge-understanding.edit')->with('knowledgeUnderstanding', $knowledgeUnderstanding);
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
                'name' => 'required'
            ]);
        $knowledgeUnderstanding = KnowledgeUnderstanding::find($id);
        $knowledgeUnderstanding->name = $request->input('name');
        $knowledgeUnderstanding->save();
        return redirect('knowledge-understandings#main')->with('success' , 'Knowledge & Understanding Topic Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $knowledgeUnderstanding = KnowledgeUnderstanding::find($id);
        $knowledgeUnderstanding->delete();
        return redirect('knowledge-understandings#main')->with('success' , 'Knowledge & Understanding Topic Deleted');
    }
}
