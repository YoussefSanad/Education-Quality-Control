<?php

namespace App\Http\Controllers;

use App\Collage;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
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
        $books = Collage::find($collageId)->books;
        return view('book.books')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
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
                'author' => 'required',
            ]);
        $book = new Book();
        $book->collage_id = session()->get('selectedCollage')->id;
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->save();
        return redirect('books/create')->with('success' , 'Book added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit')->with('book', $book);
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
                'author' => 'required',
            ]);
        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->save();
        return redirect('books/')->with('success' , 'Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('books/')->with('success' , 'Book Deleted');
    }
}
