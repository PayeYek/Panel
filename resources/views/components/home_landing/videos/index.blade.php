@props([
    'data' => '[]',
    'type' => 1,
])

@push('script')
    <script>
        
        function showVideoByThumbnail(e) {
            const videoHolder = document.getElementById('ifame-box')
            const videocontainer = document.getElementById('ifame-container')
            const videoHtml = e.parentElement
            const videoFromServer = videoHtml.dataset.videolink
            // const videocontainer = document.getElementById('ifame-container')
            // console.log(videocontainer);
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

@switch($type)
    @case(1)
        <ul class="flex list-none lg:w-full {{ $data->count() == 1 ? 'justify-center' : 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible' }}">
            @foreach ($data->take(2) as $video)
                <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                    <div class="relative w-full pt-[62%] cursor-pointer rounded-custom overflow-hidden videoThumbnails" onclick="showVideoByThumbnail(this)">
                        <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                        <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                        <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black/90 to-transparent h-1/2">
                            <p class="w-full text-sm font-medium sm:text-lg line-clamp-1"> {{ $video->alt }} </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        @break
    @case(2)
            <ul class="flex list-none lg:w-full {{ $data->count() == 1 ? 'justify-center' : 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible' }}">
                @foreach ($data->take(2) as $video)
                    <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                        <div class="relative w-full pt-[62%] cursor-pointer rounded-custom overflow-hidden videoThumbnails" onclick="showVideoByThumbnail(this)">
                            <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                            <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                            <div class="absolute text-white bottom-5 left-0 w-full z-[2] flex items-center px-4 lg:px-6 bg-gradient-to-r from-[rgba(46,48,146,0.5)] to-[rgba(46,48,146,1)] h-8 sm:h-10 lg:h-14">
                                <p class="w-full text-sm font-medium sm:text-base lg:text-lg line-clamp-1"> {{ $video->alt }} </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @break
    @case(3)
            <ul class="flex list-none lg:w-full mb-8 lg:mb-16 {{ $data->count() == 1 ? 'justify-center' : 'gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible pb-4' }}">
                @foreach ($data->take(2) as $video)
                    <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                        <div class="relative w-full pt-[62%] cursor-pointer videoThumbnails" onclick="showVideoByThumbnail(this)">
                            <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1] rounded-t-custom" />
                            <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                            <div class="absolute text-white -bottom-4 left-0 w-full z-[2] flex items-center px-4 lg:px-6 bg-stone-950 h-10 sm:h-10 lg:h-14 rounded-b-custom">
                                <p class="w-full text-sm font-medium sm:text-base lg:text-lg line-clamp-1"> {{ $video->alt }} </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @break
    @case(4)
    {{-- @dd($data->count()) --}}
            <ul class="flex list-none lg:w-full mb-8 lg:mb-16 {{ $data->count() == 1 ? 'justify-center' : 'gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible pb-4' }}">
                @foreach ($data->take(2) as $video)
                    <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                        <div class="relative w-full pt-[62%] cursor-pointer videoThumbnails" onclick="showVideoByThumbnail(this)">
                            <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1] rounded-t-custom" />
                            <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                            <div class="absolute text-white -bottom-4 left-0 w-full z-[2] flex items-center px-4 lg:px-6 bg-stone-950 h-10 sm:h-10 lg:h-14 rounded-b-custom">
                                <p class="w-full text-sm font-medium sm:text-base lg:text-lg line-clamp-1"> {{ $video->alt }} </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @break
    @default
        
@endswitch



        {{-- <ul class="flex list-none lg:w-full {{ $data->count() == 1 ? 'justify-center' : 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible' }}">
    @foreach ($data->take(2) as $video)
        <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
            <div class="relative w-full pt-[62%] cursor-pointer rounded-custom overflow-hidden videoThumbnails" onclick="showVideoByThumbnail(this)">
                <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                <div class="absolute text-white bottom-5 left-0 w-full z-[2] flex items-center px-4 bg-gradient-to-r from-[rgba(46,48,146,0.5)] to-[rgba(46,48,146,1)] h-8">
                    <p class="w-full text-sm font-medium sm:text-lg line-clamp-1"> {{ $video->alt }} </p>
                </div>
            </div>
        </li>
    @endforeach
</ul> --}}