<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Chapter Chat') }}</title>

    <!-- Styles -->
    <link href="{{ asset('build/assets/app-33ccd2ce.css') }}" rel="stylesheet">

    <!-- Font Awesome for star icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="font-sans antialiased bg-blue-500 text-white" x-data="{ isOpen: false }">
    <nav class="bg-white p-6 mb-8">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-2xl font-bold text-gray-900" href="{{ url('/') }}">{{ config('app.name', 'Chapter Chat') }}</a>

            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative">
                        <button class="text-gray-800 hover:underline focus:outline-none" x-on:click="isOpen = !isOpen">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg" x-show="isOpen" x-on:click.away="isOpen = false">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('team') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Team</a>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <button class="text-gray-800" type="submit">Logout</button>
                    </form>
                @else
                    <a class="text-gray-800 mr-6" href="{{ route('login') }}">Login</a>
                    <a class="text-gray-800" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('build/assets/app-f1c6c2af.js') }}"></script>
    
    <!-- jQuery for star interactions -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
