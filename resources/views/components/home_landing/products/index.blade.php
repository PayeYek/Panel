@props([
    'type' => '1',
    'evenOdd' => '0',
    'data' => '',
    'borderType' => '0',
    'landSlug' => '',
    'companyName' => 'آرین دیزل',
    'landType' => 1,
    // 'showSectionTitle' => true,
])

@php

    $borderStyle = '';
    switch ($type."") {
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
        case '12':
            $borderStyle = match($borderType) {
                '0' => '',
                '1' => 'drop-shadow-base',
                default => 'border border-dark-100'
            };
            break;
    }

    $classType = match("1") {
        '1' => 'grid grid-cols-1 lg:grid-cols-5 gap-4 sm:grid-cols-2',
        '2', '3' => 'grid grid-cols-1 lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '4' => 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4',
        '5', '6' => 'grid grid-cols-1 md:grid-cols-2 gap-4',
        '7' => 'grid grid-cols-1 md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '8' => 'grid grid-cols-1 md:grid-cols-1 rounded-custom overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4 ' . $borderStyle,
        '9' => 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 rounded-custom overflow-hidden ' . $borderStyle,
        '10' => 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 rounded-custom overflow-hidden ' . $borderStyle,
        '11' => 'grid grid-cols-1 md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '12' => 'grid grid-cols-1 mx-auto w-72 sm:w-96 lg:flex lg:items-start lg:justify-center lg:gap-0 lg:w-full lg:mx-0 gap-2',
        '13' => 'grid grid-cols-1 mx-auto w-72 sm:w-96 lg:w-full lg:mx-0 gap-4 lg:grid-cols-4',
        default => 'lg:grid-cols-5 gap-4 sm:grid-cols-2'
    };
@endphp


<section class="mb-4 lg:mb-16 relative z-[1] default_container">
    @switch($landType)
        @case(1)
            <h3 class="mb-2 text-base sm:text-lg font-medium text-center text-stone-700"> محصولات شرکت {{ $companyName }} </h3>
            <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
            {{-- show all --}}
            <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block float-left px-2 cursor-pointer"> نمایش همه </Link>
            @break
        @case(2)
            
            @break
        @default
            
    @endswitch

    {{-- <x-home_landing.products.children.products :type="$type" :evenOdd="$evenOdd" :data="$data" :landSlug="$landSlug" :borderType="$borderType" /> --}}
    <div class="w-full {{ $classType }}">
        <Products
            :type="$type"
            :evenOdd="$evenOdd"
            :data="$data"
            :landSlug="$landSlug"
            :borderType="$borderType" />
    </div>
</section>