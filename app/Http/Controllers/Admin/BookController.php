<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Log;
// word libraries
// use Phpdocx\Create\CreateDocx;
// use Phpdocx\Elements\WordFragment;


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
        $request->validate([
            'book_file' => 'required|mimes:pdf|max:10000', // Adjust the max size as needed
        ]);

        if ($request->hasFile('book_file')) {
            try {
                $file = $request->file('book_file');
                $path = $file->store('books');

                // Count the number of pages
                $numPages = Book::countPages(Storage::path($path));

                // Save book details to the database
                $book = Book::create([
                    'book_file' => $path,
                    'num_page' => $numPages, // Ensure num_page is set
                    'num_download' => 0,
                ]);

                return response()->json($book, 201);
            } catch (Exception $e) {
                // Handle error during PDF parsing or database operations
                return response()->json(['error' => 'Failed to process the PDF file'], 500);
            }
        }

        return response()->json(['error' => 'File upload failed'], 400);
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
