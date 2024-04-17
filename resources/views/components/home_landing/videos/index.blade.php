@props([
    'data' => '[]',
    'type' => 1,
    'landSlug' => '',
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
                <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px] xl:w-[720px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                    <div class="relative w-full pt-[56%] cursor-pointer rounded-custom overflow-hidden videoThumbnails" onclick="showVideoByThumbnail(this)">
                        <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                        <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                        <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black/90 to-transparent h-1/2">
                            <p class="w-full text-sm font-medium sm:text-lg line-clamp-1 select-none"> {{ $video->alt }} </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        @break
    @case(2)
            <ul class="flex list-none lg:w-full {{ $data->count() == 1 ? 'justify-center' : 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible' }}">
                @foreach ($data->take(2) as $video)
                    <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px] xl:w-[720px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                        <div class="relative w-full pt-[56%] cursor-pointer rounded-custom overflow-hidden videoThumbnails" onclick="showVideoByThumbnail(this)">
                            <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                            <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                            <div class="absolute text-white bottom-5 left-0 w-full z-[2] flex items-center px-4 lg:px-6 bg-gradient-to-l from-normal to-normal/30 h-8 sm:h-10 lg:h-14">
                                <p class="w-full text-sm font-medium sm:text-base lg:text-lg line-clamp-1 select-none"> {{ $video->alt }} </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @break
    @case(3)
            <ul class="flex list-none lg:w-full mb-8 lg:mb-16 {{ $data->count() == 1 ? 'justify-center' : 'gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible pb-4' }}">
                @foreach ($data->take(2) as $video)
                    <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px] xl:w-[720px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                        <div class="relative w-full pt-[56%] cursor-pointer videoThumbnails" onclick="showVideoByThumbnail(this)">
                            <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1] rounded-t-custom" />
                            <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                            <div class="absolute text-white -bottom-4 left-0 w-full z-[2] flex items-center px-4 lg:px-6 bg-stone-950 h-10 sm:h-10 lg:h-14 rounded-b-custom">
                                <p class="w-full text-sm font-medium sm:text-base lg:text-lg line-clamp-1 select-none"> {{ $video->alt }} </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @break
    @case(4)
        <ul class="list-none lg:w-full mb-8 lg:mb-16 {{ $data->count() == 1 ? 'justify-center flex' : ($data->count() == 2 ? 'flex gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible pb-4' : 'flex gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-3 lg:grid-row-2 overflow-auto lg:overflow-visible pb-4 lg:gap-x-4 lg:gap-y-2') }}">
            @foreach ($data->take(2) as $video)
            <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px] xl:w-[720px]' : ($data->count() == 2 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-full' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full lg:first:col-span-2 lg:first:row-span-2') }}" data-videoLink="{{ $video->link }}">
                            <div class="aspect-video relative rounded-custom overflow-hidden bg-center bg-cover bg-no-repeat hover:scale-[1.025] duration-300 videoThumbnails" onclick="showVideoByThumbnail(this)" style="background-image: url({{ $video->image }})">
                                <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                                <div class="bg-gradient-to-t w-full h-full flex flex-col gap-2 p-4 justify-end from-black/80 to-black/25">
                                    <p class="text-lg @if($data->count() > 2 && $loop->index == 0) lg:text-2xl @endif font-medium text-white line-clamp-1 select-none"> {{ $video->alt }} </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    @if ($data->count() > 2)
                        <li class="flex-none w-full sm:w-[448px] md:w-[480px] lg:w-full">
                            <div class="aspect-video rounded-custom overflow-hidden bg-center bg-cover bg-no-repeat bg-[url(https://paye1.com/storage/media/land/files/t8dR260Ev5WfmN5CMI3dZ9bjXas1V1HO6rLRZEIP.png)] hover:scale-[1.025] duration-300">
                                <div class="size-full flex_center bg-gradient-to-t from-black/80 to-black/25">
                                    <Link href="{{ route('landing.videos', ['page' => $landSlug]) }}" class="h-11 w-44 flex_center border border-white rounded-custom text-lg font-medium text-white bg-transparent hover:bg-black/20"> آرشیو ویدیو ها </Link>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            @break
    @case(5)
        <ul class="list-none lg:w-full mb-8 lg:mb-16 {{ $data->count() == 1 ? 'justify-center flex' : ($data->count() == 2 ? 'flex gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible pb-4' : 'flex gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-3 lg:grid-row-2 overflow-auto lg:overflow-visible pb-4 lg:gap-x-4 lg:gap-y-2') }}">
            @foreach ($data->take(2) as $video)
            <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px] xl:w-[720px]' : ($data->count() == 2 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-full' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full lg:first:col-span-2 lg:first:row-span-2') }}" data-videoLink="{{ $video->link }}">
                            <div class="aspect-video relative rounded-custom overflow-hidden bg-center bg-cover bg-no-repeat hover:scale-[1.025] duration-300 videoThumbnails" onclick="showVideoByThumbnail(this)" style="background-image: url({{ $video->image }})">
                                <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                                <div class="bg-gradient-to-t w-full h-full flex flex-col gap-2 p-4 justify-end from-black/80 to-black/25">
                                    <p class="text-lg @if($data->count() > 2 && $loop->index == 0) lg:text-2xl @endif font-medium text-[#FFD598] line-clamp-1 select-none"> {{ $video->alt }} </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
            @if ($data->count() > 2)
                <li class="flex-none w-full sm:w-[448px] md:w-[480px] lg:w-full">
                    <div class="aspect-video rounded-custom overflow-hidden bg-center bg-cover bg-no-repeat hover:scale-[1.025] duration-300" style="background-image: url(https://paye1.com/storage/media/land/files/TxhDqKfxz3x5HukVh7GWz5Mv5lTpmt3lfo4xZecW.png)">
                        <div class="size-full flex_center bg-gradient-to-t from-black/80 to-black/60">
                            <Link href="{{ route('landing.videos', ['page' => $landSlug]) }}" class="h-11 w-44 flex_center border-x-2 border-x-[#DBA14D] rounded-custom text-lg font-medium text-[#FFD598] bg-transparent hover:border-x-white hover:text-white"> آرشیو ویدیو ها </Link>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
        @break
    @case(6)
        <ul class="flex list-none lg:w-full {{ $data->count() == 1 ? 'justify-center' : ($data->count() == 2 ? 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible' : 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-3 overflow-auto lg:overflow-visible') }}">
            @foreach ($data->take(3) as $video)
                <li class="flex-none flex flex-col {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px] xl:w-[720px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                    <div class="relative w-full pt-[56%] mb-4 cursor-pointer rounded-custom overflow-hidden videoThumbnails" onclick="showVideoByThumbnail(this)">
                        <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                        <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                        <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end bg-gradient-to-t from-black/90 to-transparent h-full">
                        </div>
                    </div>
                    <p class="w-full px-4 text-sm font-medium sm:text-lg line-clamp-1 select-none"> {{ $video->alt }} </p>
                </li>
                @endforeach
            </ul>
        @break
    @case(7)
        <ul class="list-none lg:w-full mb-8 lg:mb-16 {{ $data->count() == 1 ? 'justify-center flex' : ($data->count() == 2 ? 'flex gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible pb-4' : ($data->count() == 3 ? 'flex gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-3 lg:grid-row-2 overflow-auto lg:overflow-visible pb-4 lg:gap-x-4 lg:gap-y-2' : 'flex gap-8 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-3 overflow-auto lg:overflow-visible pb-4 lg:gap-4')) }}">
            @foreach ($data->take(3) as $video)
                <li class="flex-none {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px] xl:w-[720px]' : ($data->count() == 2 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-full' : ($data->count() == 3 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-full lg:first:col-span-2 lg:first:row-span-2' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full lg:first:col-span-3')) }}" data-videoLink="{{ $video->link }}">
                    <div class="aspect-video relative rounded-custom overflow-hidden bg-center bg-cover bg-no-repeat hover:scale-[1.025] duration-300 videoThumbnails" onclick="showVideoByThumbnail(this)" style="background-image: url({{ $video->image }})">
                        <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                        <div class="bg-gradient-to-t w-full h-full flex flex-col gap-2 p-4 justify-end from-black/80 to-black/25">
                            <p class="text-lg @if($data->count() > 2 && $loop->index == 0) lg:text-2xl @endif font-medium text-white line-clamp-1 select-none"> {{ $video->alt }} </p>
                        </div>
                    </div>
                </li>
            @endforeach
            @if ($data->count() > 3)
                <li class="flex-none w-full sm:w-[448px] md:w-[480px] lg:w-full">
                    <div class="aspect-video size-full flex_center flex-col gap-6 rounded-custom overflow-hidden border border-stone-700 hover:scale-[1.025] duration-300">
                        <p class="text-base sm:text-lg font-medium text-slate-700 text-center"> برای ورود به آرشیو ویدیو ها کلیک کنید </p>
                        <Link href="{{ route('landing.videos', ['page' => $landSlug]) }}" class="h-11 w-44 flex_center bg-normal rounded-custom text-lg font-medium text-white hover:bg-focus"> بیشتر </Link>
                    </div>
                </li>
            @endif
        </ul>
        @break

    @default
        <ul class="flex list-none lg:w-full {{ $data->count() == 1 ? 'justify-center' : ($data->count() == 2 ? 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-2 overflow-auto lg:overflow-visible' : 'gap-4 sm:flex-row sm:items-center flex-col lg:grid lg:grid-cols-3 overflow-auto lg:overflow-visible') }}">
            @foreach ($data->take(3) as $video)
                <li class="flex-none flex flex-col {{ $data->count() == 1 ? 'w-full sm:w-[448px] md:w-[480px] lg:w-[558px] xl:w-[720px]' : 'w-full sm:w-[448px] md:w-[480px] lg:w-full' }}" data-videoLink="{{ $video->link }}">
                    <div class="relative w-full pt-[56%] mb-4 cursor-pointer rounded-custom overflow-hidden videoThumbnails" onclick="showVideoByThumbnail(this)">
                        <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                        <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                        <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end bg-gradient-to-t from-black/90 to-transparent h-full">
                        </div>
                    </div>
                    <p class="w-full px-4 text-sm font-medium sm:text-lg line-clamp-1 select-none"> {{ $video->alt }} </p>
                </li>
                @endforeach
            </ul>
        
@endswitch