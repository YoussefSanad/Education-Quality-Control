<?php

namespace App\Http\Controllers;

use App\Collage;
use App\Course;
use App\ProfessionalSkill;
use Illuminate\Http\Request;

class ProfessionalSkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if( session()->get('selectedCourse')) {
            $courseId = session()->get('selectedCourse')->id;
            $professionalSkills = Course::find($courseId)->professionalSkills;
        }
        else{
            $collageId = session()->get('selectedCollage')->id;
            $professionalSkills = Collage::find($collageId)->professionalSkills;
        }
        return view('professional-skill.professional-skills')->with('professionalSkills', $professionalSkills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professional-skill.create');
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
        $professionalSkill = new ProfessionalSkill();
        $professionalSkill->collage_id = session()->get('selectedCollage')->id;
        $professionalSkill->name = $request->input('name');
        $professionalSkill->save();
        return redirect('professional-skills/create#main')->with('success' , 'Professional Skill Added');
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
        $professionalSkill = ProfessionalSkill::find($id);
        return view('professional-skill.edit')->with('professionalSkill', $professionalSkill);
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
        $professionalSkill = ProfessionalSkill::find($id);
        $professionalSkill->name = $request->input('name');
        $professionalSkill->save();
        return redirect('professional-skills#main')->with('success' , 'Professional Skill Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professionalSkill = ProfessionalSkill::find($id);
        $professionalSkill->delete();
        return redirect('professional-skills#main')->with('success' , 'Professional Skill Deleted');
    }
}
