@props(['type' => '1', 'radius' => '8', 'gap' => '16'])

<section class="mb-4 lg:mb-12 relative z-[1] default_container">
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
    <x-home_landing.announcement.children.announcements :type="$type" :radius="$radius" :gap="$gap" />
    
    <a href="#" class="flex justify-end text-xs font-bold text-red-700 sm:hidden"> نمایش همه اطلاعیه ها
    </a>
</section>