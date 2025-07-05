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
        '7' => 'grid grid-cols-1 gap-5 default_container',
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
        <x-common_landing.breadcrumbs :data="$breadcrumbs"/>

        @if ($land->articles()->published()->count() > 0)
            <Articles
                gridStyle="{{ $gridCols }}"
                type="{{ $land->styles->a_card_type }}"
                landSlug="{{ $land->slug }}"
                data="{{ $land->articles()->where('publish',true)->get() }}"
                borderStyle="{{ $borderStyle }}"
                evenOdd="{{ $land->styles->a_striped }}"/>
        @else
            <section class="relative flex-col gap-4 flex_center h-80 sm:h-96 mb-10">
                <p class="pb-4 text-base font-normal border-b sm:text-lg border-b-normal text-stone-700 mr-6"> محتوایی با این مشخصات
                    پیدا
                    نشد. </p>
                <p class="text-sm font-normal sm:text-base text-stone-700 mr-6"> پیشنهاد می کنیم فیلتر ها را تغییر دهید. </p>

                <!-- icon -->
                <svg class="absolute translate-x-1/2 -translate-y-1/2 size-80 sm:size-96 top-1/2 right-1/2" viewBox="0 0 362 362" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2"
                        d="M281.179 283.479L351.799 351.799M329.026 169.613C329.026 257.654 257.654 329.026 169.613 329.026C81.571 329.026 10.1992 257.654 10.1992 169.613C10.1992 81.571 81.571 10.1992 169.613 10.1992C257.654 10.1992 329.026 81.571 329.026 169.613Z"
                        stroke="#58595B" stroke-width="20" stroke-linecap="round" />
                </svg>

            </section>
        @endif

        {{-- contact to expert --}}
        @switch($land->styles->contact_type)
            @case(1)
                <x-home_landing.contact.type-one/>
                @break

            @case(4)
                <x-home_landing.contact.type-four/>
                @break

            @case(5)
                <x-home_landing.contact.type-two/>
                @break

        @endswitch
    </main>

</x-layout.default.main>
