@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-4xl font-semibold mb-4">Delete Review</h1>
    <p>Are you sure you want to delete this review?</p>
    <form action="{{ route('reviews.destroy', $review) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white font-semibold px-4 py-2 rounded">Delete</button>
        <a href="{{ route('books.show', $review->book) }}" style="display: inline-block; background-color: #808080; color: white; padding: 8px 16px; border-radius: 4px; text-align: center; text-decoration: none; font-weight: 600;">Cancel</a>
    </form>
</div>
@endsection
