@php
    $gap = match($land->styles->a_striped."") {
        '0'  => 'gap-14 lg:gap-0',
        '1'  => 'gap-14 sm:gap-0',
        default => ''
    };
    
    $gridCols = match($land->styles->a_card_type."") {
        '1' => 'grid grid-cols-1 gap-4 default_container',
        '2' => 'gap-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 default_container',
        '3' => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom mx-4 lg:default_container',
        '4' => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom mx-4 lg:default_container',
        '5' => 'grid grid-cols-1 lg:divide-y lg:divide-y-stone-400 default_container ' . $gap,
        '6' => 'grid grid-cols-1 md:grid-cols-2 default_container gap-y-8 gap-x-4 lg:grid-cols-3 lg:gap-y-12',
        default => 'grid grid-cols-1 gap-4 default_container',
    };

    $borderStyle = match($land->styles->border_type."") {
        '0'  => '',
        '1'  => 'border border-stone-400',
        '2'  => 'drop-shadow-base',
        default => 'drop-shadow-base'
    };

    $marginBottom = match($land->styles->land_id."") {
        '7'  => 'mb-8 sm:mb-24 lg:mb-28',
        default => ''
    };

    
@endphp

<x-layout.default.main :land="$land">
    <main class="pt-4 {{ $marginBottom }}">
        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        <Articles
            gridStyle="{{ $gridCols }}"
            type="{{ $land->styles->a_card_type }}"
            landSlug="{{ $land->slug }}"
            data="{{ $land->articles }}"
            borderStyle="{{ $borderStyle }}"
            evenOdd="{{ $land->styles->a_striped }}" />

        {{-- contact to expert --}}
        @switch($land->styles->contact_type)
            @case(1)
                <x-home_landing.contact.type-one />
            @break

            @case(4)
                <x-home_landing.contact.type-four />
            @break

            @case(5)
                <x-home_landing.contact.type-two />
            @break

        @endswitch
    </main>

</x-layout.default.main>
