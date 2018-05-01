<?php

namespace App\Http\Controllers;

use App\Collage;
use App\Course;
use App\IntellectualSkill;
use Illuminate\Http\Request;

class IntellectualSkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if( session()->get('selectedCourse')) {
            $courseId = session()->get('selectedCourse')->id;
            $intellectualSkills = Course::find($courseId)->intellectualSkills;
        }
        else{
            $collageId = session()->get('selectedCollage')->id;
            $intellectualSkills = Collage::find($collageId)->intellectualSkills;
        }
        return view('intellectual-skill.intellectual-skills')->with('intellectualSkills', $intellectualSkills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intellectual-skill.create');
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
        $intellectualSkill = new IntellectualSkill;
        $intellectualSkill->collage_id = session()->get('selectedCollage')->id;
        $intellectualSkill->name = $request->input('name');
        $intellectualSkill->save();
        return redirect('intellectual-skills/create#main')->with('success' , 'Intellectual Skill Topic Added');
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
        $intellectualSkill = IntellectualSkill::find($id);
        return view('intellectual-skill.edit')->with('intellectualSkill', $intellectualSkill);
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
        $intellectualSkill = IntellectualSkill::find($id);
        $intellectualSkill->name = $request->input('name');
        $intellectualSkill->save();
        return redirect('intellectual-skills#main')->with('success' , 'Intellectual Skill Topic Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intellectualSkill = IntellectualSkill::find($id);
        $intellectualSkill->delete();
        return redirect('intellectual-skills#main')->with('success' , 'Intellectual Skill Topic Deleted');
    }
}
