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

<section class="mb-4 sm:mb-8 lg:mb-20 relative z-[3] lg:default_container" id="video-player-container">
    {{-- header --}}
    <div class="flex items-center justify-between mb-4 px-4">
        <h3 class="text-xl font-normal lg:text-2xl text-gray-900"> ویدیو ها </h3>
        <a href="#" class="flex items-center gap-2 text-xs font-normal text-normal hover:text-focus" v-if="{{ $showAllBtn }}">
            <span> نمایش همه </span>
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                    stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
    <ul class="flex items-center lg:grid px-4 lg:px-0 gap-4 list-none {{ $data->count() == 1 ? '' : ($data->count() == 2 ? 'md:grid-cols-2 overflow-auto md:overflow-visible' : 'overflow-auto lg:overflow-visible lg:grid-cols-3') }}">
        @foreach ($data->take(3) as $video)
            <li class="flex-none lg:w-full {{ $data->count() == 1 ? 'w-full' : ($data->count() == 2 ? 'w-96 sm:w-[28rem] md:w-full' : 'w-64 sm:w-80 md:w-96') }}" data-videoLink="{{ $video->link }}">
                <div class="relative w-full pt-[62%] cursor-pointer rounded-custom overflow-hidden drop-shadow-base videoThumbnails" onclick="showVideoByThumbnail(this)">
                    <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                    <x-icons.playIcon class="w-12 h-12 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                    <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black to-transparent h-1/2">
                        <p class="text-base sm:text-xl lg:text-base font-bold w-full line-clamp-2"> {{ $video->alt }} </p>
                    </div>
                </div>

            </li>
            @endforeach
        </ul>
</section>
<section class="fixed inset-0 z-[4] bg-black/60 hidden" id="ifame-container" onclick="hideVideoByThumbnail(this)">
    <div class="w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center" id="ifame-box"></div>
</section>