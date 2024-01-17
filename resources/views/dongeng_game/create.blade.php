<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Tambah Dongeng Game') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <form action="{{ route('dongeng_game.store', ['dongeng' => $dongeng]) }}" method="POST">
            @csrf

            <input type="hidden" name="dongeng_id" value="{{ $dongeng->id }}">

            <div class="mb-4">
                <label for="question" class="block text-sm font-medium text-gray-600">Pertanyaan</label>
                <textarea name="question" placeholder="Apa yang ingin kamu tanyakan?"
                    id="question" cols="30" rows="3"
                    class="mt-1 p-2 border rounded-md w-full @error('question') border-red-500 @enderror">{{ old('question') }}</textarea>
                @error('question')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="answer" class="block text-sm font-medium text-gray-600">Jawaban</label>
                <textarea name="answer" placeholder="Apa jawaban dari pertanyaan di atas?"
                    id="answer" cols="30" rows="3"
                    class="mt-1 p-2 border rounded-md w-full @error('answer') border-red-500 @enderror">{{ old('answer') }}</textarea>
                @error('answer')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
                <a href="{{ route('dongeng_game.index', ['dongeng' => $dongeng]) }}"
                    class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Batal</a>
            </div>
        </form>
    </div>

</x-app-layout>
