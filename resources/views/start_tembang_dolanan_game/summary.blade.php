<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-600">
            {{ __('Summary') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <h1 class="text-2xl font-semibold mb-4">
            Hasil Quiz
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 bg-white rounded-xl p-5">
            @foreach ($questions as $no => $question)
                <div class="border p-4 rounded-md">
                    <p class="text-lg font-semibold mb-2">{{$no += 1}} . {{ $question['question'] }}</p>
                    <p class="text-sm mb-2">Answer: {{ $question['answer'] }}
                        {{$question['status'] == 'correct' ? '✅' : '❌'}}

                    </p>
                    <p class="text-sm mb-2">Options:</p>
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
                    <div class="text-lg mt-2 font-bold">Status:
                        {!! $question['status'] == 'correct' ?
                            '<span class="text-green-500">Benar</span>' :
                            '<span class="text-red-500">Salah</span>'
                        !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
