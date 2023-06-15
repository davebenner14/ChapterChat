@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-semibold mb-4">Add Review</h1>
        <form action="{{ route('reviews.store', ['book' => $book->id]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="rating" class="block text-gray-700 text-sm font-bold mb-2">Rating:</label>
                <input type="number" name="rating" id="rating" class="w-full px-3 py-2 border rounded text-gray-800" min="1" max="5">
            </div>
            <div class="mb-4">
                <label for="review" class="block text-gray-700 text-sm font-bold mb-2">Review:</label>
                <textarea name="review" id="review" rows="5" class="w-full px-3 py-2 border rounded text-gray-800"></textarea>
            </div>
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div>
                <button type="submit" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded">Submit Review</button>
                <a href="{{ route('books.show', $book) }}" class="ml-2 text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
@endsection
