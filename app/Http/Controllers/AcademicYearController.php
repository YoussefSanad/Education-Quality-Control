<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\Collage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicYearController extends Controller
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
        $academicYears = Collage::find($collageId)->academicYears;
        return view('academic-year.academic-years')->with('academicYears', $academicYears);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academic-year.create');
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
                'number_of_students' => 'required',
            ]);
        $academicYear = new AcademicYear;
        $academicYear->collage_id = session()->get('selectedCollage')->id;
        $academicYear->name = $request->input('name');
        $academicYear->number_of_students = $request->input('number_of_students');
        $academicYear->save();
        return redirect('academic-years/create#main')->with('success' , 'Academic year created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academicYear = AcademicYear::find($id);
        return view('academic-year.show')->with('academicYear', $academicYear);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $academicYear = AcademicYear::find($id);
        return view('academic-year.edit')->with('academicYear', $academicYear);
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
                'number_of_students' => 'required',
            ]);
        $academicYear = AcademicYear::find($id);
        $academicYear->collage_id = session()->get('selectedCollage')->id;
        $academicYear->name = $request->input('name');
        $academicYear->number_of_students = $request->input('number_of_students');
        $academicYear->save();
        return redirect('academic-years#main')->with('success' , 'Academic year updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academicYear = AcademicYear::find($id);
        $academicYear->delete();
        return redirect('academic-years#main')->with('success', 'Academic Year deleted');
    }
}
