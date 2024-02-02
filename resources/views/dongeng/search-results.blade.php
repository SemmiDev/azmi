@foreach ($searchResults as $result)
    <div class="bg-gray-200 p-4 rounded-md">
        <h3 class="text-2xl font-semibold">{{ $result->title }}</h3>
        <p>{{ $result->description }}</p>
    </div>
@endforeach
