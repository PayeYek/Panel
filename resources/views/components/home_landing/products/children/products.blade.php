@props([
    'type' => '1',
    'radius' => '8',
    'evenOdd' => 'false',
    'colorPalette' => '1',
    'data' => '',
    'landSlug' => '',
])

@php
    $radiusSize = match($radius) {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };
    
    $classType = match($type) {
        '1' => 'lg:grid-cols-5 gap-4 sm:grid-cols-2',
        '2', '3' => 'lg:grid-cols-4 gap-4 sm:grid-cols-2',
        '4' => 'sm:grid-cols-2 lg:grid-cols-3 gap-4',
        '5', '6' => 'md:grid-cols-2 gap-4',
        '7' => 'md:grid-cols-1 drop-shadow-base ' . $radiusSize . ' overflow-hidden',
        '8' => 'md:grid-cols-1 drop-shadow-base sm:drop-shadow-none ' . $radiusSize . ' overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4',
        '9' => 'sm:grid-cols-2 lg:grid-cols-4 drop-shadow-base ' . $radiusSize . ' overflow-hidden',
        '10' => 'sm:grid-cols-2 lg:grid-cols-3 bg-white border border-dark-100 ' . $radiusSize . ' overflow-hidden',
        '11' => 'md:grid-cols-1 border border-dark-100 ' . $radiusSize . ' overflow-hidden',
        default => 'lg:grid-cols-5 gap-4 sm:grid-cols-2'
    };
@endphp

<div class="grid grid-cols-1 {{ $classType }}">
    @foreach ($data as $product)
        <x-home_landing.products.children.product :type="$type" :radius="$radiusSize" :evenOdd="$evenOdd" :image="$product->image" :name="$product->name" :landSlug="$landSlug" :productSlug="$product->slug" :description="$product->description" :colorPalette="$colorPalette" />
    @endforeach
</div>