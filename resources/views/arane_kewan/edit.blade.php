<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Edit Arane Kewan') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <form action="{{ route('arane_kewan.update', $araneKewan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="title" id="title" placeholder="Judul Arane Kewan"
                    value="{{ old('title', $araneKewan->title ?? '') }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="description" placeholder="Deskripsi Arane Kewan."
                    id="description" cols="30" rows="3" class="mt-1 p-2 border rounded-md w-full">{{ old('description', $araneKewan->description ?? '') }}</textarea>
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
                <a href="{{ route('arane_kewan.index') }}"
                    class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
