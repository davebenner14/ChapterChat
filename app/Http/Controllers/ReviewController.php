<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Code to retrieve and display all reviews
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book)
    {
        return view('reviews.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'book_id' => 'required|exists:books,id',
        ]);

        // Create a new review
        $review = new Review();
        $review->rating = $request->input('rating');
        $review->review = $request->input('review');
        $review->book_id = $request->input('book_id');
        $review->user_id = auth()->user()->id;
        $review->save();

        // Redirect to the book's show page
        return redirect()->route('books.show', $request->input('book_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        // Code to display the review details
    }

 /**
 * Show the form for editing the specified resource.
 */
public function edit(Review $review)
{
    $book = $review->book; // you can access the book associated with the review like this
    return view('reviews.edit', compact('review', 'book'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);
    
        // Update the review
        $review->rating = $request->input('rating');
        $review->review = $request->input('review');
        $review->save();
    
        // Redirect to the book's show page
        return redirect()->route('books.show', $review->book_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        // Get the book's id before deleting the review
        $bookId = $review->book_id;
    
        // Delete the review
        $review->delete();
    
        // Redirect to the book's show page
        return redirect()->route('books.show', $bookId);
    }
    public function confirmDelete(Review $review)
{
    return view('reviews.delete', compact('review'));
}

    
}