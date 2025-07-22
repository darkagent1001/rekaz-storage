<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dropdown.js'])
    @endif
    <title>{{ config('app.name') }} - @yield('page_title')</title>
</head>
<body>

    {{-- Alerts --}}
    @include('components.Alerts')
    {{-- Alerts --}}
    
    {{-- Navbar --}}
    @auth
        <header class="bg-gray-100 flex items-center justify-between px-4 py-5">
            <a href="{{ route('/') }}" class="font-medium text-2xl">{{ config('app.name') }}</a>
            <div class="flex items-center gap-4">
                <a href="{{ route('logout') }}" class="">Logout</a>
                <a href="{{ route('blob.create') }}">Upload new file</a>
            </div>
        </header>
    @endauth
    {{-- Navbar --}}

    {{-- Conetnt --}}
    <main class="container">
        @yield('content')
    </main>
    {{-- Conetnt --}}

</body>
</html>