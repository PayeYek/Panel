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
<section
    class="default_container flex items-center flex-col md:flex-row gap-2.5 lg:gap-3 mb-9 md:justify-start relative z-[1]">
    <h3 class="text-lg font-bold text-gray-900 dark:text-white"> محصولات </h3>
    <div
        class="flex flex-col flex-wrap items-center content-center w-full h-20 text-base font-bold text-red-700 md:flex-row md:flex-nowrap md:content-normal md:h-auto gap-y-4 gap-x-5 dark:text-white">
        <a href="#"
            class="h-8 bg-white {{ $radiusSize }} w-36 flex_center drop-shadow-red dark:drop-shadow-none dark:bg-gray-700">
            کشنده </a>
        <a href="#"
            class="h-8 bg-white {{ $radiusSize }} w-36 flex_center drop-shadow-red dark:drop-shadow-none dark:bg-gray-700">
            کامیون </a>
        <a href="#"
            class="h-8 bg-white {{ $radiusSize }} w-36 flex_center drop-shadow-red dark:drop-shadow-none dark:bg-gray-700">
            کامییونت </a>
        <a href="#"
            class="h-8 bg-white {{ $radiusSize }} w-36 flex_center drop-shadow-red dark:drop-shadow-none dark:bg-gray-700">
            ون </a>
    </div>
</section>