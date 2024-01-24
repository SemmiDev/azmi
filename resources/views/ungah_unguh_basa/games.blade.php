<x-app-layout>

    <h2 class="font-semibold text-3xl text-center  my-5 leading-tight text-gray-600">
        {{ __('Ungah Unguh Basa') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col gap-3">
                @foreach ($games as $game)
                    <div class="bg-sky-400 flex gap-12 from-blue-300 to-green-300 p-6 rounded-lg shadow-md">
                        <div class="flex justify-between items-center w-full">

                            <div>
                                <h3 class="text-4xl font-semibold text-white mb-2">{{ $game->title }}</h3>
                                <p class="text-lg text-white mb-2">{{ $game->description }}</p>
                            </div>

                            <div class="flex justify-between">
                                <a href="{{ route('start_ungah_unguh_basa_game.material', ['ungahUnguhBasa' => $game]) }}"
                                    class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-3 rounded-md">
                                    Materi
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
