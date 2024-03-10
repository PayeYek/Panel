@props([
    'borderType' => '1',
])

@php
    $radiusSize = match($land->styles->radius."") {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };

    $radiusSizeBefore = match($land->styles->radius."") {
        '0' => 'before:rounded-none',
        '2' => 'before:rounded-sm',
        '4' => 'before:rounded',
        '6' => 'before:rounded-md',
        '8' => 'before:rounded-lg',
        '12' => 'before:rounded-xl',
        '16' => 'before:rounded-2xl',
        default => 'before:rounded-md'
    };

    $radiusSizeSm = match($land->styles->radius."") {
        '0' => 'sm:rounded-none',
        '2' => 'sm:rounded-sm',
        '4' => 'sm:rounded',
        '6' => 'sm:rounded-md',
        '8' => 'sm:rounded-lg',
        '12' => 'sm:rounded-xl',
        '16' => 'sm:rounded-2xl',
        default => 'sm:rounded-md'
    };

    $borderStyle = '';
    switch ($land->styles->product_type."") {
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

    switch ($borderType) {
        case '1':
            $borderStyle = match($land->styles->product_type."") {
                '1', '2', '3', '4', '5', '6'  => 'drop-shadow-base',
                '7', '9', '10' => '',
                '8' => 'sm:drop-shadow-base',
                default => 'drop-shadow-base'
            };
            break;
        case '2':
            $borderStyle = match($land->styles->product_type."") {
                '1', '2', '3', '4', '5', '6'  => 'border border-dark-100',
                '7', '9', '10' => '',
                '8' => 'sm:border sm:border-dark-100',
                default => 'border border-dark-100'
            };
            break;
    }

    // $classType = match($land->styles->product_type."") {
    $classType = match('10') {
        '1' => 'lg:grid-cols-5 gap-4 sm:grid-cols-2',
        '2', '3' => 'lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '4' => 'sm:grid-cols-2 lg:grid-cols-3 gap-4',
        '5', '6' => 'md:grid-cols-2 gap-4',
        '7' => 'md:grid-cols-1 ' . $radiusSize . ' overflow-hidden ' . $borderStyle,
        '8' => 'md:grid-cols-1 ' . $radiusSize . ' overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4 ' . $borderStyle,
        '9' => 'sm:grid-cols-2 lg:grid-cols-4 ' . $radiusSize . ' overflow-hidden ' . $borderStyle,
        '10' => 'sm:grid-cols-2 lg:grid-cols-3 ' . $radiusSize . ' overflow-hidden ' . $borderStyle,
        '11' => 'md:grid-cols-1 ' . $radiusSize . ' overflow-hidden ' . $borderStyle,
        default => 'lg:grid-cols-5 gap-4 sm:grid-cols-2'
    };
@endphp

@push('script')
    <script>
        function handleFilterProducts(){
            const selectFilter = document.getElementById("selectFilter")
            for (let index = 0; index < document.querySelectorAll('.product_card').length; index++) {
                const element = document.querySelectorAll('.product_card')[index];
                if(selectFilter.value == 0){
                    element.classList.remove("hidden")
                } else if(element.dataset.category == selectFilter.value){
                    element.classList.remove("hidden")
                } else{
                    element.classList.add("hidden")
                }
            }
        }
    </script>
@endpush
<x-layout.default.main :land="$land">
    <main class="pt-4 relative">
        <CategoryFilter
            radius="{{ $radiusSize }}"
            classType="{{ $classType }}"
            type="{{ $land->styles->product_type }}"
            list="{{ $land->products }}"
            landSlug="{{ $land->slug }}"
            borderStyle="{{ $borderStyle }}"
            :evenOdd=true
            smRadius="{{ $radiusSizeSm }}"
            beforeRadius="{{ $radiusSizeBefore }}" />
        
    
        {{-- products --}}
        {{-- <x-home_landing.products :showSectionTitle=false :landSlug="$land->slug" :data="$land->products" type="11" evenOdd="true" radius="{{ $land->styles->radius }}" /> --}}
    </main>













    {{-- <x-layout.landing.sidebar :land="$land"/> --}}

    {{--CATEGORIES | PRODUCTS--}}
    {{-- <x-layout.landing.products :land="$land" :data="$data" all/> --}}

</x-layout.landing.land>
