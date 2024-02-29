@props([
    'radius' => '8',
    // 'colorPalette' => '1',
    'data' => '[]',
])

@push('script')
    <script defer>
        setTimeout(() => {
            const videoThumbnails = document.querySelectorAll('.videoThumbnails')
            console.log(videoThumbnails);
        }, 500);
    </script>
@endpush

<x-splade-data default="{videoSrc: '', showVideoModal: false}">
    <ul class="grid grid-cols-1 gap-4 list-none lg:grid-cols-3">
        @foreach ($data->take(3) as $video)
            <x-home_landing.videos.children.video name="{{ $video->alt }}" src="{{ $video->image }}" link="{{ $video->link }}" radius="{{ $radius }}" />
        @endforeach
    
        <section class="fixed inset-0 z-[1] bg-black/60 flex_center" v-show="data.showVideoModal" :data-video="data.videoSrc" id="videoG" @click="data.showVideoModal = false">
            {{-- {!! $link !!} --}}
            <div class="bg-red-500 w-96 h-96" v-html="data.videoSrc"></div>
        </section>
    </ul>
</x-splade-data>