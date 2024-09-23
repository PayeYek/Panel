<x-layout.default.main :land="$land">

    <main class="pt-4 relative mb-8 sm:mb-24 lg:mb-28">
        {{-- breadcrumbs --}}
        {{-- @dd($categories->toArray()); --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        <Computing :list="{{$land->products}}" :categories="{{ $categories }}" landSlug="{{ $land->slug }}" landId="{{ $land->styles->land_id }}" />
    </main>

</x-layout.default.main>