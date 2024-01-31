<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Selamat Datang di Pembelajaran yang akan dipelajari ') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Card 1 -->
                <div class="bg-gradient-to-br from-blue-300 to-green-300 p-6 rounded-lg shadow-md">
                    <img src="/tembang-dolanan.png" alt="Image 1" class="mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-white mb-2">Tembang Dolanan</h3>
                    <div class="flex justify-between">
                        {{-- <a href="#"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">Materi</a> --}}
                        <a href="{{route('tembang_dolanan.games')}}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">Game</a>
                        @if (Auth::user()->role == 'guru')
                            <a href="{{route('tembang_dolanan.index')}}"
                                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md">Kelola</a>
                        @endif
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-gradient-to-br from-purple-300 to-red-300 p-6 rounded-lg shadow-md">
                    <img src="/arane-kewan.png" alt="Image 2" class="mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-white mb-2">Arane Kewan</h3>
                    <div class="flex justify-between">
                        {{-- <a href="#"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">Materi</a> --}}
                        <a href="{{route('start_arane_kewan_game.material')}}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">Game</a>
                        @if (Auth::user()->role == 'guru')
                            <a href="{{route('arane_kewan.index')}}"
                                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md">Kelola</a>
                        @endif
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-gradient-to-br from-green-300 to-blue-300 p-6 rounded-lg shadow-md">
                    <img src="/unguh-unguh-basa.png" alt="Image 3" class="mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-white mb-2">Ungah-Unguh Basa</h3>
                    <div class="flex justify-between">
                        <a href="{{route('ungah_unguh_basa.games')}}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">Game</a>
                        @if (Auth::user()->role == 'guru')
                            <a href="{{route('ungah_unguh_basa.index')}}"
                                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md">Kelola</a>
                        @endif
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-gradient-to-br from-red-300 to-purple-300 p-6 rounded-lg shadow-md">
                    <img src="/dongeng.png" alt="Image 4" class="mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-white mb-2">Dongeng</h3>
                    <div class="flex justify-between">
                        {{-- <a href="#"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">Materi</a> --}}
                        <a href="{{route('dongeng.games')}}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">Game</a>
                        @if (Auth::user()->role == 'guru')
                            <a href="{{route('dongeng.index')}}"
                                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md">Kelola</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
