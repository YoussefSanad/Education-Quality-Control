<?php

namespace App\Http\Controllers;

use App\Collage;
use App\Course;
use App\GeneralSkill;
use Illuminate\Http\Request;

class GeneralSkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if( session()->get('selectedCourse')) {
            $courseId = session()->get('selectedCourse')->id;
            $generalSkills = Course::find($courseId)->generalSkills;
        }
        else{
            $collageId = session()->get('selectedCollage')->id;
            $generalSkills = Collage::find($collageId)->generalSkills;
        }

        return view('general-skill.general-skills')->with('generalSkills', $generalSkills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('general-skill.create');
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
        $generalSkill = new GeneralSkill;
        $generalSkill->collage_id = session()->get('selectedCollage')->id;
        $generalSkill->name = $request->input('name');
        $generalSkill->save();
        return redirect('general-skills/create#main')->with('success' , 'General Skill Added');
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
        $generalSkill = GeneralSkill::find($id);
        return view('general-skill.edit')->with('generalSkill', $generalSkill);
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
        $generalSkill = GeneralSkill::find($id);
        $generalSkill->name = $request->input('name');
        $generalSkill->save();
        return redirect('general-skills#main')->with('success' , 'General Skill Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generalSkill = GeneralSkill::find($id);
        $generalSkill->delete();
        return redirect('general-skills#main')->with('success' , 'General Skill Deleted');
    }
}
