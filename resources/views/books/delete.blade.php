@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-4xl font-semibold mb-4">Delete Book</h1>
    <p>Are you sure you want to delete "{{ $book->title }}"?</p>
    <form action="{{ route('books.destroy', $book) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white font-semibold px-4 py-2 rounded">Delete</button>
        <a href="{{ route('books.show', $book) }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</div>
@endsection
