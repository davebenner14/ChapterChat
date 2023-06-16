@extends('layouts.app')

@section('content')

<style>
    .fa-star, .fa-star-half-alt {
        color: #ffcc00;
    }
    .far.fa-star {
        color: #ccc; /* you may want to adjust this color to match your site */
    }
</style>

<div class="container mx-auto px-4">
    <h1 class="text-4xl font-semibold mb-4">Books</h1>
    <a href="{{ route('books.create') }}" style="display: inline-block; background-color: #32CD32; color: white; padding: 8px 16px; border-radius: 4px; text-align: center; text-decoration: none; font-weight: 600; margin-bottom: 20px;">Add New Book</a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($books as $book)
            <a href="{{ route('books.show', $book) }}">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $book->title }}
                        </h3>
                        <!-- Show average rating -->
                        @if(!is_null($book->averageRating))
                            <p class="text-lg font-semibold mb-2 text-gray-800">Average Rating: {!! generateStars(round($book->averageRating, 1)) !!}</p>
                        @else
                            <p class="text-lg font-semibold mb-2 text-gray-800">No Ratings Yet</p>
                        @endif
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Author: {{ $book->author }}
                        </p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Added by: {{ $book->user->name }}
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Summary
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ Str::limit($book->summary, 100) }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
