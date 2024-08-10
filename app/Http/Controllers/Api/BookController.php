<?php

namespace App\Http\Controllers\Api;

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
        return Book::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all()); // Create a new book
        return response()->json($book, 201); // Return the book and 201 status code
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id); // Find The Book
        if (!$book) {
            return response()->json(['message' => 'Book Not Found !'], 404); // Return 404 if the book doesn't exist
        }
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book Not Found !'], 404); // Return 404 if the book doesn't exist
        }
        $book->update($request->all()); // Update The Book
        return response()->json($book, 200); // Return the book and 200 status code
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book Not Found !'], 404); // Return 404 if the book doesn't exist
        }
        $book->delete(); // Delete the book
        return response()->json(['message' => 'Book deleted'], 200); // Return 200 status code and delete the book
    }
}
