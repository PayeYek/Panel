@props(['land'=>null])
@stack('head')

<x-layout.landing>
    <x-layout.landing.sidebar :land="$land"/>
    {{--HEADER: LOGO | LINKS: HOME, PRODUCTS, SALLER, ABOUT | SALLER --}}
    <x-layout.landing.header :land="$land"/>
    <div class="py-10">
        {{ $slot }}
    </div>
    <x-layout.landing.footer :land="$land"/>
</x-layout.landing>

@stack('script')