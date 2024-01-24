<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Detail Tembang Dolanan') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold mb-4">{{ $tembang->title }}</h1>
            <div>
                <a href="{{ route('tembang_dolanan.index') }}"
                    class="px-4 py-2 bg-sky-500 text-white rounded-md">Kembali</a>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
            <p>{{ $tembang->description }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Lirik</label>
            <p>{{ $tembang->lyric }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Gambar Latar Belakang</label>
            <img src="{{ asset('storage/' . $tembang->background) }}" alt="{{ $tembang->title }}"
                class="w-full max-w-sm rounded-2xl h-auto">
        </div>

        @php
        // format $tembang->video
        // https://www.youtube.com/watch?v=XGSy3_Czz8k
        // https://youtu.be/XGSy3_Czz8k

        $video = $tembang->video;
        $video = str_replace('https://www.youtube.com/watch?v=', '', $video);
        $video = str_replace('https://youtu.be/', '', $video);
        $video = str_replace('http://www.youtube.com/watch?v=', '', $video);
        $video = str_replace('http://youtu.be/', '', $video);
        $video = str_replace('www.youtube.com/watch?v=', '', $video);
        $video = str_replace('youtu.be/', '', $video);
        $video = str_replace('youtube.com/watch?v=', '', $video);
        $video = str_replace('youtube.com/watch?v=', '', $video);
        @endphp

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Video</label>
            <iframe
            class="w-full max-w-sm rounded-2xl h-72"
            src="{{ 'https://www.youtube.com/embed/' . $video }}" frameborder="2" allowfullscreen>
            </iframe>
        </div>

    </div>
</x-app-layout>
