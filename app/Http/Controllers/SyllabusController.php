<?php

namespace App\Http\Controllers;


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
            $syllabuses = session()->get('selectedCourse')->syllabuses;
            session()->remove('selectedCourse');
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
                'goal' => 'required',
                'syllabuse_id' => 'required'
            ]);
        $syllabus = new Syllabus();
        $syllabus->syllabuse_id = $request->input('syllabuse_id');
        $syllabus->week_number = $request->input('week_number');
        $syllabus->goal = $request->input('goal');
        $syllabus->save();
        return redirect('syllabuses/create')->with('success' , 'Syllabus added');
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
                'goal' => 'required',
                'syllabuse_id' => 'required'
            ]);
        $syllabus = Syllabus::find($id);
        $syllabus->syllabuse_id = $request->input('syllabuse_id');
        $syllabus->week_number = $request->input('week_number');
        $syllabus->goal = $request->input('goal');
        $syllabus->save();
        return redirect('syllabuses')->with('success' , 'Syllabus updated');
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
        return redirect('courses')->with('success' , 'Syllabus deleted');

    }
}
