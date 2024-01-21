<x-app-layout>

    <h1 class="text-3xl font-bold text-center mt-8">Dolanan Bareng Arane Kewan</h1>


    <div class="container mx-auto mt-8 p-5 rounded-sm bg-gradient-to-r from-sky-100 to-pink-200 shadow-md">
        <h1 class="text-3xl font-bold">Gambar</h1>
        <div class="grid mt-3 grid-cols-6 p-2 justify-center items-center gap-10">
            @foreach ($daftarArane as $i => $arane)
                <img src="{{ asset('storage/' . $arane->background) }}" alt="{{ $arane->title }}"
                    data-title="{{ $arane->title }}"
                    class="w-32 mx-auto hover:scale-110 hover:cursor-pointer transition-all duration-150 object-cover rounded-2xl h-32">
            @endforeach
        </div>
    </div>

    <div class="container mx-auto mt-2 p-5 rounded-sm bg-gradient-to-r from-sky-100 to-pink-200 shadow-md">
        <h1 class="text-3xl font-bold">Arane</h1>
        <div class="grid mt-3 grid-cols-6 p-2 justify-center items-center gap-10">
            @foreach ($daftarAraneShuffle as $i => $arane)
                <div
                    data-title="{{ $arane->title }}"
                    class="w-32 mx-auto flex justify-center items-center font-bold text-2xl hover:scale-110 hover:cursor-pointer transition-all duration-150 object-cover rounded-2xl h-32 bg-blue-400">
                    {{ $arane->title }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-center gap-3 mb-4 mt-12">
        <a
        href={{route('start_arane_kewan_game.play2')}}
        class="px-4 py-3 text-xl hover:bg-green-800 flex gap-2 bg-green-600 text-white rounded-md">
            Mulai
        </a>

        <a href="{{ route('start_arane_kewan_game.material') }}"
            class="px-4 py-3 text-xl hover:bg-red-800 flex gap-2 bg-red-600 text-white rounded-md">
            Kembali
        </a>
    </div>


    <script></script>

</x-app-layout>
