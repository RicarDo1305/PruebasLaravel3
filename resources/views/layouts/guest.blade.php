<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vinculacion</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="shortcat icon" href="{{asset('/img/teclogo.png')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900">
            <div>
                <a href="/">
                    <img src="/img/teclogo.png" alt="logo tec huetamo" class="w-20 h-20 fill-current text-gray-500">
                </a>
            </div>

            <div class="md:max-w-xs mt-6 px-2 py-2 md:px-5 md:py-5 bg-gray-800 shadow-md md:overflow-auto
            rounded-md sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
