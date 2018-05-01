<?php

namespace App\Http\Controllers;

use App\CollageDocument;
use App\Course;
use App\CourseDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CollageDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseId = session()->get('selectedCourse')->id;
        $course = Course::find($courseId);
        $documents = $course->courseDocuments;
        return view('documents.documents')->with('documents', $documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
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
                'document' => 'required'
            ]);
        $courseDocument = new CollageDocument;
        $courseDocument->course_id = session()->get('selectedCourse')->id;
        $courseDocument->path = Storage::putFile('documents', $request->file('document'));
        $courseDocument->original_name = $request->file('document')->getClientOriginalName();
        $courseDocument->save();
        return redirect('/documents/create#main')->with('success', $courseDocument->original_name . ' Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $courseDocument = CollageDocument::find($id);
        return Storage::download($courseDocument->path, $courseDocument->original_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $document = CollageDocument::find($id);
        return view('documents.edit')->with('document', $document);
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
                'original_name' => 'required',
            ]);
        $document = CollageDocument::find($id);
        $document->original_name = $request->input('original_name');
        $document->save();
        return redirect('documents#main')->with('success' , 'Document Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseDocument = CollageDocument::find($id);
        Storage::delete($courseDocument->path);
        $courseDocument->delete();
        return redirect('/documents#main');
    }
}
