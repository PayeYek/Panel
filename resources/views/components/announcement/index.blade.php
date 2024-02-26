@props(['type' => '1', 'radius' => '0', 'gap' => '16'])
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

<section class="mb-4 relative z-[1] default_container">
    {{-- header --}}
    <div class="flex items-center justify-center mb-4 sm:justify-between lg:px-4">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white"> اطلاعیه ها </h3>
        <a href="#"
            class="items-center hidden gap-2 text-xs font-normal text-red-700 sm:flex dark:text-red-600">
            <span> نمایش همه </span>
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                    stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
    <x-announcement.children.announcements :type="$type" :radiusSize="$radiusSize" :gap="$gap" />
    
    <a href="#" class="flex justify-end text-xs font-bold text-red-700 sm:hidden"> نمایش همه اطلاعیه ها
    </a>
</section>