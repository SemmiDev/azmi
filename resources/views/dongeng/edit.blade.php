<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Edit Dongeng') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <form action="{{ route('dongeng.update', $dongeng->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="title" id="title" placeholder="Kancil dan Buaya"
                    value="{{ old('title', $dongeng->title ?? '') }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="description" placeholder="Kancil dan Buaya adalah dongeng yang berasal dari Jawa Tengah."
                    id="description" cols="30" rows="3" class="mt-1 p-2 border rounded-md w-full">{{ old('description', $dongeng->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="story" class="block text-sm font-medium text-gray-600">Cerita</label>
                <textarea placeholder="Pada suatu hari, Kancil sedang berjalan-jalan di tepi sungai. Tiba-tiba ... " name="story"
                    id="story" cols="30" rows="7" class="mt-1 p-2 border rounded-md w-full">{{ old('story', $dongeng->story ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="background" class="block text-sm font-medium text-gray-600">Gambar Latar Belakang</label>
                <input type="file" name="background" id="background" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="voice" class="block text-sm font-medium text-gray-600">Suara (MP3)</label>
                <input type="file" name="voice" id="voice" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-md">Simpan</button>
                <a href="{{ route('dongeng.index') }}"
                    class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
