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
        '1' => 'lg:grid-cols-5 gap-4 sm:grid-cols-2',
        '2' => 'lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '3' => 'sm:grid-cols-2 lg:grid-cols-3 gap-4',
        '4' => 'md:grid-cols-2 gap-4',
        '5' => 'md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '6' => 'md:grid-cols-1 rounded-custom overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4 sm:border-0 ' . $borderStyle,
        '7' => 'sm:grid-cols-2 lg:grid-cols-4 rounded-custom overflow-hidden gap-px ' . $borderStyle,
        '8' => 'sm:grid-cols-2 lg:grid-cols-3 rounded-custom overflow-hidden ' . $borderStyle,
        '9' => 'md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '10' => 'gap-12',
        '11' => 'gap-4 lg:grid-cols-4',
        default => 'lg:grid-cols-5 gap-4 sm:grid-cols-2',
    };
@endphp

<x-layout.default.main :land="$land">
    <main class="pt-4 relative">
        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        <CategoryFilter
            classType="{{ $classType }}"
            {{-- filterType="{{ $land->styles->category_filter_type }}" --}}
            filterType="1"
            productType="{{ $land->styles->category_card_type }}"
            list="{{ $data }}"
            landSlug="{{ $land->slug }}"
            borderStyle="{{ $borderStyle }}"
            :evenOdd="{{ $land->styles->category_striped }}" />

            @if ($land->styles->land_id == 2)
                <section class="bg-stone-200 pt-20 pb-14 lg:pt-16 lg:pb-24 relative">
                    <svg class="absolute left-1/2 -translate-x-1/2 top-[-34px]" width="137" height="70" viewBox="0 0 137 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M129.267 35C97.7671 35 105.767 70 70.7671 70C35.7671 70 39.7671 35 9.76701 35C-27.233 35 51.4371 0 70.7671 0C90.0971 0 158.767 35 129.267 35Z" fill="white"/>
                    </svg>
                    <form action="#" class="default_container flex flex-col items-center">
                        <p class="text-base lg:text-xl xl:text-2xl font-semibold mb-6 lg:mb-4 text-center text-stone-700"> ارتباط با کارشناسان فروش </p>
                        <p class="text-sm lg:text-base font-normal mb-3 lg:mb-4 text-center text-stone-700"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید. </p>
                        <input type="number" name="phone" class="h-11 w-full max-w-64 focus:ring-0 dir-ltr mb-16 outline-none rounded-custom border border-[#CFD1D4] focus:border-[#CFD1D4] placeholder:text-[#ACACAC]" placeholder="09" />
                        <button type="submit" class="rounded-custom h-11 w-full max-w-64 flex_center cursor-pointer bg-normal text-lg font-medium text-white"> ارسال </button>
                    </form>
                </section>
            @endif
    </main>













    {{-- <x-layout.landing.sidebar :land="$land"/> --}}

    {{--CATEGORIES | PRODUCTS--}}
    {{-- <x-layout.landing.products :land="$land" :data="$data" all/> --}}

</x-layout.landing.land>
