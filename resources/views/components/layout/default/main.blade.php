@props(['land'=>null])
@stack('head')

<section class="relative h-auto min-h-screen text-gray-800 bg-gray-white dark:bg-gray-900 font-inter rtl:font-iran rtl:number-fa dark:text-white">
    <x-layout.landing.sidebar :land="$land"/>
    {{--HEADER: LOGO | LINKS: HOME, PRODUCTS, SALLER, ABOUT | SALLER --}}
    <div class="sticky top-0 default_container z-[2]">
        <x-layout.landing.header :land="$land"/>
    </div>

    {{ $slot }}

    <div class="default_container">
        <x-layout.landing.footer :land="$land"/>
    </div>
</section>

@stack('script')