<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        .gradient {
            background: linear-gradient(90deg, #3389d5 0%, #51da83 100%);
        }
    </style>
</head>
<body class="font-sans antialiased" style="font-family: 'Source Sans Pro', sans-serif;"/>
<div class="flex flex-col h-screen justify-between bg-gray-100">
@include('layouts.navigation')

<!-- Page Content -->
    <main class="mb-auto @if(request()->routeIs('welcome')) gradient @endif">
        {{ $slot }}
    </main>
    <!--Footer-->
    <footer class="bg-white text-center">
        <p class="text-lg">Made with ♥ - Powered by <a href="https://torre.co" target="_blank">Torre.co</a></p>
    </footer>
</div>

</body>

</html>
