@props([
    'radius' => '8',
    'colorPalette' => '1',
    'data' => '[]',
    'showAllBtn' => true,
])

@php
    $showAllStyle = match($colorPalette) {
        '1' => 'text-red-700 hover:text-red-800',
        '2' => 'text-blue-700 hover:text-blue-800',
        '3' => 'text-rose-700 hover:text-rose-800',
        '4' => 'text-zinc-700 hover:text-zinc-800',
        '5' => 'text-cobalt-700 hover:text-cobalt-800',
        default => 'text-red-700 hover:text-red-800',
    };

    $radiusSize = match($radius) {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };
@endphp

@push('script')
    <script>
        function showVideoByThumbnail(e) {
            const videoHtml = e.parentElement
            const videoFromServer = videoHtml.dataset.videolink
            const videoHolderLayer = e.nextSibling
            const videoHolder = e.nextSibling.childNodes[0]
            videoHolder.innerHTML= ""
            videoHolder.innerHTML = videoFromServer
            e.nextSibling.classList.remove("hidden")
            e.nextSibling.classList.add("flex_center")
        }

        function hideVideoByThumbnail(e) {
            e.classList.remove("flex_center")
            e.classList.add("hidden")
            // close old video
            const iframe = e.childNodes[0].childNodes[1].childNodes[1]
            const refreshSrc = iframe.src
            iframe.src = refreshSrc
        }
    </script>
@endpush

{{-- @dd($data->count()); --}}
<section class=" mb-4 lg:mb-20 relative z-[2] lg:default_container">
    {{-- header --}}
    <div class="flex items-center justify-between mb-4 px-4">
        <h3 class="text-lg font-bold text-gray-900"> ویدیو ها </h3>
        <a href="#" class="flex items-center gap-2 text-xs font-normal {{ $showAllStyle }}" v-if="{{ $showAllBtn }}">
            <span> نمایش همه </span>
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                    stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
    <ul class="flex items-center lg:grid px-4 overflow-auto lg:overflow-visible lg:px-0 gap-4 list-none {{ $data->count() == 1 ? '' : ($data->count() == 2 ? 'lg:grid-cols-2' : 'lg:grid-cols-3') }}">
        @foreach ($data->take(3) as $video)
            <li class="w-64 sm:w-80 md:w-96 flex-none lg:w-full" data-videoLink="{{ $video->link }}">
                <div class="relative w-full pt-[62%] cursor-pointer {{ $radiusSize }} overflow-hidden drop-shadow-base videoThumbnails" onclick="showVideoByThumbnail(this)">
                    <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                    <x-icons.playIcon class="w-12 h-12 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                    <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black to-transparent h-1/2">
                        <p class="text-base sm:text-xl lg:text-base font-bold w-full line-clamp-2"> {{ $video->alt }} </p>
                    </div>
                </div>

                <section class="fixed inset-0 z-[2] bg-black/60 hidden" onclick="hideVideoByThumbnail(this)">
                    <div class="w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center"></div>
                </section>
            </li>
        @endforeach
    </ul>
</section>