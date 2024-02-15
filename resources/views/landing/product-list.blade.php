<x-layout.landing.land :land="$land">
    <x-layout.landing.sidebar :land="$land"/>

    {{--CATEGORIES | PRODUCTS--}}
    <x-layout.landing.products :land="$land" :data="$data" all/>
</x-layout.landing.land>
