@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-4xl font-semibold mb-4 text-gray-800">{{ $book->title }}</h1>
            <!-- Show average rating -->
            @if(!is_null($averageRating))
                <p class="text-lg font-semibold mb-2 text-gray-800">Average Rating: {{ round($averageRating, 1) }}</p>
            @else
                <p class="text-lg font-semibold mb-2 text-gray-800">No Ratings Yet</p>
            @endif
            <p class="text-lg font-medium mb-2 text-gray-800">Author: {{ $book->author }}</p>
            <p class="text-lg font-medium mb-2 text-gray-800">Genre: {{ $book->genre }}</p>
            <p class="text-sm text-gray-500 mb-2">Added by: {{ $book->user->name }}</p>
            <p class="text-sm text-gray-500 mb-2">Team: {{ $book->team->name }}</p>
            @if ($book->created_at != $book->updated_at)
                <p class="text-sm text-gray-500 mb-2">Date Created: {{ $book->created_at->format('F d, Y') }}</p>
                <p class="text-sm text-gray-500 mb-2">Date Edited: {{ $book->updated_at->format('F d, Y') }}</p>
            @else
                <p class="text-sm text-gray-500 mb-2">Date Created: {{ $book->created_at->format('F d, Y') }}</p>
            @endif
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 flex-shrink-0">Summary</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="max-w-full overflow-hidden pl-6">{{ $book->summary }}</div>
                    </dd>
                </div>
            </dl>
        </div>
        <div class="px-4 py-3 sm:px-6">
            <a href="{{ route('books.edit', $book) }}" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded">Edit</a>
            <a href="{{ route('books.confirm-delete', $book) }}" class="bg-red-500 text-white font-semibold px-4 py-2 rounded">Delete</a>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="border-t border-gray-200 mt-8">
        <h2 class="text-2xl font-semibold mb-4">Reviews</h2>
        @foreach ($book->reviews as $review)
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4">
                <div class="px-4 py-5 sm:p-6">
                    <p class="text-lg font-medium mb-2 text-gray-800"><strong>Rating:</strong> {{ $review->rating }}</p>
                    <p class="text-gray-800">{{ $review->review }}</p>
                    <p class="text-sm text-gray-500">Reviewer: {{ $review->user->name }}</p>
                    <p class="text-sm text-gray-500">Posted on: {{ $review->created_at->format('F d, Y') }}</p>

                    @if(auth()->user()->id == $review->user_id)
                        <a href="{{ route('reviews.edit', ['review' => $review->id]) }}" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded">Edit</a>

                        <form action="{{ route('reviews.destroy', ['review' => $review->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white font-semibold px-4 py-2 rounded">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="px-4 py-3 sm:px-6">
            <a href="{{ route('reviews.create', ['book' => $book->id]) }}" class="bg-green-500 text-white font-semibold px-4 py-2 rounded">Add Review</a>
        </div>
    </div>
</div>
@endsection
