@props(['land'=>null])
<section class="relative h-auto min-h-screen transition-all duration-300 bg-white dark:bg-black font-yekan rtl:number-fa">
    <x-layout.landing.sidebar :land="$land"/>
    {{--HEADER: LOGO | LINKS: HOME, PRODUCTS, SALLER, ABOUT | SALLER --}}
    <div class="sticky top-0 z-[2] drop-shadow-[0_4px_4px_rgba(0,0,0,0.15)] bg-white h-16 sm:h-20">
        <x-layout.landing.header :land="$land"/>
    </div>

    {{ $slot }}

    <div class="default_container relative z-[1]">
        <x-layout.landing.footer :land="$land"/>
    </div>
</section>
@stack('script')