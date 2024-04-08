@props([
    'data' => '',
    'landSlug' => '',
    ])
@php
    $categories = [];
    foreach ($data as $item) {
        $categories[] = $item['category'];
    }
@endphp


<section class="bg-normal h-20 lg:h-28 w-full flex_center mt-[-23px] lg:mt-[-31px] mb-8">
    <section class="default_container w-full flex_center">
        @foreach ($categories as $item)
            <a href="{{ route('landing.product.list', ['page' => $landSlug, 'category' => $item->id]) }}" class="flex_center border-l border-l-white h-8 first:pr-0 last:pl-0 px-3 sm:px-6 lg:px-20 text-white text-sm sm:text-lg lg:text-2xl font-medium last:border-l-0"> {{ $item->title }} </a>
        @endforeach
    </section>
</section>