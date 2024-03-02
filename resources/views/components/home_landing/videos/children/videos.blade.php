@props([
    'radius' => '8',
    // 'colorPalette' => '1',
    'data' => '[]',
])

@push('script')
    <script defer>
        let videoThumbnails = null;
        
        setTimeout(() => {
            videoThumbnails = document.querySelectorAll('.videoThumbnails')
            for (let i = 0; i < videoThumbnails.length; i++) {
                const element = videoThumbnails[i];
                element.addEventListener("click", () => {
                    // console.log(element.dataset.video);
                    // console.log(parser.parseFromString(element.dataset.video, "text/html"));
                    console.log(document.getElementById('videoG').childNodes[0].childNodes[0]);
                    // document.body.appendChild(document.getElementById('videoG').childNodes[0].childNodes[0])
                }
                )
            }
        }, 1000);
    </script>
@endpush

<x-splade-data default="{videoSrc: '', showVideoModal: false}">
    <ul class="grid grid-cols-1 gap-4 list-none lg:grid-cols-3">
        @foreach ($data->take(3) as $video)
            <x-home_landing.videos.children.video data="{{ $data }}" name="{{ $video->alt }}" src="{{ $video->image }}" link="{{ $video->link }}" radius="{{ $radius }}" />
        @endforeach
    {{-- v-html="data.videoSrc" --}}
        <section class="fixed inset-0 z-[1] bg-black/60 flex_center" v-show="data.showVideoModal" :data-video="data.videoSrc" id="videoG" @click="data.showVideoModal = false">
            {{-- {!! $link !!} --}}
            <div id="77207807240"><script type="text/JavaScript" src="https://www.aparat.com/embed/WLVms?data[rnddiv]=77207807240&data[responsive]=yes"></script></div>
            {{-- <div class="bg-red-500 w-96 h-96" ></div> --}}
        </section>
    </ul>
</x-splade-data>