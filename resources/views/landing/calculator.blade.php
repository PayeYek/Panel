<x-layout.default.main :land="$land">

    <main class="pt-4 relative mb-8 sm:mb-24 lg:mb-28">
        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        <Computing :list="{{$land->products}}" :categories="{{ $categories }}" />
    </main>

</x-layout.default.main>