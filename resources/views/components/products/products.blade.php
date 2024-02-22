@props(['type' => '1'])
{{-- <div class="grid grid-cols-1 gap-4 md:grid-cols-2 {{ $type === '1' || $type === '2' ? 'lg:grid-cols-5' : $type === '3' : 'lg:grid-cols-3' : 'lg:grid-cols-3' }}"> --}}
<div class="grid grid-cols-1 gap-4 md:grid-cols-2 {{ $type === '1' ||  $type === '2' ? 'lg:grid-cols-5' : ($type === '3' ? 'lg:grid-cols-3' : ($type === '4' ? 'lg:grid-cols-2' : 'lg:grid-cols-8')) }}">
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
    <x-products.product :type="$type" image="{{ asset('assets/images/test/small-truck.png') }}" href="#" />
</div>