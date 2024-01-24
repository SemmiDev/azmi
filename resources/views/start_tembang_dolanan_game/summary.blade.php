<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight text-gray-600">
                {{ __('Summary') }}
            </h2>
            <a href="{{ route('tembang_dolanan.index') }}"
            class="bg-gradient-to-r from-red-500 to-red-500 text-white px-4 py-2 rounded-md">Kembali</a>
        </div>

    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <h1 class="text-2xl font-semibold mb-4">
            Hasil Quiz
        </h1>

        <div class="grid grid-cols-1 gap-4 bg-white rounded-xl p-5">
            @foreach ($questions as $no => $question)
                <div class="border p-4 rounded-md">
                    <p class="text-3xl font-semibold mb-2">{{$no += 1}} . {{ $question['question'] }}</p>
                    <p class="text-xl mb-2">Jawaban Kamu: <span class="font-bold text-sky-600">{{ $question['answer'] }}</span>
                        {{$question['status'] == 'correct' ? '✅' : '❌'}}

                    </p>
                    <p class="text-xl mb-2">Pilihan:</p>
                    <ul class="list-disc ml-4">
                        @foreach ($question['options'] as $i => $option)
                            <li>
                                @php
                                    $i = strtoupper($i);

                                    echo $i . '. ';
                                @endphp
                                {{ $option }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
