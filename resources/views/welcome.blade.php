<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Si-Sawa</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.1/dist/full.min.css" rel="stylesheet" type="text/css" />

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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
</head>

<body
    class="h-screen flex justify-center min-h-screen bg-gradient-to-br from-rose-200 via-lavender-200 to-sky-200 flex-col items-center gap-3">
    <div>
        <h1 class="text-xl font-bold text-center">
            BELAJAR DAN MENGENAL BAHASA JAWA DENGAN
        </h1>
        <h1 class="text-3xl font-bold text-center">
            LEBIH MENYENANGKAN
        </h1>
    </div>

    <div class="carousel max-w-6xl">
        <div id="item1" class="carousel-item w-full">
            <img src="https://daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.jpg"
                class="w-full h-[600px] object-cover rounded-xl" />
        </div>
        <div id="item2" class="carousel-item w-full">
            <img src="https://daisyui.com/images/stock/photo-1565098772267-60af42b81ef2.jpg"
                class="w-full h-[600px] object-cover rounded-xl" />
        </div>
        <div id="item3" class="carousel-item w-full">
            <img src="https://daisyui.com/images/stock/photo-1572635148818-ef6fd45eb394.jpg"
                class="w-full  h-[600px] object-cover rounded-xl" />
        </div>
    </div>
    <div class="flex justify-center w-full py-2 gap-2">
        <a href="#item1" class="btn btn-sm">1</a>
        <a href="#item2" class="btn btn-sm">2</a>
        <a href="#item3" class="btn btn-sm">3</a>
        <a href="#item4" class="btn btn-sm">4</a>
    </div>

    <div class="flex justify-center w-full py-2 gap-2">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Mulai</a>
    </div>

</body>

</html>
