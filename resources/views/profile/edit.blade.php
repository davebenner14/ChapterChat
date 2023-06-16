@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-2xl mb-4 text-gray-800">Edit Profile</h2>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <p class="font-semibold text-gray-800">Edit Username:</p>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="border border-gray-300 p-2 rounded-md w-full font-semibold text-gray-800">
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold text-gray-800">Edit Bio:</p>
                        <textarea name="bio" id="bio" rows="4" class="border border-gray-300 p-2 rounded-md w-full font-semibold text-gray-800">{{ $profileData->bio }}</textarea>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold text-gray-800">Edit Location:</p>
                        <input type="text" name="location" id="location" value="{{ $profileData->location }}" class="border border-gray-300 p-2 rounded-md w-full font-semibold text-gray-800">
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
