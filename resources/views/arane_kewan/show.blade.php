<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Detail Arane Kewan') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold mb-4">{{ $araneKewan->title }}</h1>
            <div>
                <a href="{{ route('arane_kewan.index') }}" class="px-4 py-2 bg-sky-500 text-white rounded-md">Kembali</a>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
            <p>{{ $araneKewan->description }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Gambar Latar Belakang</label>
            <img src="{{ asset('storage/' . $araneKewan->background) }}" alt="{{ $araneKewan->title }}"
                class="w-full max-w-sm rounded-2xl h-auto">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Suara (MP3)</label>
            <audio controls>
                <source src="{{ asset('storage/' . $araneKewan->voice) }}" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>
</x-app-layout>
