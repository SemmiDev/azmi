<x-app-layout>
    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <h1 class="text-4xl text-center font-bold">{{ $dongeng->title }}</h1>

        <p class="text-center text-lg italic my-5">{{ $dongeng->description }}</p>

        <div class="flex justify-center mb-4">
            <div>
                <a href="{{ route('start_dongeng_game.play', ['dongeng' => $dongeng]) }}" class="px-4 py-2 flex gap-2 bg-blue-500 text-white rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                    Mula dolanan
                </a>
            </div>
        </div>

        <div class="flex flex-col items-center gap-3">
            <img src="{{ asset('storage/' . $dongeng->background) }}" alt="{{ $dongeng->title }}"
                class="w-full max-w-xl mx-auto rounded-2xl h-96">
            <audio controls>
                <source src="{{ asset('storage/' . $dongeng->voice) }}" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>

            <p class="text-start text-xl">{{ $dongeng->story }}</p>
        </div>

    </div>
</x-app-layout>
