<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight text-gray-600">
                {{ __('Game Board - ' . $dongeng->title) }}
            </h2>
            <h1 id="score" class="text-2xl font-semibold text-gray-600">Score: 0
            </h1>
        </div>
    </x-slot>

    <div class="container mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">
        <form id="gameForm">
            @csrf
            <div class="flex justify-center">
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="text-lg font-semibold text-center pr-4">PERTANYAAN</th>
                            <th class="text-lg font-semibold text-center pl-4">JAWABAN <br> (Masukkan angka saja)</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($qa as $question)
                            <tr>
                                <td class="text-center py-3 align-middle">
                                    <p class="text-2xl font-medium text-gray-600">
                                        {{ $question->question }}
                                    </p>
                                </td>
                                <td class="text-center py-3 align-middle">
                                    <input type="number" name="answer[{{ $question->id }}]" required
                                        class="border p-3 w-24 border-blue-400 text-center rounded-xl">
                                </td>
                                <td>
                                    <div id="answer-{{ $question->id }}">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="mt-20 flex justify-center">
                <div class="flex gap-5 flex-col">
                    <h1 class="text-2xl font-semibold">Pilihan Jawaban</h1>
                    <div class="flex gap-3">
                        @php
                            $colors = ['bg-red-200', 'bg-green-200', 'bg-yellow-200', 'bg-purple-200', 'bg-pink-200'];
                        @endphp

                        @foreach ($answer as $i => $choice)
                            @php
                                $color = $colors[$i % count($colors)];
                            @endphp

                            <div
                                class="flex items-center mb-2 border p-3 border-blue-400 rounded-xl {{ $color }}">
                                <div
                                    class="bg-blue-200 w-12 h-12 text-black font-semibold text-xl rounded-full flex items-center justify-center mr-2">
                                    {{ $choice['no'] }}
                                </div>
                                <p class="text-xl font-medium">{{ $choice['answer'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-center">
                <button type="submit" class="px-5 py-3 bg-sky-500 text-white rounded-md">Kirimkan Jawaban</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#gameForm').submit(function(event) {
                event.preventDefault();

                const form = $(this);
                const formData = new FormData(form[0]);

                $.ajax({
                    url: '{{ route('start_dongeng_game.check', ['dongeng' => $dongeng]) }}',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token')
                    },
                    success: function(data) {
                        const score = data.score;

                        $('#score').html(`Score: ${score}`);

                        const summary = data.summary;

                        $.each(summary, function(index, element) {
                            console.log(element.id_answer);
                            const answer = $('#' + element.id_answer);

                            if (answer.length) {
                                if (element.check) {
                                    answer.html(`
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-green-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                            </svg>

                                `);
                                } else {
                                    answer.html(`
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>

                                    `);
                                }
                            }
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>



</x-app-layout>
