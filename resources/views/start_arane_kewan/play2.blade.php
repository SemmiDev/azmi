<x-app-layout>

    <h1 class="text-3xl font-bold text-center mt-8">Dolanan Bareng Arane Kewan</h1>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-100 to-pink-200 shadow-md">
        <h1 class="text-3xl font-bold">Gambar</h1>
        <div class="grid mt-3 grid-cols-6 p-2 justify-center items-center gap-10">
            @foreach ($daftarArane as $i => $arane)
                <div data-angka="{{ $i + 1 }}" data-title="{{ $arane->title }}"
                    class="pilihan-atas w-32 mx-auto flex justify-center items-center font-bold text-2xl hover:scale-110 hover:cursor-pointer transition-all duration-150 object-cover rounded-2xl h-32 bg-yellow-400">
                    {{ $i + 1 }}
                </div>
            @endforeach
        </div>
    </div>


    <div class="container mx-auto mt-2 p-5 rounded-xl bg-gradient-to-r from-sky-100 to-pink-200 shadow-md">
        <h1 class="text-3xl font-bold">Arane</h1>
        <div class="grid mt-3 grid-cols-6 p-2 justify-center items-center gap-10">
            @foreach ($daftarAraneShuffle as $i => $arane)
                <div data-angka="{{ $i + 1 }}" data-title="{{ $arane->title }}"
                    class="pilihan-bawah w-32 mx-auto flex justify-center items-center font-bold text-2xl hover:scale-110 hover:cursor-pointer transition-all duration-150 object-cover rounded-2xl h-32 bg-blue-400">
                    {{ $i + 1 }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-center gap-3 mb-4 mt-12">

        <div id="pilihan-atas" class="px-4 py-3 text-xl flex gap-2 bg-yellow-500 text-white rounded-md">
            {{-- pilihan atas --}}
        </div>
        <div id="pilihan-bawah" class="px-4 py-3 text-xl mr-12 flex gap-2 bg-sky-500 text-white rounded-md">
            {{-- pilihan bawah --}}
        </div>

        <button id="mrikse"
            class="px-4 py-3 text-xl hover:bg-green-800 flex gap-2 bg-green-600 text-white rounded-md">
            Mriksa Bebener
        </button>

        <a href="{{ route('start_arane_kewan_game.material') }}"
            class="px-4 py-3 text-xl hover:bg-red-800 flex gap-2 bg-red-600 text-white rounded-md">
            Kembali
        </a>
    </div>


    {{-- pop up for show the result, default hidden, show in the center page --}}
    <div id="popup" class="fixed hidden inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-5 rounded-xl shadow-md">
            <p class="text-2xl font-bold" id="hasil"></p>
            <div class="flex justify-center gap-3 mt-4">
                <button id="main-lagi"
                    class="px-4 py-3 text-xl hover:bg-green-800 flex gap-2 bg-green-600 text-white rounded-md">
                    Main Lagi
                </button>
            </div>
        </div>
    </div>


    <script>
        const pilihanAtas = document.querySelectorAll('.pilihan-atas');
        const pilihanBawah = document.querySelectorAll('.pilihan-bawah');
        const pilihanAtasContainer = document.querySelector('#pilihan-atas');
        const pilihanBawahContainer = document.querySelector('#pilihan-bawah');

        pilihanAtas.forEach(pilihan => {
            pilihan.addEventListener('click', () => {
                pilihanAtasContainer.innerHTML = pilihan.dataset.angka;
                pilihanAtasContainer.dataset.title = pilihan.dataset.title;
            })
        })

        pilihanBawah.forEach(pilihan => {
            pilihan.addEventListener('click', () => {
                pilihanBawahContainer.innerHTML = pilihan.dataset.angka;
                pilihanBawahContainer.dataset.title = pilihan.dataset.title;
            })
        })

        const mrikse = document.querySelector('#mrikse');
        mrikse.addEventListener('click', () => {
            const pilihanAtas = document.querySelector('#pilihan-atas');
            const pilihanBawah = document.querySelector('#pilihan-bawah');

            let msg = '';
            if (pilihanAtas.dataset.title === pilihanBawah.dataset.title) {
                msg = 'Jawabanmu Bener';
            } else {
                msg = 'Jawabanmu Salah';
            }

            const hasil = document.querySelector('#hasil');
            hasil.innerHTML = msg;

            const popup = document.querySelector('#popup');
            popup.classList.remove('hidden');

            const mainLagi = document.querySelector('#main-lagi');
            mainLagi.addEventListener('click', () => {
                popup.classList.add('hidden');
            })
        })
    </script>
</x-app-layout>
