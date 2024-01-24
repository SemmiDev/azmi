<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Tambah Ungah Unguh Basa Game') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <form
        enctype="multipart/form-data"
        action="{{ route('ungah_unguh_basa_game.store', ['ungahUnguhBasa' => $ungahUnguhBasa]) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="question" class="block text-sm font-medium text-gray-600">Pertanyaan</label>
                <textarea name="question" placeholder="Apa pertanyaan yang ingin kamu tanyakan?" id="question" cols="30" rows="3"
                required
                class="mt-1 p-2 border rounded-md w-full @error('question') border-red-500 @enderror">{{ old('question') }}</textarea>
                @error('question')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="answer1" class="block text-sm font-medium text-gray-600">Jawaban Karakter 1</label>
                <textarea name="answer1" placeholder="Apa jawaban dari pertanyaan di atas?" id="answer1" cols="30" rows="3"
                required
                class="mt-1 p-2 border rounded-md w-full @error('answer1') border-red-500 @enderror">{{ old('answer1') }}</textarea>
                @error('answer1')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="answer2" class="block text-sm font-medium text-gray-600">Jawaban Karakter 2</label>
                <textarea name="answer2" placeholder="Apa jawaban dari pertanyaan di atas?" id="answer2" cols="30" rows="3"
                required
                class="mt-1 p-2 border rounded-md w-full @error('answer2') border-red-500 @enderror">{{ old('answer2') }}</textarea>
                @error('answer2')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image1" class="block text-sm font-medium text-gray-600">Gambar Karakter 1</label>
                <input type="file" name="image1" id="image1"
                required
                class="mt-1 p-2 border rounded-md w-full @error('image1') border-red-500 @enderror">
                @error('image1')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image2" class="block text-sm font-medium text-gray-600">Gambar Karakter 2</label>
                <input type="file" name="image2" id="image2"
                required
                class="mt-1 p-2 border rounded-md w-full @error('image2') border-red-500 @enderror">
                @error('image2')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Add 5 inputs for options --}}
            @for ($i = 1; $i <= 5; $i++)
                <div class="mb-4">
                    <label for="option{{ $i }}" class="block text-sm font-medium text-gray-600">Option
                        {{ $i }}</label>
                    <input type="text" name="options[]" placeholder="Option {{ $i }}"
                        id="option{{ $i }}" required
                        class="mt-1 p-2 border rounded-md w-full @error('options.' . ($i - 1)) border-red-500 @enderror"
                        value="{{ old('options.' . ($i - 1)) }}">
                    @error('options.' . ($i - 1))
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endfor

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-md">Simpan</button>
                <a href="{{ route('ungah_unguh_basa_game.index', ['ungahUnguhBasa' => $ungahUnguhBasa]) }}"
                    class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Batal</a>
            </div>
        </form>
    </div>

</x-app-layout>
