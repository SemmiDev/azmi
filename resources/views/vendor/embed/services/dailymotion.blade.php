<x-embed-responsive-wrapper :aspect-ratio="$aspectRatio">
    <iframe
            aria-label="{{ $label }}"
            frameborder="0"
            type="text/html"
            src="https://www.dailymotion.com/embed/video/{{ $videoId }}"
            allowfullscreen
    ></iframe>
</x-embed-responsive-wrapper>
