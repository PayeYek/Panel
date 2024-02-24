@props(['type' => '1'])
{{-- <div class="grid grid-cols-1 gap-4 md:grid-cols-2 {{ $type === '1' || $type === '2' ? 'lg:grid-cols-5' : $type === '3' : 'lg:grid-cols-3' : 'lg:grid-cols-3' }}"> --}}
<div class="grid grid-cols-1 {{ $type === '1' ||  $type === '2'  ? 'lg:grid-cols-5 gap-4 md:grid-cols-2' : ($type === '3' ? 'lg:grid-cols-3 gap-4 md:grid-cols-2' : ($type === '4' || $type === '5' ? 'md:grid-cols-2 lg:grid-cols-2 gap-4' : ($type === '6' ? 'md:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-0' : ($type === '7' ? 'md:grid-cols-1 rounded-xl overflow-hidden gap-0' : ($type === '8' ? 'md:grid-cols-1 rounded-xl overflow-hidden md:rounded-none md:overflow-auto gap-0 md:gap-4' : ($type === '9' ? 'lg:grid-cols-4 gap-4 lg:gap-0 lg:rounded-xl lg:overflow-hidden md:grid-cols-2' : 'md:grid-cols-2 gap-4 lg:grid-cols-8')))))) }}">
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
</div>