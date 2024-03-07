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

@endphp

<div class="relative z-[1] default_container">
    <a href="#"
        class="w-full mx-auto text-base font-bold focus:shadow-lg text-white focus:shadow-shadowNormal hover:bg-focus hover:shadow-shadowFocus bg-normal {{ $radiusSize }} sm:w-80 h-11 flex_center">
        شرایط
        فروش </a>
</div>