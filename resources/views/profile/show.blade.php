<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="text-lg font-semibold mb-4">{{ $user->name }}</h3>
                <p class="text-gray-700 mb-4">Email: {{ $user->email }}</p>

                <!-- Example: Display additional profile data -->
                <p class="text-gray-700">Profile Bio: {{ $profileData->bio }}</p>
                <p class="text-gray-700">Profile Location: {{ $profileData->location }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
