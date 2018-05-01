<?php

namespace App\Http\Controllers;


use App\Course;
use App\Syllabus;
use Illuminate\Http\Request;

class SyllabusController extends Controller
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
        if( session()->get('selectedCourse')) {
            $courseId = session()->get('selectedCourse')->id;
            $syllabuses = Course::find($courseId)->syllabuses;
        }
        else{
            $syllabuses = Syllabus::all();
        }
        return view('syllabus.syllabuses')->with('syllabuses', $syllabuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('syllabus.create');
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
                'week_number' => 'required',
                'sub_topic'=> 'required',
                'theoretical_hours'=> 'required',
                'practical_hours'=> 'required'
            ]);
        $syllabus = new Syllabus();
        $syllabus->course_id = session()->get('selectedCourse')->id;
        $syllabus->week_number = $request->input('week_number');
        $syllabus->sub_topic = $request->input('sub_topic');
        $syllabus->theoretical_hours = $request->input('theoretical_hours');
        $syllabus->practical_hours = $request->input('practical_hours');
        $syllabus->total_hours = intval($syllabus->theoretical_hours) + intval($syllabus->practical_hours);
        $syllabus->save();
        return redirect('syllabuses/create#main')->with('success' , 'Syllabus added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $syllabus = Syllabus::find($id);
        return view('syllabus.show')->with('syllabus', $syllabus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $syllabus = Syllabus::find($id);
        return view('syllabus.edit')->with('syllabus', $syllabus);
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
                'week_number' => 'required',
                'sub_topic'=> 'required',
                'theoretical_hours'=> 'required',
                'practical_hours'=> 'required'
            ]);
        $syllabus = Syllabus::find($id);
        $syllabus->week_number = $request->input('week_number');
        $syllabus->sub_topic = $request->input('sub_topic');
        $syllabus->theoretical_hours = $request->input('theoretical_hours');
        $syllabus->practical_hours = $request->input('practical_hours');
        $syllabus->total_hours = intval($syllabus->theoretical_hours) + intval($syllabus->practical_hours);
        return redirect('syllabuses#main')->with('success' , 'Syllabus updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $syllabus = Syllabus::find($id);
        $syllabus->delete();
        return redirect('courses#main')->with('success' , 'Syllabus deleted');


    }
}
