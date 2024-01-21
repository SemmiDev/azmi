<x-app-layout>
    @php
        $colors = [
            'bg-gradient-to-r from-sky-200 to-pink-200',
            'bg-gradient-to-r from-green-200 to-blue-200',
            'bg-gradient-to-r from-yellow-200 to-red-200',
            'bg-gradient-to-r from-pink-200 to-yellow-200',
            'bg-gradient-to-r from-blue-200 to-green-200',
            'bg-gradient-to-r from-red-200 to-sky-200',
        ];
    @endphp

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-100 to-pink-200 shadow-md">
        <div class="flex justify-center mb-4">
            <div>
                <a href="{{ route('start_arane_kewan_game.play') }}" class="px-4 py-2 flex gap-2 bg-blue-500 text-white rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                    Mula dolanan
                </a>
            </div>
        </div>

        <div class="grid grid-cols-4 p-2 justify-center items-center gap-10">
            @foreach ($daftarArane as $i => $arane)
                @php
                    $color = $colors[$i % count($colors)];
                @endphp

                <div class="flex flex-col gap-2 items-center {{ $color }} p-5 rounded-xl shadow-md">
                    <img src="{{ asset('storage/' . $arane->background) }}" alt="{{ $arane->title }}"
                        class="w-full max-w-sm mx-auto object-cover rounded-2xl h-60">
                    <h1 class="text-2xl font-bold">{{ $arane->title }}</h1>
                    <audio controls>
                        <source src="{{ asset('storage/' . $arane->voice) }}" type="audio/mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <p class="text-start text-xl">{{ $arane->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
