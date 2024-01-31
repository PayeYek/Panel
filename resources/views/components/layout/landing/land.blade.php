@props(['land'=>null])
<x-layout.landing>
    {{--HEADER: LOGO | LINKS: HOME, PRODUCTS, SALLER, ABOUT | SALLER --}}
    <x-layout.landing.header :land="$land"/>
    {{ $slot }}
    <x-layout.landing.footer :land="$land"/>
</x-layout.landing>
