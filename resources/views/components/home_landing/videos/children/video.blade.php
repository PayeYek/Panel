@props([
    'radius' => '8',
    // 'colorPalette' => '1',
    'name' => '',
    'src' => '',
    'link' => '',
])

@php
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
    // window.onload = function(){
    //     let video = document.getElementById('video').dataset.video
    // };
    // console.log({!! $link !!});

    // const renderVideo(event){
    //     console.log(event);
    // }
</script>
    
@endpush
    {{-- <li class="">
        <div class="relative w-full pt-[66%] cursor-pointer {{ $radiusSize }} overflow-hidden drop-shadow-base videoThumbnails" data-video='{!! $link !!}' @click="data.showVideoModal = true; data.videoSrc='{!! $link !!}'">
            <img src="{{ $src }}" alt="{{ $name }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
            <x-icons.playIcon class="w-12 h-12 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
            <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black to-transparent h-1/2">
                <p class="text-base sm:text-xl lg:text-base font-bold w-full"> {{ $name }} </p>
            </div>
        </div>

    </li> --}}
    