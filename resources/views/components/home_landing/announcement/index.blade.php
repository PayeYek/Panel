@props(['type' => '1', 'radius' => '8', 'data' => '', 'landSlug' => '/', 'fontFamily' => '1', 'colorPalette' => '1'])

@php
    $captionFontFamily = match($fontFamily) {
        '1' => 'text-xl font-normal',
        default => null
    };

    $showAllStyle = match($colorPalette) {
        '1' => 'text-red-700 hover:text-red-800',
        '2' => 'text-blue-700 hover:text-blue-800',
        '3' => 'text-rose-700 hover:text-rose-800',
        '4' => 'text-zinc-700 hover:text-zinc-800',
        '5' => 'text-cobalt-700 hover:text-cobalt-800',
        default => null
    };
@endphp

<section class="mb-4 lg:mb-12 relative z-[1] {{ $type == 2 ? 'lg:default_container' : 'default_container' }}">
    {{-- header --}}
    <div class="flex items-center justify-center {{ $type == 2 ? 'lg:mb-4' : 'mb-4' }} sm:justify-between px-4 lg:px-4">
        <h3 class=" text-gray-900 dark:text-white"> اطلاعیه ها </h3>
        <a href="#"
            class="items-center hidden gap-2 text-xs font-normal sm:flex {{ $showAllStyle }}">
            <span> نمایش همه </span>
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                    stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
    <x-home_landing.announcement.children.announcements :landSlug="$landSlug" :data="$data" :type="$type" :colorPalette="$colorPalette" :radius="$radius" />
</section>