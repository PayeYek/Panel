@props([
    'borderType' => '1',
])

@php
    $borderStyle = '';
    switch ($land->styles->category_card_type."") {
        case '7':
            $borderStyle = 'drop-shadow-base';
    
            break;
        case '8':
            $borderStyle = match($borderType) {
                '1' => 'drop-shadow-base sm:drop-shadow-none',
                default => 'border border-dark-100 sm:border-0'
            };
    
            break;
        case '9':
            $borderStyle = match($borderType) {
                '1' => 'drop-shadow-base',
                default => 'border border-dark-100'
            };
            break;
        case '10':
            $borderStyle = match($borderType) {
                '1' => 'drop-shadow-base',
                default => 'border border-dark-100'
            };
            break;
        case '11':
            $borderStyle = match($borderType) {
                '1' => 'drop-shadow-base',
                default => 'border border-dark-100'
            };
            break;
    }

    switch ($land->styles->border_type."") {
        case '1':
            $borderStyle = match($land->styles->category_card_type."") {
                '1', '2', '3', '4', '5', '6'  => 'drop-shadow-base',
                '7', '9', '10' => '',
                '8' => 'sm:drop-shadow-base',
                default => 'drop-shadow-base'
            };
            break;
        case '2':
            $borderStyle = match($land->styles->category_card_type."") {
                '1', '2', '3', '4', '5', '6'  => 'border border-dark-100',
                '7', '9', '10' => '',
                '8' => 'sm:border sm:border-dark-100',
                default => 'border border-dark-100'
            };
            break;
    }

    // $classType = match($land->styles->category_card_type."") {
    $classType = match("12") {
        '1' => 'lg:grid-cols-5 gap-4 sm:grid-cols-2',
        '2', '3' => 'lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '4' => 'sm:grid-cols-2 lg:grid-cols-3 gap-4',
        '5', '6' => 'md:grid-cols-2 gap-4',
        '7' => 'md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '8' => 'md:grid-cols-1 rounded-custom overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4 ' . $borderStyle,
        '9' => 'sm:grid-cols-2 lg:grid-cols-4 rounded-custom overflow-hidden ' . $borderStyle,
        '10' => 'sm:grid-cols-2 lg:grid-cols-3 rounded-custom overflow-hidden ' . $borderStyle,
        '11' => 'md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '12' => 'gap-12',
        default => 'lg:grid-cols-5 gap-4 sm:grid-cols-2'
    };
@endphp
<x-layout.default.main :land="$land">
    <main class="pt-4 relative">
        <CategoryFilter
            classType="{{ $classType }}"
            {{-- type="{{ $land->styles->category_card_type }}" --}}
            productType="12"
            list="{{ $data }}"
            landSlug="{{ $land->slug }}"
            borderStyle="{{ $borderStyle }}"
            :evenOdd=true />
    </main>













    {{-- <x-layout.landing.sidebar :land="$land"/> --}}

    {{--CATEGORIES | PRODUCTS--}}
    {{-- <x-layout.landing.products :land="$land" :data="$data" all/> --}}

</x-layout.landing.land>
