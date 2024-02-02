{{-- Route::get('student/tembang_dolanan/games', function() {
    $tembangs = TembangDolanan::all();
    return view('tembang_dolanan.games', compact('tembangs'));
})->name('tembang_dolanan.games');
 --}}

<x-app-layout>

    <h2 class="font-semibold text-3xl text-center  my-5 leading-tight text-gray-600">
        {{ __('Tembang Dolanan') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col gap-3">
                  <!-- Search Input -->
                  <div class="mb-4 mx-auto">
                    <input type="text" id="searchInput" placeholder="Cari tembang dolanan..."
                        class="px-4 py-3 w-96 border border-gray-300 rounded-md">
                </div>

                <!-- Search Results -->
                <div id="searchResults" class="flex flex-col gap-3"></div>


                @foreach ($tembangs as $tembang)
                    <div class="bg-sky-400 flex gap-12 from-blue-300 to-green-300 p-6 rounded-lg shadow-md">
                        <img src="{{ asset('storage/' . $tembang->background) }}" alt="{{ $tembang->title }}"
                            class="mb-4 h-56 rounded-md">
                        <div class="flex flex-col justify-between">
                            <div>
                                <h3 class="text-4xl font-semibold text-white mb-2">{{ $tembang->title }}</h3>
                                <p class="text-lg text-white mb-2">{{ $tembang->description }}</p>
                            </div>
                            <div class="flex justify-between">
                                <a href="{{ route('start_tembang_dolanan_game.material', ['tembangDolanan' => $tembang]) }}"
                                    class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">
                                    Materi
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // jQuery code for search functionality
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var keyword = $(this).val();

                // AJAX call to fetch search results
                $.ajax({
                    url: '{{ route('tembang_dolanan.games.search') }}',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(data) {
                        // Update the search results section
                        var searchResultsHtml = '';

                        $.each(data, function(index, result) {
                            searchResultsHtml +=
                                '<div class="bg-sky-600 flex gap-12 from-blue-300 to-green-300 p-6 rounded-lg shadow-md">';
                            searchResultsHtml +=
                                '<img src="{{ asset('storage/') }}/' + result.background + '" alt="' + result.title +
                                '" class="mb-4 h-56 rounded-md">';
                            searchResultsHtml += '<div class="flex flex-col justify-between">';
                            searchResultsHtml += '<div>';
                            searchResultsHtml += '<h3 class="text-4xl font-semibold text-white mb-2">' + result.title +
                                '</h3>';
                            searchResultsHtml += '<p class="text-lg text-white mb-2">' + result.description + '</p>';
                            searchResultsHtml += '</div>';
                            searchResultsHtml += '<div class="flex justify-between">';
                            searchResultsHtml +=
                                '<a href="{{ route('start_tembang_dolanan_game.material', ['tembangDolanan' => $tembang]) }}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">Materi</a>';
                            searchResultsHtml += '</div>';
                            searchResultsHtml += '</div>';
                            searchResultsHtml += '</div>';
                        });

                        $('#searchResults').html(searchResultsHtml);
                    }
                });
            });
        });
    </script>
</x-app-layout>
