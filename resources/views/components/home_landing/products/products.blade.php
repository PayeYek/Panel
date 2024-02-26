@props(['type' => '1', 'radius' => '-xl', 'titleColor' => 'title_color_type_1', 'defaultButtonColor' => 'button_color_type_warning_default', 'actionButtonColor' => 'button_color_type_warning', 'gapX' => '4', 'gapY' => '4', 'evenOdd' => 'false'])
@php
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
    $classType = 'md:grid-cols-1 drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded' . $radius . ' overflow-hidden';
}elseif($type === '6'){
    $classType = 'md:grid-cols-1 drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] sm:drop-shadow-none rounded' . $radius . ' overflow-hidden sm:rounded-none sm:overflow-visible sm:gap-x-' . $gapX . ' sm:gap-y-' . $gapY;
}elseif($type === '7'){
    $classType = 'sm:grid-cols-2 lg:grid-cols-4 drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded' . $radius . ' overflow-hidden';
}
@endphp
<div class="grid grid-cols-1 {{ $classType }}">
    <x-home_landing.products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-home_landing.products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" :evenOdd="$evenOdd" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
</div>