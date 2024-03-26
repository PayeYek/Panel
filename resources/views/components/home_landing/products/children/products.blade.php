@props([
    'type' => '1',
    'evenOdd' => 'false',
    'data' => '',
    'landSlug' => '',
    'borderType' => '0',
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
    
    // $classType = match($type."") {
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
<div class="w-full {{ $classType }}">
    @foreach ($data->take(4) as $product)
        <x-home_landing.products.children.product
            {{-- :type="$type" --}}
            type="1"
            :evenOdd="$evenOdd"
            :image="$product->image"
            :name="$product->name"
            :model="$product->model"
            :landSlug="$landSlug"
            :productSlug="$product->slug"
            :description="$product->description"
            :categoryId="$product->category_id"
            :borderType="$borderType"
            />
    @endforeach
</div>