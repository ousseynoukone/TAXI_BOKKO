<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('build/assets/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('build/assets/style.css') }}" rel="stylesheet">
            
        <title>TAXI BOKO</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-dark dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<script src="{{ asset('build/assets/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('build/assets/bootstrap.js') }}"></script>
<script src="{{ asset('build/assets/script.js') }}"></script>
<script src="{{ asset('build/assets/jquery-3.6.0.js') }}"></script>

<!--
<script src="{{ asset('build/assets/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('build/assets/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('build/assets/jquery.dataTables.js') }}"></script> -->


