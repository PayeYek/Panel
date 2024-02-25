@props(['type' => '1', 'radius' => '-xl', 'titleColor' => 'title_color_type_1', 'defaultButtonColor' => 'button_color_type_warning_default', 'actionButtonColor' => 'button_color_type_warning', 'gapX' => '4', 'gapY' => '4'])
@php
$classType = null;
if($type === '1' || $type === '2'){
    $classType = 'lg:grid-cols-5 gap-x-' . $gapX . ' gap-y-' . $gapY . ' sm:grid-cols-2';
}elseif($type === '3'){
    $classType = 'lg:grid-cols-4 gap-x-' . $gapX . ' gap-y-' . $gapY . ' sm:grid-cols-2';
}elseif($type === '4'){
    //  . ' lg:gap-0' type 4 must have this class
    $classType = 'sm:grid-cols-2 lg:grid-cols-3 gap-x-' . $gapX . ' gap-y-' . $gapY;
}elseif($type === '5' || $type === '6'){
    //  . ' lg:gap-0' type 5 & 6 must have this class
    $classType = 'md:grid-cols-2 gap-x-' . $gapX . ' gap-y-' . $gapY;
}elseif($type === '7'){
    $classType = 'md:grid-cols-1 rounded' . $radius . ' overflow-hidden gap-x-' . $gapX . ' gap-y-' . $gapY;
}elseif($type === '8'){
    $classType = 'md:grid-cols-1 rounded' . $radius . ' overflow-hidden md:rounded-none md:overflow-auto gap-x-' . $gapX . ' gap-y-' . $gapY;
}elseif($type === '9'){
    // lg:gap-0 type 9 must have this class
    $classType = 'lg:grid-cols-4 gap-x-' . $gapX . ' gap-y-' . $gapY . ' lg:rounded' . $radius . ' lg:overflow-hidden md:grid-cols-2';
}
@endphp
<div class="grid grid-cols-1 {{ $classType }}">
    <x-products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" :radius="$radius" :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor" :actionButtonColor="$actionButtonColor" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
</div>