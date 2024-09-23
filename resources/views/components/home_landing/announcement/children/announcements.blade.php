@props([
    'type' => '1',
    'data' => '',
    'land' => '',
    'landSlug' => '/',
    'borderType' => '0',
    'evenOdd' => 1,
    'landType' => 1,
])
@php
    $gridCols = match ($type) {
        1 => 'grid grid-cols-1 gap-4',
        2, 11 => 'flex gap-4 items-center overflow-auto p-4 scrollbar-none md:scrollbar-thin lg:grid lg:grid-cols-4 lg:p-0 lg:overflow-visible',
        3 => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom',
        4 => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom',
        6 => 'grid grid-cols-1 gap-5',
        7 => 'grid grid-cols-1 sm:grid-cols-2 gap-4 default_container',
        8 => 'grid grid-cols-1 gap-4 md:grid-cols-3 default_container',
        9 => 'grid grid-cols-1 gap-4 md:grid-cols-3',
        10 => 'grid grid-cols-1 gap-4',
        default => 'grid grid-cols-1 gap-4',
    };

    $borderStyle = match ($borderType) {
        '0' => '',
        '1' => 'border border-stone-400',
        '2' => 'drop-shadow-base',
        default => '',
    };

@endphp

@if ($type.'' !== '5')
    <div class="mb-4 {{ $gridCols }} sm:mb-0 w-full">
        <HomeArticles landSlug="{{ $landSlug }}" data="{!! $data !!}" borderStyle="{{ $borderStyle }}" type="{{ $type }}" evenOdd="{{ $evenOdd }}" />
    </div>

@else
    <section class="w-full">
        <PdpMoreArticles slides="{!! $land->articles !!}" borderType="{{ $borderType }}" striped="{{ $evenOdd }}" landSlug="{{ $landSlug }}" />
    </section>
@endif