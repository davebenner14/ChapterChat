@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-4xl font-semibold mb-4">Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded text-gray-800">
        </div>
        <div class="mb-4">
            <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
            <input type="text" name="author" id="author" class="w-full px-3 py-2 border rounded text-gray-800">
        </div>
        <div class="mb-4">
            <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
            <input type="text" name="genre" id="genre" class="w-full px-3 py-2 border rounded text-gray-800">
        </div>
        <div class="mb-4">
            <label for="summary" class="block text-gray-700 text-sm font-bold mb-2">Summary:</label>
            <textarea name="summary" id="summary" rows="5" class="w-full px-3 py-2 border rounded text-gray-800"></textarea>
        </div>
        <div>
            <button type="submit" style="display: inline-block; background-color: #32CD32; color: white; padding: 8px 16px; border-radius: 4px; text-align: center; text-decoration: none; font-weight: 600;">Save Book</button>
            <a href="{{ route('books.index') }}" style="display: inline-block; background-color: #808080; color: white; padding: 8px 16px; border-radius: 4px; text-align: center; text-decoration: none; font-weight: 600; margin-left: 0.5rem;">Cancel</a>
        </div>
    </form>
</div>
@endsection
