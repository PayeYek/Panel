@props([
    'type' => '1',
    'evenOdd' => 'false',
    'data' => '',
    'landSlug' => '',
    'borderType' => '1',
])

@php
    // $radiusSize = match($radius) {
    //     '0' => 'rounded-none',
    //     '2' => 'rounded-sm',
    //     '4' => 'rounded',
    //     '6' => 'rounded-md',
    //     '8' => 'rounded-lg',
    //     '12' => 'rounded-xl',
    //     '16' => 'rounded-2xl',
    //     default => 'rounded-md'
    // };

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
            break;
    }
    
    $classType = match($type."") {
        '1' => 'lg:grid-cols-5 gap-4 sm:grid-cols-2',
        '2', '3' => 'lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '4' => 'sm:grid-cols-2 lg:grid-cols-3 gap-4',
        '5', '6' => 'md:grid-cols-2 gap-4',
        '7' => 'md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        '8' => 'md:grid-cols-1 rounded-custom overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4 ' . $borderStyle,
        '9' => 'sm:grid-cols-2 lg:grid-cols-4 rounded-custom overflow-hidden ' . $borderStyle,
        '10' => 'sm:grid-cols-2 lg:grid-cols-3 rounded-custom overflow-hidden ' . $borderStyle,
        '11' => 'md:grid-cols-1 rounded-custom overflow-hidden ' . $borderStyle,
        default => 'lg:grid-cols-5 gap-4 sm:grid-cols-2'
    };
@endphp

<div class="grid grid-cols-1 {{ $classType }}">
    @foreach ($data as $product)
        <x-home_landing.products.children.product
            :type="$type"
            :evenOdd="$evenOdd"
            :image="$product->image"
            :name="$product->name"
            :landSlug="$landSlug"
            :productSlug="$product->slug"
            :description="$product->description"
            :categoryId="$product->category_id"
            />
    @endforeach
</div>