@props(['land'=>null])
@stack('head')
<section class="relative min-h-screen bg-white font-yekan rtl:number-fa">
    <x-layout.landing.sidebar :land="$land"/>
    {{--HEADER: LOGO | LINKS: HOME, PRODUCTS, SALLER, ABOUT | SALLER --}}
    <x-layout.landing.header :land="$land"/>

    {{ $slot }}

    <div class="default_container relative z-[1]">
        <x-layout.landing.footer :land="$land"/>
    </div>
</section>
@stack('script')