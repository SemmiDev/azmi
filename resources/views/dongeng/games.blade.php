<x-app-layout>

    <h2 class="font-semibold text-3xl text-center  my-5 leading-tight text-gray-600">
        {{ __('Dongeng') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col gap-3">
                <!-- Search Input -->
                <div class="mb-4 mx-auto">
                    <input type="text" id="searchInput" placeholder="Cari dongeng..."
                        class="px-4 py-3 w-96 border border-gray-300 rounded-md">
                </div>

                <!-- Search Results -->
                <div id="searchResults" class="flex flex-col gap-3"></div>

                @foreach ($dongengs as $dongeng)
                    <div class="bg-sky-400 flex gap-12 from-blue-300 to-green-300 p-6 rounded-lg shadow-md">
                        <img src="{{ asset('storage/' . $dongeng->background) }}" alt="{{ $dongeng->title }}"
                            class="mb-4 h-56 rounded-md">
                        <div class="flex flex-col justify-between">
                            <div>
                                <h3 class="text-4xl font-semibold text-white mb-2">{{ $dongeng->title }}</h3>
                                <p class="text-lg text-white mb-2">{{ $dongeng->description }}</p>
                            </div>
                            <div class="flex justify-between">
                                <a href="{{ route('start_dongeng_game.material', ['dongeng' => $dongeng]) }}"
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
                    url: '{{ route('dongeng.search') }}',
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
                            searchResultsHtml += '<img src="{{ asset('storage/') }}/' +
                                result.background + '" alt="' + result.title +
                                '" class="mb-4 h-56 rounded-md">';

                            searchResultsHtml +=
                                '<div class="flex flex-col justify-between">';
                            searchResultsHtml += '<div>';
                            searchResultsHtml +=
                                '<h3 class="text-4xl font-semibold text-white mb-2">' +
                                result.title + '</h3>';
                            searchResultsHtml += '<p class="text-lg text-white mb-2">' +
                                result.description + '</p>';
                            searchResultsHtml += '</div>';
                            searchResultsHtml += '<div class="flex justify-between">';
                            searchResultsHtml +=
                                '<a href="{{ route('start_dongeng_game.material', ['dongeng' => $dongeng]) }}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">';
                            searchResultsHtml += 'Materi';
                            searchResultsHtml += '</a>';
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
