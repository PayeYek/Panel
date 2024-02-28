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
        '1' => 'focus:shadow-lg focus:shadow-red-700 hover:bg-red-800 text-white hover:shadow-red-800 bg-red-700',
        '2' => 'focus:shadow-lg focus:shadow-blue-700 hover:bg-blue-800 text-white hover:shadow-blue-800 bg-blue-700',
        '3' => 'focus:shadow-lg focus:shadow-rose-700 hover:bg-rose-800 text-white hover:shadow-rose-800 bg-rose-700',
        '4' => 'focus:shadow-lg focus:shadow-zinc-700 hover:bg-zinc-800 text-white hover:shadow-zinc-800 bg-zinc-700',
        '5' => 'focus:shadow-lg focus:shadow-cobalt-700 hover:bg-cobalt-800 text-white hover:shadow-cobalt-800 bg-cobalt-700',
        default => null
    };
@endphp

<div class="relative z-[1] default_container">
    <a href="#"
        class="w-full mx-auto text-base font-bold {{ $linkStyle }} {{ $radiusSize }} sm:w-80 h-11 flex_center">
        شرایط
        فروش </a>
</div>