<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Tambah Ungah Unguh Basa') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <form action="{{ route('ungah_unguh_basa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="title" id="title" placeholder="Judul Ungah Unguh Basa"
                    value="{{ old('title', $ungahUnguhBasa->title ?? '') }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="description" placeholder="Deskripsi Ungah Unguh Basa."
                    id="description" cols="30" rows="3" class="mt-1 p-2 border rounded-md w-full">{{ old('description', $ungahUnguhBasa->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="text" class="block text-sm font-medium text-gray-600">Teks</label>
                <textarea placeholder="Teks Ungah Unguh Basa." name="text"
                    id="text" cols="30" rows="7" class="mt-1 p-2 border rounded-md w-full">{{ old('text', $ungahUnguhBasa->text ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="video" class="block text-sm font-medium text-gray-600">Video (Link YouTube)</label>
                <input type="text" name="video" id="video" placeholder="Link YouTube"
                    value="{{ old('video', $ungahUnguhBasa->video ?? '') }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-md">Simpan</button>
                <a href="{{ route('ungah_unguh_basa.index') }}"
                    class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
