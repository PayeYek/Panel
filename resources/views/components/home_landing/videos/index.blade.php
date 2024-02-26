@props(['radius' => '8'])

@php
    $radiusSize = null;
    switch ($radius) {
        case '0':
            $radiusSize = 'rounded-none';
            break;
        case '2':
            $radiusSize = 'rounded-sm';
            break;
        case '4':
            $radiusSize = 'rounded';
            break;
        case '6':
            $radiusSize = 'rounded-md';
            break;
        case '8':
            $radiusSize = 'rounded-lg';
            break;
        case '12':
            $radiusSize = 'rounded-xl';
            break;
        case '16':
            $radiusSize = 'rounded-2xl';
            break;
        
        default:
            # code...
            break;
    }
@endphp

@push('head')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
@endpush
<section class=" mb-4 lg:mb-20 relative z-[1] default_container">
    {{-- header --}}
    <div class="flex items-center justify-between mb-4 lg:px-4">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white"> ویدیو ها </h3>
        <a href="#" class="flex items-center gap-2 text-xs font-normal text-red-700 dark:text-red-600">
            <span> نمایش همه </span>
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                    stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>

    <ul class="grid grid-cols-1 gap-4 list-none lg:grid-cols-3">
        <li class="">
            <div class="relative w-full pt-[66%] cursor-pointer {{ $radiusSize }} overflow-hidden drop-shadow-base">
                <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                <x-icons.playIcon class="w-12 h-12 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black to-transparent h-1/2">
                    <p class="text-base sm:text-xl lg:text-base font-bold w-full"> کامیونت 8/5 تن N85 </p>
                </div>
            </div>
        </li>
        <li class="">
            <div class="relative w-full pt-[66%] cursor-pointer {{ $radiusSize }} overflow-hidden drop-shadow-base">
                <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                <x-icons.playIcon class="w-12 h-12 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black to-transparent h-1/2">
                    <p class="text-base sm:text-xl lg:text-base font-bold w-full"> کامیونت 8/5 تن N85 </p>
                </div>
            </div>
        </li>
        <li class="">
            <div class="relative w-full pt-[66%] cursor-pointer {{ $radiusSize }} overflow-hidden drop-shadow-base">
                <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                <x-icons.playIcon class="w-12 h-12 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black to-transparent h-1/2">
                    <p class="text-base sm:text-xl lg:text-base font-bold w-full"> کامیونت 8/5 تن N85 </p>
                </div>
            </div>
        </li>
    </ul>
</section>