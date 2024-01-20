<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight text-gray-600">
                {{ __('Game Board - ' . $tembangDolanan->title) }}
            </h2>

            <a href="{{ route('tembang_dolanan.index') }}"
            class="bg-gradient-to-r from-red-500 to-red-500 text-white px-4 py-2 rounded-md">Kembali</a>
        </div>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <form id="gameForm" class="flex flex-col gap-5">
            @csrf
            <h1 class="text-xl font-semibold max-w-3xl mx-auto text-center">{{ $question['current']['question'] }}</h1>

            <div class="flex gap-12 justify-between items-center w-full">

                @if ($question['prev'])
                    <a href="{{ route('start_tembang_dolanan_game.getQuestion', [
                        'id' => $question['current']['id'],
                        'index' => $question['prevIndex'],
                        'tembangDolanan' => $tembangDolanan,
                    ]) }}"
                        class="w-32 flex gap-2 items-center flex-col font-semibold text-sky-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-12 h-12 text-sky-400 hover:scale-110">
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z"
                                clip-rule="evenodd" />
                        </svg>
                        Sadurunge
                    </a>
                @else
                    <div class="w-32">

                    </div>
                @endif

                {{-- @dd($question['current']) --}}
                <div class="max-w-xl flex flex-wrap gap-2">
                    @foreach ($question['current']['options'] as $i => $opt)
                        <button type="button" data-opt="{{$i}}"
                        data-index="{{$question['index']}}"
                                class="optionButton hover:bg-sky-500 px-3 py-2 rounded-lg text-white
                                {{ $question['current']['answer'] == $i ? 'bg-sky-500' : 'bg-black'}}
                                ">
                            @php
                                $i = strtoupper($i);

                                echo $i . '. ';
                            @endphp

                            {{$opt}}
                        </button>
                    @endforeach
                </div>

                @if ($question['next'])
                    <a href="{{ route('start_tembang_dolanan_game.getQuestion', [
                        'id' => $question['current']['id'],
                        'index' => $question['nextIndex'],
                        'tembangDolanan' => $tembangDolanan,
                    ]) }}"
                        class="w-32 currentAnswer flex gap-2 items-center flex-col font-semibold text-sky-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-12 h-12 text-sky-400 hover:scale-110">
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z"
                                clip-rule="evenodd" />
                        </svg>
                        Salajengipun
                    </a>
                @else
                    <div class="w-32">

                    </div>
                @endif
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('.optionButton').click(function () {
                // Reset background color for all buttons
                $('.optionButton').css('background-color', '#000000');

                // add sky-500 class
                $(this).css('background-color', '#60A5FA');

                const form = $('#gameForm');
                const formData = new FormData(form[0]);

                let index = $(this).data('index');
                let answer = $(this).data('opt');

                console.log(index);
                console.log(answer);

                // url: '{{ route('start_tembang_dolanan_game.setAnswer') }}'


                $.ajax({
                    type: 'POST',
                    url: '{{ route('start_tembang_dolanan_game.setAnswer') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        index: index,
                        answer: answer,
                    },
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (data) {
                        console.log(data);
                        alert('Jawaban gagal disimpan');
                    }
                });

            });
        });
    </script>

</x-app-layout>
