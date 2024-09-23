@props([
    'borderType' => '1',
])

@php
    $borderStyle = '';
    switch ($land->styles->border_type."") {
        case '0':
            $borderStyle = match($land->styles->category_card_type."") {
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11'  => '',
                default => ''
            };
            break;
        case '1':
            $borderStyle = match($land->styles->category_card_type."") {
                '1', '2', '3', '4', '5', '6', '7','9', '10', '11'  => 'border border-stone-400',
                '8' => 'sm:border border-stone-400',
                default => 'border border-stone-400'
            };
            break;
        case '2':
            $borderStyle = match($land->styles->category_card_type."") {
                '1', '2', '3', '4', '5', '6', '7', '9', '10', '11'  => 'drop-shadow-base',
                '8' => 'sm:drop-shadow-base',
                default => 'drop-shadow-base'
            };
            break;
    }

    $classType = match($land->styles->category_card_type."") {
        '1' => 'lg:grid-cols-4 gap-4 sm:gap-0 sm:grid-cols-2',
        '2' => 'lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '3' => 'sm:grid-cols-2 lg:grid-cols-3 gap-4',
        '4' => 'md:grid-cols-2 gap-4',
        '5' => 'md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '6' => 'md:grid-cols-1 rounded-custom overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4 sm:border-0 ' . $borderStyle,
        '7' => 'sm:grid-cols-2 lg:grid-cols-4 rounded-custom overflow-hidden gap-px ' . $borderStyle,
        '8' => 'sm:grid-cols-2 lg:grid-cols-3 rounded-custom overflow-hidden ' . $borderStyle,
        '9' => 'md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '10' => 'gap-12',
        '11' => 'gap-4 sm:grid-cols-2 lg:grid-cols-4',
        '12' => 'gap-4',
        '13' => 'gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4',
        '14' => 'lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '15' => 'sm:grid-cols-2 gap-4 lg:max-w-[66rem] lg:mx-auto',
        default => 'lg:grid-cols-5 gap-4 sm:grid-cols-2',
    };
@endphp

<x-layout.default.main :land="$land">
    <main class="pt-4 relative">
        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />
@if ($land->products->count() > 0)
        <CategoryFilter
            classType="{{ $classType }}"
            filterType="{{ $land->styles->category_filter_type }}"
            productType="{{ $land->styles->category_card_type }}"
            list="{{ $data }}"
            landSlug="{{ $land->slug }}"
            borderStyle="{{ $borderStyle }}"
            :evenOdd="{{ $land->styles->category_striped }}" />
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

        @switch($land->styles->contact_type)
            @case(1)
                <x-home_landing.contact.type-one />
            @break

            @case(2)
                <x-home_landing.contact.type-five />
            @break

            @case(3)
                <x-home_landing.contact.type-six />
            @break

            @case(4)
                <x-home_landing.contact.type-four />
            @break

            @case(5)
                <x-home_landing.contact.type-two />
            @break

            @case(6)
                <x-home_landing.contact.type-seven />
            @break

            @case(7)
                <x-home_landing.contact.type-eight />
            @break
        @endswitch
    </main>













    {{-- <x-layout.landing.sidebar :land="$land"/> --}}

    {{--CATEGORIES | PRODUCTS--}}
    {{-- <x-layout.landing.products :land="$land" :data="$data" all/> --}}

</x-layout.landing.land>
