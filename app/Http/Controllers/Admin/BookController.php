<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_file' => 'required',
            'num_page' => 'required',
            'num_download' => 'required',
        ]);

        $book = new Book;
        $book->num_page = $request->num_page;
        $book->num_download = $request->num_download;
        if ($request->hasFile('book_file')) {
            $book_file = $request->file('book_file');
            $book_fileNam = time() . '.' . $book_file->getClientOriginalExtension();
            $book_file->move(public_path('BookFiles'), $book_fileNam);
            $book->book_file = $book_fileNam;
        }
        $book->save();
            return response()->json([
            "message" => "book added"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $book = Book::find($id);
        if(!empty($book))
        {
        return response()->json($book);
        }
            else
        {
        return response()->json([
        "message" => "Not Found book"
            ] , 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
