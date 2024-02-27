@props([
    'type' => '1',
    'radius' => '8',
    'titleColor' => 'title_color_type_1',
    'defaultButtonColor' => 'button_color_type_warning_default',
    'actionButtonColor' => 'button_color_type_warning',
    'gapX' => '4',
    'gapY' => '4',
    'evenOdd' => 'false',
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
if($type === '1'){
    $classType = 'lg:grid-cols-5 gap-x-' . $gapX . ' gap-y-' . $gapY . ' sm:grid-cols-2';
}elseif($type === '2'){
    $classType = 'lg:grid-cols-4 gap-x-' . $gapX . ' gap-y-' . $gapY . ' sm:grid-cols-2';
}elseif($type === '3'){
    //  . ' lg:gap-0' type 4 must have this class
    $classType = 'sm:grid-cols-2 lg:grid-cols-3 gap-x-' . $gapX . ' gap-y-' . $gapY;
}elseif($type === '4'){
    //  . ' lg:gap-0' type 5 & 6 must have this class
    $classType = 'md:grid-cols-2 gap-x-' . $gapX . ' gap-y-' . $gapY;
}elseif($type === '5'){
    $classType = 'md:grid-cols-1 drop-shadow-base ' . $radiusSize . ' overflow-hidden';
}elseif($type === '6'){
    $classType = 'md:grid-cols-1 drop-shadow-base sm:drop-shadow-none ' . $radiusSize . ' overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-x-' . $gapX . ' sm:gap-y-' . $gapY;
}elseif($type === '7'){
    $classType = 'sm:grid-cols-2 lg:grid-cols-4 drop-shadow-base ' . $radiusSize . ' overflow-hidden';
}
@endphp
{{-- @dd($data); --}}
<div class="grid grid-cols-1 {{ $classType }}">
    @foreach ($data as $product)
        {{-- <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" :image="$product->image" :name="$product->name" :slug="$product->slug" href="#" /> --}}
        <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" :image="$product->image" :name="$product->name" :landSlug="$landSlug" :productSlug="$product->slug" />
    @endforeach
    {{-- <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.children.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" /> --}}
</div>