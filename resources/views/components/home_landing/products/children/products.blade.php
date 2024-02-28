@props([
    'type' => '1',
    'radius' => '8',
    'titleColor' => 'title_color_type_1',
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
    
$classType = null;
if($type == '1'){
    $classType = 'lg:grid-cols-5 gap-4 sm:grid-cols-2';
}elseif($type == '2' || $type == '3'){
    $classType = 'lg:grid-cols-4 gap-4 sm:grid-cols-2';
}elseif($type == '4'){
    //  . ' lg:gap-0' type 4 must have this class
    $classType = 'sm:grid-cols-2 lg:grid-cols-3 gap-4';
}elseif($type == '5' || $type == '6'){
    //  . ' lg:gap-0' type 5 & 6 must have this class
    $classType = 'md:grid-cols-2 gap-4';
}elseif($type == '7'){
    $classType = 'md:grid-cols-1 drop-shadow-base ' . $radiusSize . ' overflow-hidden';
}elseif($type == '8'){
    $classType = 'md:grid-cols-1 drop-shadow-base sm:drop-shadow-none ' . $radiusSize . ' overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4';
}elseif($type == '9'){
    $classType = 'sm:grid-cols-2 lg:grid-cols-4 drop-shadow-base ' . $radiusSize . ' overflow-hidden';
}elseif($type == '10'){
    $classType = 'sm:grid-cols-2 lg:grid-cols-3 bg-white border border-dark-100 ' . $radiusSize . ' overflow-hidden';
}
@endphp

<div class="grid grid-cols-1 {{ $classType }}">
    @foreach ($data as $product)
    {{-- @dd($product); --}}
        {{-- <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" :image="$product->image" :name="$product->name" :slug="$product->slug" href="#" /> --}}
        <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :evenOdd="$evenOdd" :image="$product->image" :name="$product->name" :landSlug="$landSlug" :productSlug="$product->slug" :description="$product->description" :colorPalette="$colorPalette" />
    @endforeach
    {{-- <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" /> --}}
</div>