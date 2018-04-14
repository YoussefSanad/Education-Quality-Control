<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collage;
use Illuminate\Support\Facades\Auth;
use App\Doctor;

class DoctorController extends Controller
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
        $doctors = Collage::find($collageId)->doctors;
        return view('doctor.doctors')->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
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
                'birth_date' => 'required',
                'graduation_uni' => 'required',
                'graduation_year' => 'required',
                'masters_percentage' => 'required',
                'masters_place_of_issue' => 'required',

            ]);
        $doctor = new Doctor;
        $doctor ->collage_id = session()->get('selectedCollage')->id;
        $doctor ->name = $request->input('name');
        $doctor ->birth_date = $request->input('birth_date');
        $doctor ->graduation_uni = $request->input('graduation_uni');
        $doctor ->graduation_year = $request->input('graduation_year');
        $doctor ->masters_percentage = $request->input('masters_percentage');
        $doctor ->masters_place_of_issue = $request->input('masters_place_of_issue');
        $doctor ->save();
        return redirect('doctors/create')->with('success' , 'Doctor added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctor.show')->with('doctor', $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctor.edit')->with('doctor', $doctor);
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
                'birth_date' => 'required',
                'graduation_uni' => 'required',
                'graduation_year' => 'required',
                'masters_percentage' => 'required',
                'masters_place_of_issue' => 'required',

            ]);
        $doctor = Doctor::find($id);
        $doctor ->name = $request->input('name');
        $doctor ->birth_date = $request->input('birth_date');
        $doctor ->graduation_uni = $request->input('graduation_uni');
        $doctor ->graduation_year = $request->input('graduation_year');
        $doctor ->masters_percentage = $request->input('masters_percentage');
        $doctor ->masters_place_of_issue = $request->input('masters_place_of_issue');
        $doctor ->save();
        return redirect('doctors')->with('success' , 'Doctor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect('/doctors')->with('success' , 'Doctor deleted');

    }
}
