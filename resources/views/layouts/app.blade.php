<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Si-Sawa') }}</title>

    {{-- <style>
        .laravel-embed__responsive-wrapper {
            position: relative;
            /* height: 150px; */
            max-height: 20px;
            overflow: hidden;
            max-width: 50%;
            margin: auto;
            border-radius: 20px;
            /* // aspect ratio */






        }

        .laravel-embed__fallback,
        .laravel-embed__responsive-wrapper iframe,
        .laravel-embed__responsive-wrapper object,
        .laravel-embed__responsive-wrapper embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style> --}}


    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300;400;700&display=swap');

        body {
            font-family: 'Comic Neue', cursive;
            background-color: #f7fafc;
            color: #2d3748;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .bg-primary {
            background-color: #f9a826;
            /* Orange background */
        }

        .text-primary {
            color: #f9a826;
            /* Orange text color */
        }

        .bg-accent {
            background-color: #60a5fa;
            /* Blue background */
        }

        .text-accent {
            color: #60a5fa;
            /* Blue text color */
        }

        .shadow-card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="min-h-screen bg-gradient-to-br from-rose-200 via-lavender-200 to-sky-200">

        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-gradient-to-r from-blue-200 to-pink-200 shadow-md">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-800">
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
