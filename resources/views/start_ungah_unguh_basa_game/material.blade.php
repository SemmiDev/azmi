<x-app-layout>
    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <h1 class="text-4xl text-center font-bold">{{ $ungahUnguhBasa->title }}</h1>

        <p class="text-center text-lg italic my-5">{{ $ungahUnguhBasa->description }}</p>

        <div class="flex justify-center mb-4">
            <div>
                <a href="{{ route('start_ungah_unguh_basa_game.play', ['ungahUnguhBasa' => $ungahUnguhBasa]) }}" class="px-4 py-2 flex gap-2 bg-sky-500 text-white rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                    Mula dolanan
                </a>
            </div>
        </div>

        @php
        // format $tembang->video
        // https://www.youtube.com/watch?v=XGSy3_Czz8k
        // https://youtu.be/XGSy3_Czz8k

        $video = $ungahUnguhBasa->video;
        $video = str_replace('https://www.youtube.com/watch?v=', '', $video);
        $video = str_replace('https://youtu.be/', '', $video);
        $video = str_replace('http://www.youtube.com/watch?v=', '', $video);
        $video = str_replace('http://youtu.be/', '', $video);
        $video = str_replace('www.youtube.com/watch?v=', '', $video);
        $video = str_replace('youtu.be/', '', $video);
        $video = str_replace('youtube.com/watch?v=', '', $video);
        $video = str_replace('youtube.com/watch?v=', '', $video);
        @endphp

        <div class="flex flex-col items-center gap-3">
            <iframe class="w-full max-w-xl rounded-2xl h-72" src="{{ 'https://www.youtube.com/embed/' . $video }}"
                frameborder="2" allowfullscreen>
            </iframe>

            <p class="text-starttext-xl mt-5">{{ $ungahUnguhBasa->text }}</p>
        </div>

    </div>
</x-app-layout>
