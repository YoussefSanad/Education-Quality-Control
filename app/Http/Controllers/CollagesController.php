<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Collage;

class CollagesController extends Controller
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
        if(!Auth::user()->is_admin)
            $collages = Auth::user()->collages;
        else
            $collages = Collage::all();
        return view('collage.collages')->with('collages', $collages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->collage)
            return view('collage.show-collage')->with('collage', Auth::user()->collage);
        else
            return view('collage.create');
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
            'email' => 'required',
            'location' => 'required',
            'area' => 'required',
            'phone' => 'required',
            'fax' => 'required',
            'number_of_halls' => 'required',
            'number_of_labs' => 'required',
            'number_of_classrooms' => 'required'
        ]);
        $collage = new Collage;
        $collage->name = $request->input('name');
        $collage->user_id = Auth::id();
        $collage->email = $request->input('email');
        $collage->location = $request->input('location');
        $collage->area = $request->input('area');
        $collage->phone = $request->input('phone');
        $collage->fax = $request->input('fax');
        $collage->number_of_halls = $request->input('number_of_halls');
        $collage->number_of_labs = $request->input('number_of_labs');
        $collage->number_of_classrooms = $request->input('number_of_classrooms');
        
        $collage->save();
        return redirect('/academic-years/create')->with('success' , 'collage created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collage = Collage::find($id);
        session(['selectedCollage' => $collage]);
        if(session()->get('selectedCourse'))
            session()->remove('selectedCourse');
        return view('collage.show-collage')->with('collage', $collage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collage = Collage::find($id);
        return view('collage.edit')->with('collage', $collage);
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
                'email' => 'required',
                'location' => 'required',
                'area' => 'required',
                'phone' => 'required',
                'fax' => 'required',
                'number_of_halls' => 'required',
                'number_of_labs' => 'required',
                'number_of_classrooms' => 'required'
            ]);
        $collage = Collage::find($id);
        $collage->name = $request->input('name');
        $collage->user_id = Auth::id();
        $collage->email = $request->input('email');
        $collage->location = $request->input('location');
        $collage->area = $request->input('area');
        $collage->phone = $request->input('phone');
        $collage->fax = $request->input('fax');
        $collage->number_of_halls = $request->input('number_of_halls');
        $collage->number_of_labs = $request->input('number_of_labs');
        $collage->number_of_classrooms = $request->input('number_of_classrooms');

        $collage->save();
        return redirect('/collages')->with('success' , 'collage updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collage = Collage::find($id);
        $collage->delete();
        return redirect('/collages')->with('success' , 'Collage deleted');
    }
}
