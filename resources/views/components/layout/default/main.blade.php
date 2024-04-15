@php
    $brand = match ($land->styles->land_id) {
        1 => 'theme_arian',
        2 => 'theme_saipa',
        3 => 'theme_soroush',
        4 => 'theme_pilsan',
        5 => 'theme_bahman',
        6 => 'theme_carizan',
        7 => 'theme_arya',
        8 => 'theme_ikco',
        10 => 'theme_mayan',
        12 => 'theme_titan',
        14 => 'theme_rakhsh',
        15 => 'theme_caspian',
        16 => 'theme_amico',
        18 => 'theme_farda',
        20 => 'theme_mammut',
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
    <section class="min-h-[calc(100vh-488px)]">
        {{ $slot }}
    </section>

    <x-layout.landing.footer :land="$land"/>
    {{-- <div class="default_container relative z-[1]">
        <x-layout.landing.footer :land="$land"/>
    </div> --}}
</section>
@stack('script')