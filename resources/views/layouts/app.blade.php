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

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}

            <footer class="py-10">
                <div class="mx-auto max-w-6xl">
                    <div class="text-center text-xs md:text-sm text-white">
                        INSTITUTO TECNOLÓGICO SUPERIOR DE HUETAMO
                    </div>
                     <div class="mt-1 text-center text-xs md:text-sm text-white">
                        Departamento de vinculación
                    </div>
                </div>    
            </footer>

        </main>
    </div>
</body>

</html>