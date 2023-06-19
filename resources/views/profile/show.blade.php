@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-2xl mb-4 text-gray-800">{{ $user->name }}'s Profile Page</h2>
                <p class="text-gray-800 mb-4">Email: {{ $user->email }}</p>

                <p class="font-semibold text-gray-800">Bio:</p>
                <p class="text-gray-800">{{ $profileData->bio }}</p>

                <p class="font-semibold text-gray-800">Location:</p>
                <p class="text-gray-800">{{ $profileData->location }}</p>

                <div class="mt-6">
                    <a href="{{ route('books.index') }}" class="inline-block" style="background-color: #32CD32; color: white; padding: 8px 16px; border-radius: 4px; text-align: center; text-decoration: none; font-weight: 600;">Back to Books</a>
                    <a href="{{ route('profile.edit') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">Edit</a>
                </div>
                
                <div class="mt-8">
                    <h3 class="font-semibold text-lg mb-4 text-gray-800">Books Added:</h3>
                    @foreach($books as $book)
                        <div class="mb-2">
                            <p>
                                <a href="{{ route('books.show', ['book' => $book->id]) }}" class="book-title" style="color: blue;">{{ $book->title }}</a>
                            </p>
                            <p class="text-gray-700">{{ $book->description }}</p>
                        </div> 
                    @endforeach
                </div>
                
                <div class="mt-8">
                    <h3 class="font-semibold text-lg mb-4 text-gray-800">Reviews ({{ $reviews->count() }})</h3>
                    @foreach($reviews as $review)
                        <div class="mb-2">
                            <p class="text-gray-800">{{ $review->title }}</p>
                            <p class="text-gray-700">{{ $review->content }}</p>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection
