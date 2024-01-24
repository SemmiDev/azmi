<x-app-layout>

    <h2 class="font-semibold text-3xl text-center  my-5 leading-tight text-gray-600">
        {{ __('Tembang Dolanan') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col gap-3">
                @foreach ($tembangs as $dongeng)
                    <div class="bg-sky-400 flex gap-12 from-blue-300 to-green-300 p-6 rounded-lg shadow-md">
                        <img src="{{ asset('storage/' . $dongeng->background) }}" alt="{{ $dongeng->title }}"
                            class="mb-4 h-56 rounded-md">
                        <div class="flex flex-col justify-between">
                            <div>
                                <h3 class="text-4xl font-semibold text-white mb-2">{{ $dongeng->title }}</h3>
                                <p class="text-lg text-white mb-2">{{ $dongeng->description }}</p>
                            </div>
                            <div class="flex justify-between">
                                <a href="{{ route('start_tembang_dolanan_game.material', ['tembangDolanan' => $dongeng]) }}"
                                    class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">
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
