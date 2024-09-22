<x-layout.default.main :land="$land">

    <main class="pt-4 relative mb-8 sm:mb-24 lg:mb-28 default_container">
        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        <Videos :type="{{$land->styles->video_card_type}}" data="{{ $land->videos }}" />

    </main>

</x-layout.default.main>