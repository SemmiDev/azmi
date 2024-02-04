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
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .carousel {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        .carousel-item {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-item.active {
            opacity: 1;
        }

        .carousel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #2d3748;
        }

        .btn-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 2rem;
        }

        .btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-block;
        }

        .btn1 { background-color: #f9a826; }
        .btn2 { background-color: #60a5fa; }
        .btn3 { background-color: #f7fafc; }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="carousel">
        <div id="item1" class="carousel-item active">
            <img src="/1.jpeg" alt="Image 1" />
        </div>
        <div id="item2" class="carousel-item">
            <img src="/2.jpeg" alt="Image 2" />
        </div>
        <div id="item3" class="carousel-item">
            <img src="/3.jpeg" alt="Image 3" />
        </div>

        <div class="text-container flex flex-col gap-2 bg-yellow-200 p-4 items-center shadow-yellow-600 shadow-xl  rounded-xl">
            <h1 class="text-2xl font-bold">BELAJAR DAN MENGENAL BAHASA JAWA DENGAN</h1>
            <h1 class="text-4xl font-bold">LEBIH MENYENANGKAN</h1>
            <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-xl w-fit  bg-sky-300 text-xl mt-5">Mulai</a>
        </div>

        <div class="btn-container">
            <a href="#item1" class="w-12 h-12 btn1 btn  bg-red-500 rounded-full"></a>
            <a href="#item2" class="w-12 h-12 btn2 btn  bg-yellow-500 rounded-full"></a>
            <a href="#item3" class="w-12 h-12 btn3 btn bg-green-500 rounded-full"></a>
        </div>
    </div>

    <script>
        // Add JavaScript to handle image switching
        const items = document.querySelectorAll('.carousel-item');
        const btns = document.querySelectorAll('.btn');

        btns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                items.forEach(item => item.classList.remove('active'));
                items[index].classList.add('active');
            });
        });

        // i want periodical image switching
        let current = 0;
        setInterval(() => {
            items.forEach(item => item.classList.remove('active'));
            items[current].classList.add('active');
            current = (current + 1) % items.length;
        }, 1500);

    </script>
</body>

</html>
