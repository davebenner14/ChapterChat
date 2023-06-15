@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font overflow-hidden">
    <div class="container mx-auto flex px-5 pt-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Welcome to Our Book Club</h1>
            <p class="mb-8 leading-relaxed">
                Discover new books, write your own reviews, and share insights with a community of book lovers.
            </p>
            <div class="flex justify-center lg:justify-start">
                <a href="{{ url('/books') }}">
                    <button class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
                        Start Now
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
