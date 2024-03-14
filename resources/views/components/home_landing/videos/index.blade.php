@props([
    'data' => '[]',
    'showAllBtn' => true,
])

@push('script')
    <script>
        
        function showVideoByThumbnail(e) {
            const videoHolder = document.getElementById('ifame-box')
            const videocontainer = document.getElementById('ifame-container')
            const videoHtml = e.parentElement
            const videoFromServer = videoHtml.dataset.videolink
            // const videocontainer = document.getElementById('ifame-container')
            console.log(videocontainer);
            // videoHolder.innerHTML= ""
            videoHolder.innerHTML = videoFromServer
            videocontainer.classList.remove("hidden")
            videocontainer.classList.add("flex_center")
        }
        
        function hideVideoByThumbnail(e) {
            const iframe = e.childNodes[0].childNodes[1].childNodes[1]
            const refreshSrc = iframe.src
            iframe.src = refreshSrc
            const videocontainer = document.getElementById('ifame-container')
            videocontainer.classList.remove("flex_center")
            videocontainer.classList.add("hidden")
            // const videoHolder = document.getElementById('ifame-box')
            // videoHolder.innerHTML= ""
            // close old video
        }
    </script>
@endpush

<section class="mb-4 sm:mb-8 lg:mb-16 relative z-[3] lg:default_container" id="video-player-container">
    {{-- header --}}
    <h3  class="mb-2 text-base sm:text-lg font-bold text-center text-stone-700"> ویدیو ها </h3>
    <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
    {{-- show all --}}
    <Link href="#" class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block float-left px-2 cursor-pointer" v-if="{{ $showAllBtn }}"> نمایش همه </Link>
    <ul class="flex px-4 lg:px-0 list-none lg:w-full {{ $data->count() == 1 ? 'justify-center' : 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible' }}">
        @foreach ($data->take(2) as $video)
            <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                <div class="relative w-full pt-[62%] cursor-pointer rounded-custom overflow-hidden drop-shadow-base videoThumbnails" onclick="showVideoByThumbnail(this)">
                    <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                    <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                    <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black to-transparent h-1/2">
                        <p class="text-sm sm:text-lg font-bold w-full line-clamp-1"> {{ $video->alt }} </p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
</section>
<section class="fixed inset-0 z-[4] bg-black/60 hidden" id="ifame-container" onclick="hideVideoByThumbnail(this)">
    <div class="w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center" id="ifame-box"></div>
</section>