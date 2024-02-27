@props([
    'type' => '1',
    'radius' => '8',
    'titleColor' => 'title_color_type_1',
    'actionButtonColor' => 'button_color_type_warning',
    'evenOdd' => 'false',
    'colorPalette' => '1',
    'data' => '',
    'landSlug' => '',
])

@php
$radiusSize = null;
    switch ($radius) {
        case '0':
            $radiusSize = 'rounded-none';
            break;
        case '2':
            $radiusSize = 'rounded-sm';
            break;
        case '4':
            $radiusSize = 'rounded';
            break;
        case '6':
            $radiusSize = 'rounded-md';
            break;
        case '8':
            $radiusSize = 'rounded-lg';
            break;
        case '12':
            $radiusSize = 'rounded-xl';
            break;
        case '16':
            $radiusSize = 'rounded-2xl';
            break;
        
        default:
            # code...
            break;
    }
    
$classType = null;
if($type == '1'){
    $classType = 'lg:grid-cols-5 gap-4 sm:grid-cols-2';
}elseif($type == '2' || $type == '3'){
    $classType = 'lg:grid-cols-4 gap-4 sm:grid-cols-2';
}elseif($type == '4'){
    //  . ' lg:gap-0' type 4 must have this class
    $classType = 'sm:grid-cols-2 lg:grid-cols-3 gap-4';
}elseif($type == '5'){
    //  . ' lg:gap-0' type 5 & 6 must have this class
    $classType = 'md:grid-cols-2 gap-4';
}elseif($type == '6'){
    $classType = 'md:grid-cols-1 shadow-base ' . $radiusSize . ' overflow-hidden';
}elseif($type == '7'){
    $classType = 'md:grid-cols-1 drop-shadow-base sm:drop-shadow-none ' . $radiusSize . ' overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-4';
}elseif($type == '8'){
    $classType = 'sm:grid-cols-2 lg:grid-cols-4 drop-shadow-base ' . $radiusSize . ' overflow-hidden';
}
@endphp

<div class="grid grid-cols-1 {{ $classType }}">
    @foreach ($data as $product)
    {{-- @dd($product); --}}
        {{-- <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" :image="$product->image" :name="$product->name" :slug="$product->slug" href="#" /> --}}
        <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" :image="$product->image" :name="$product->name" :landSlug="$landSlug" :productSlug="$product->slug" :description="$product->description" :colorPalette="$colorPalette" />
    @endforeach
    {{-- <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" /> --}}
</div>