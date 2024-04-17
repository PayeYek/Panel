@props([
    'type' => '1',
    'evenOdd' => '0',
    'data' => '',
    'borderType' => '0',
    'landSlug' => '',
    'companyName' => 'آرین دیزل',
    'landType' => 1,
    'headerType' => 1,
])

@php

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
        '1' => 'flex flex-col gap-4 sm:gap-0 items-center sm:flex-row sm:overflow-auto lg:justify-center lg:overflow-hidden',
        '2', '13' => 'grid grid-cols-1 lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '3', '4' => 'grid grid-cols-1 lg:grid-cols-3 gap-4',
        '5' => 'grid grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '6' => 'grid grid-cols-1 rounded-custom overflow-hidden sm:border-0 sm:gap-4 ' . $borderStyle,
        '7' => 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 rounded-custom overflow-hidden ' . $borderStyle,
        '8' => 'grid grid-cols-1 lg:grid-cols-3 rounded-custom overflow-hidden ' . $borderStyle,
        '9', => 'grid grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '10' => 'grid grid-cols-1 gap-4 lg:grid-cols-4',
        '11' => 'grid grid-cols-1 sm:grid-col-2 gap-4 lg:grid-cols-4',
        '12' => 'grid grid-cols-1',
        '14' => 'grid grid-cols-1 gap-6 lg:grid-cols-4',
        '15' => 'grid grid-cols-1 sm:grid-cols-2 gap-4 lg:max-w-[66rem] lg:mx-auto',
        '16' => 'grid grid-cols-1 lg:grid-cols-3 gap-4',
        default => 'grid grid-cols-1 lg:grid-cols-4 gap-4 sm:grid-cols-2'
    };

    
@endphp

<section class="mb-4 lg:mb-16 relative z-[1] default_container">
    @switch($headerType)
        @case(1)
            <x-home_landing.headerType.type-one title="محصولات شرکت {{ $companyName }}" link="{{ route('landing.product.list', ['page' => $landSlug]) }}" showall="نمایش همه" />
            @break
        @case(2)
            <x-home_landing.headerType.type-two title="محصولات" link="{{ route('landing.product.list', ['page' => $landSlug]) }}" showall="نمایش همه" />
            @break
        @case(3)
            <x-home_landing.headerType.type-three title="محصولات" link="{{ route('landing.product.list', ['page' => $landSlug]) }}" showall="آرشیو محصولات" />
            @break
        @case(4)
            <x-home_landing.headerType.type-four title="محصولات" link="{{ route('landing.product.list', ['page' => $landSlug]) }}" showall="آرشیو" />
            @break
        @case(5)
            <x-home_landing.headerType.type-five title="محصولات" />
            @break
        @case(6)
            <x-home_landing.headerType.type-six title="محصولات" link="{{ route('landing.product.list', ['page' => $landSlug]) }}" showall="آرشیو محصولات" />
            @break
        @default
    @endswitch


    <div class="w-full {{ $classType }}">
        <Products
            type="{{ $type }}"
            evenOdd="{{ $evenOdd }}"
            data="{!! $data !!}"
            landSlug="{{ $landSlug }}"
            borderStyle="{{ $borderStyle }}" />
    </div>
</section>