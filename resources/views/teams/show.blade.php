<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Team Details') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="text-lg font-semibold mb-4">{{ $team->name }}</h3>
                <p class="text-gray-700 mb-4">Description: {{ $team->description }}</p>

                <!-- Example: Display team members -->
                <h4 class="text-lg font-semibold mt-8">Team Members:</h4>
                <ul>
                    @foreach ($teamMembers as $member)
                        <li>{{ $member->name }} ({{ $member->email }})</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
