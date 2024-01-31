<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight text-gray-600">
                {{ __('Game Board - ' . $ungahUnguhBasa->title) }}
            </h2>

            <a href="{{ route('ungah_unguh_basa.games') }}"
                class="bg-gradient-to-r from-red-500 to-red-500 text-white px-4 py-2 rounded-md">Kembali</a>
        </div>
    </x-slot>

    @php
        $ungahUnguhBasaGameData = $ungahUnguhBasaGame[0];
        $options = json_decode($ungahUnguhBasaGameData->options);
    @endphp

    <div
        class="container flex flex-col gap-5  items-center mx-auto mt-8 p-5 rounded-xl bg-gradient-to-r from-sky-200 to-pink-200 shadow-md">

        @if ($ungahUnguhBasaGame->hasPages())
            <!-- Custom Pagination Buttons -->
            <div class="flex justify-center mt-4">
                <div class="flex gap-2">
                    {{-- Previous Page Link --}}
                    @if ($ungahUnguhBasaGame->onFirstPage())
                        <span class="bg-gray-300 text-gray-600 px-3 py-1 rounded-md">&laquo; Sadurunge</span>
                    @else
                        <a href="{{ $ungahUnguhBasaGame->previousPageUrl() }}"
                            class="bg-blue-500 text-white px-3 py-1 rounded-md">&laquo; Sadurunge</a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($ungahUnguhBasaGame->hasMorePages())
                        <a href="{{ $ungahUnguhBasaGame->nextPageUrl() }}"
                            class="bg-blue-500 text-white px-3 py-1 rounded-md">Salajengipun &raquo;</a>
                    @else
                        <span class="bg-gray-300 text-gray-600 px-3 py-1 rounded-md">Salajengipun &raquo;</span>
                    @endif
                </div>
            </div>
        @endif

        <form id="gameForm" class="flex flex-col gap-5">
            <h1 class="text-xl font-semibold max-w-3xl mx-auto text-center">{{ $ungahUnguhBasaGameData->question }}</h1>

            @php
                $choice =  rand(1, 2);
            @endphp

            <div class="flex items-center justify-center gap-5">
                <div class="w-1/2 flex flex-col gap-5">
                    <input type="text" name="answer1" id="answer1" required placeholder="Masukkan jawaban?"
                        value="{{ $choice == 1 ? $ungahUnguhBasaGameData->answer1 : '' }}"
                        class="mt-1 p-4 border rounded-md w-72 mx-auto @error('answer1') border-red-500 @enderror">

                    <img src="{{ asset('storage/' . $ungahUnguhBasaGameData->image1) }}" alt=""
                        class="w-full rounded-xl object-cover">
                </div>

                <div class="w-1/2 flex flex-col gap-5">
                    <input type="text" name="answer2" id="answer2" required placeholder="Masukkan jawaban?"
                        value="{{ $choice == 2 ? $ungahUnguhBasaGameData->answer2 : '' }}"
                        class="mt-1 p-4 border rounded-md w-72 mx-auto @error('answer1') border-red-500 @enderror">

                    <img src="{{ asset('storage/' . $ungahUnguhBasaGameData->image2) }}" alt=""
                        class="w-full rounded-xl object-cover">
                </div>
            </div>

            @csrf
            <h1 class="text-xl font-semibold max-w-3xl mx-auto text-center"></h1>
        </form>


        <div class="flex justify-center">
            <div class="flex gap-5 flex-col">
                <div class="flex gap-3">
                    @php
                        $colors = ['bg-red-200', 'bg-green-200', 'bg-yellow-200', 'bg-purple-200', 'bg-pink-200'];
                    @endphp

                    @foreach ($options as $i => $choice)
                        @php
                            $color = $colors[$i % count($colors)];
                        @endphp

                        <div class="flex items-center mb-2 border p-3 border-blue-400 rounded-xl {{ $color }}">
                            <p class="text-xl font-medium">{{ $choice }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



        <button type="button" id="check"
            class="flex gap-2 w-fit items-center bg-gradient-to-r text-xl from-pink-500 to-pink-600 text-white px-4 py-2 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
            </svg>
            Mriksa Bebener
        </button>

    </div>

    <script>
        $(document).ready(function() {
            $('#check').click(function(e) {
                e.preventDefault();

                // reset color
                $('#answer1').removeClass('bg-green-200');
                $('#answer2').removeClass('bg-green-200');
                $('#answer1').removeClass('bg-red-200');
                $('#answer2').removeClass('bg-red-200');

                let answer1 = $('#answer1').val();
                let answer2 = $('#answer2').val();

                let answer1Correct = answer1.toLowerCase() == '{{ $ungahUnguhBasaGameData->answer1 }}'
                    .toLowerCase();
                let answer2Correct = answer2.toLowerCase() == '{{ $ungahUnguhBasaGameData->answer2 }}'
                    .toLowerCase();

                let answer1Color = answer1Correct ? 'bg-green-200' : 'bg-red-200';
                let answer2Color = answer2Correct ? 'bg-green-200' : 'bg-red-200';

                $('#answer1').addClass(answer1Color);
                $('#answer2').addClass(answer2Color);
            });
        });
    </script>

</x-app-layout>
