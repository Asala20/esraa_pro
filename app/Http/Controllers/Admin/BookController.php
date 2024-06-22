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
            'book_file' => 'required|mimes:pdf,docx',
            'num_page' => 'required',
            'num_download' => 'required',
        ]);

        $book = new Book;
        $book->num_page = $request->num_page;
        $book->num_download = $request->num_download;
          if($request->hasFile('book')){
             $book = $request->file('book');
             $bookName = time() . '.' . $book->getClientOriginalExtension();
             $book->move(public_path('book'), $bookName);
             $project->book = $bookName;
         }

         $book->save();
            return response()->json([
            "message" => "book added"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
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
