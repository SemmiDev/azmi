<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Edit Tembang Dolanan') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <form action="{{ route('tembang_dolanan.update', $tembang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="title" id="title" placeholder="Judul Tembang"
                    value="{{ old('title', $tembang->title ?? '') }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="description" placeholder="Deskripsi Tembang"
                    id="description" cols="30" rows="3" class="mt-1 p-2 border rounded-md w-full">{{ old('description', $tembang->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="lyric" class="block text-sm font-medium text-gray-600">Lirik</label>
                <textarea placeholder="Lirik Tembang" name="lyric"
                    id="lyric" cols="30" rows="7" class="mt-1 p-2 border rounded-md w-full">{{ old('lyric', $tembang->lyric ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="background" class="block text-sm font-medium text-gray-600">Gambar Latar Belakang</label>
                <input type="file" name="background" id="background" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="video" class="block text-sm font-medium text-gray-600">Link Video YouTube</label>
                <input type="text" name="video" id="video" placeholder="Link Video YouTube"
                    value="{{ old('video', $tembang->video ?? '') }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
                <a href="{{ route('tembang_dolanan.index') }}"
                    class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
