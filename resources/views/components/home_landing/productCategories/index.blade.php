@props([
    'radius' => '8',
    'colorPalette' => '1',
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

    $linkStyle = match($colorPalette) {
        '1' => 'bg-white shadow-lg shadow-red-700 hover:text-red-800 text-red-700 hover:shadow-red-800',
        '2' => 'bg-white shadow-lg shadow-blue-700 hover:text-blue-800 text-blue-700 hover:shadow-blue-800',
        '3' => 'bg-white shadow-lg shadow-rose-700 hover:text-rose-800 text-rose-700 hover:shadow-rose-800',
        '4' => 'bg-white shadow-lg shadow-zinc-700 hover:text-zinc-800 text-zinc-700 hover:shadow-zinc-800',
        '5' => 'bg-white shadow-lg shadow-cobalt-700 hover:text-cobalt-800 text-cobalt-700 hover:shadow-cobalt-800',
        default => null
    };
    
@endphp
<section
    class="default_container flex items-center flex-col md:flex-row gap-2.5 lg:gap-3 mb-9 lg:mb-16 md:justify-start relative z-[1]">
    <h3 class="text-lg font-bold text-gray-900 dark:text-white"> محصولات </h3>
    <div
        class="flex flex-col flex-wrap items-center content-center w-full h-20 text-base font-bold md:flex-row md:flex-nowrap md:content-normal md:h-auto gap-y-4 gap-x-5 dark:text-white">
        <a href="#"
            class="h-8 {{ $radiusSize }} {{ $linkStyle }} w-36 flex_center">
            کشنده </a>
        <a href="#"
            class="h-8 {{ $radiusSize }} {{ $linkStyle }} w-36 flex_center">
            کامیون </a>
        <a href="#"
            class="h-8 {{ $radiusSize }} {{ $linkStyle }} w-36 flex_center">
            کامییونت </a>
        <a href="#"
            class="h-8 {{ $radiusSize }} {{ $linkStyle }} w-36 flex_center">
            ون </a>
    </div>
</section>