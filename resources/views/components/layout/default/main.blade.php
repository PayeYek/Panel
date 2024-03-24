@php
    $brand = match ($land->styles->land_id) {
        1 => 'theme_arian',
        2 => 'theme_saipa',
        default => 'theme_arian',
    };
    
    $radius = match ($land->styles->radius) {
        0 => 'rounded_none',
        2 => 'rounded_sm',
        4 => 'rounded_base',
        6 => 'rounded_md',
        8 => 'rounded_lg',
        12 => 'rounded_xl',
        16 => 'rounded_2xl',
        default => 'rounded_base',
    };
@endphp
@props(['land'=>null])
@stack('head')
<section class="relative min-h-screen bg-white font-yekan number-fa {{ $brand }} {{ $radius }}">
    <x-layout.landing.sidebar :land="$land"/>
    {{--HEADER: LOGO | LINKS: HOME, PRODUCTS, SALLER, ABOUT | SALLER --}}
    <x-layout.landing.header :land="$land"/>
    {{ $slot }}

    <x-layout.landing.footer :land="$land"/>
    {{-- <div class="default_container relative z-[1]">
        <x-layout.landing.footer :land="$land"/>
    </div> --}}
</section>
@stack('script')