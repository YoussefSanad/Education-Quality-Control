<?php

namespace App\Http\Controllers;

use App\Collage;
use App\CollageDocument;
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
        $collageId = session()->get('selectedCollage')->id;
        $collage = Collage::find($collageId);
        $documents = $collage->collageDocumetns;
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
        $collageDocument = new CollageDocument;
        $collageDocument->collage_id = session()->get('selectedCollage')->id;
        $collageDocument->path = Storage::putFile('documents', $request->file('document'));
        $collageDocument->original_name = $request->file('document')->getClientOriginalName();
        $collageDocument->save();
        return redirect('/documents/create')->with('success', $collageDocument->original_name . ' Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $collgeDocument = CollageDocument::find($id);
        return Storage::download($collgeDocument->path, $collgeDocument->original_name);
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
        return redirect('documents/')->with('success' , 'Document Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collgeDocument = CollageDocument::find($id);
        Storage::delete($collgeDocument->path);
        $collgeDocument->delete();
        return redirect('/documents');
    }
}
