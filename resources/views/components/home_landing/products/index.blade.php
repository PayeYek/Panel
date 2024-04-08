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

    // $borderStyle = '';
    // switch ($type."") {
    //     case '7':
    //         $borderStyle = 'drop-shadow-base';
    
    //         break;
    //     case '8':
    //         $borderStyle = match($borderType) {
    //             '1' => 'drop-shadow-base sm:drop-shadow-none',
    //             default => 'border border-dark-100 sm:border-0'
    //         };
    
    //         break;
    //     case '9':
    //         $borderStyle = match($borderType) {
    //             '1' => 'drop-shadow-base',
    //             default => 'border border-dark-100'
    //         };
    //         break;
    //     case '10':
    //         $borderStyle = match($borderType) {
    //             '1' => 'drop-shadow-base',
    //             default => 'border border-dark-100'
    //         };
    //         break;
    //     case '11':
    //         $borderStyle = match($borderType) {
    //             '1' => 'drop-shadow-base',
    //             default => 'border border-dark-100'
    //         };
    //     case '12':
    //         $borderStyle = match($borderType) {
    //             '0' => '',
    //             '1' => 'drop-shadow-base',
    //             default => 'border border-dark-100'
    //         };
    //         break;
    // }

    $borderStyle = '';
    switch ($borderType."") {
        case '0':
            $borderStyle = match($type."") {
                '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'  => '',
                default => ''
            };
            break;
        case '1':
            $borderStyle = match($type."") {
                '1', '2', '3', '4', '5', '6', '7','9', '10', '11', '12', '14'  => 'border border-stone-400',
                '8' => 'border border-stone-400',
                '13' => 'border-y border-x-4 border-stone-400',
                default => 'border border-stone-400'
            };
            break;
        case '2':
            $borderStyle = match($type."") {
                '1', '2', '3', '4', '5', '6', '7', '9', '10', '11', '12', '14'  => 'drop-shadow-base',
                '8' => 'drop-shadow-base',
                default => 'drop-shadow-base'
            };
            break;
    }

    $classType = match($type."") {
        '1' => 'flex flex-col gap-4 items-center sm:flex-row sm:overflow-auto lg:justify-center lg:overflow-hidden',
        '2', '14' => 'grid grid-cols-1 lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '3', '4' => 'grid grid-cols-1 lg:grid-cols-3 gap-4',
        '5' => 'grid grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '6' => 'grid grid-cols-1 rounded-custom overflow-hidden sm:border-0 sm:gap-4 ' . $borderStyle,
        '7' => 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 rounded-custom overflow-hidden ' . $borderStyle,
        '8' => 'grid grid-cols-1 lg:grid-cols-3 rounded-custom overflow-hidden ' . $borderStyle,
        '9', '10' => 'grid grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '11', '12' => 'grid grid-cols-1 gap-4 lg:grid-cols-4',
        '13' => 'grid grid-cols-1',
        '15' => 'grid grid-cols-1 gap-6 lg:grid-cols-4',
        default => 'grid grid-cols-1 lg:grid-cols-4 gap-4 sm:grid-cols-2'
    };

    // $childBorderStyle='';

    // switch ($borderType) {
    //     case '0':
    //         $childBorderStyle = match($type."") {
    //             '1', '2', '3', '4', '5', '6'  => '',
    //             '7', '9', '10' => '',
    //             '8' => '',
    //             default => ''
    //         };
    //         break;
    //     case '1':
    //         $childBorderStyle = match($type."") {
    //             '1', '2', '3', '4', '5', '6'  => 'drop-shadow-base',
    //             '7', '9', '10' => '',
    //             '8' => 'sm:drop-shadow-base',
    //             default => 'drop-shadow-base'
    //         };
    //         break;
    //     case '2':
    //         $childBorderStyle = match($type."") {
    //             '1', '2', '3', '4', '5', '6'  => 'border border-dark-100',
    //             '7', '9', '10' => '',
    //             '8' => 'sm:border sm:border-dark-100',
    //             default => 'border border-dark-100'
    //         };
    //         break;
    // }

    
@endphp


<section class="mb-4 lg:mb-16 relative z-[1] default_container">
    @switch($landType)
        @case(1)
            <h3 class="mb-2 text-base sm:text-lg font-medium text-center text-stone-700"> محصولات شرکت {{ $companyName }} </h3>
            <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
            {{-- show all --}}
            <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block float-left px-2 cursor-pointer"> نمایش همه </Link>
            @break
        @case(4)
            <div class="relative mb-4">
                <h3 class="text-lg lg:text-2xl font-medium text-center text-stone-700"> محصولات </h3>
                {{-- show all --}}
                <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="absolute left-0 top-1 text-base font-medium text-stone-700 hidden lg:inline-flex px-2 cursor-pointer flex-row gap-2">
                    <span> آرشیو محصولات </span>
                    <svg width="20" height="20" class="stroke-current" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.70833 15.8337L3.26562 10.0003M3.26562 10.0003L8.70833 4.16699M3.26562 10.0003L16.3281 10.0003" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </Link>
            </div>
            @break
        @case(5)
            <div class="flex_between">
                <h3 class="text-lg lg:text-2xl font-medium text-center text-stone-700"> محصولات </h3>
                {{-- show all --}}
                <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="absolute left-0 top-1 text-base font-medium text-stone-700 hidden lg:inline-flex px-2 cursor-pointer flex-row gap-2">
                    <span> آرشیو محصولات </span>
                    <svg width="20" height="20" class="stroke-current" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.70833 15.8337L3.26562 10.0003M3.26562 10.0003L8.70833 4.16699M3.26562 10.0003L16.3281 10.0003" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </Link>
            </div>
            @break
        @case(6)
            <h3 class="mb-4 text-lg lg:text-2xl font-medium text-center text-stone-700"> محصولات </h3>
            @break
        @default
    @endswitch

    {{-- <x-home_landing.products.children.products :type="$type" :evenOdd="$evenOdd" :data="$data" :landSlug="$landSlug" :borderType="$borderType" /> --}}
    <div class="w-full {{ $classType }}">
        <Products
            type="{{ $type }}"
            evenOdd="{{ $evenOdd }}"
            data="{!! $data !!}"
            landSlug="{{ $landSlug }}"
            borderStyle="{{ $borderStyle }}" />
    </div>
</section>