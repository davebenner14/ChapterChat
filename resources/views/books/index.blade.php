@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-4xl font-semibold mb-4">Books</h1>
    <a href="{{ route('books.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded">Add New Book</a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($books as $book)
            <a href="{{ route('books.show', $book) }}">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $book->title }}
                        </h3>
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
