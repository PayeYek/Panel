@props([
    'productName' => '',
    'product' => '',
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

@endphp

<section class="lg:pt-24">
    <h1 class="hidden md:block text-2xl lg:text-[32px] font-medium text-normal mb-8 lg:mb-11 line-clamp-1"> {{ $productName }} </h1>
    {{-- boxes --}}
    <div class="grid grid-cols-3 gap-3 text-sm 2xl:text-[15px] font-normal mb-4 md:max-w-[524px]">
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="line-clamp-1 text-normal"> نوع کاربری </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->usage }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="text-normal line-clamp-1"> نوع کابین </p>
            <p class="text-gray-900 line-clamp-1 font-semibold">  {{ $product->cabin == 0 ? 'بدون خواب' : 'خواب دار' }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="text-normal line-clamp-1"> تناژ </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->tonnage }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="text-normal line-clamp-1"> تعداد محور چرخ‌ها </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->axle == 1 ? 'تک محوره' : ($product->axle == 2 ? 'جفت محوره' : 'سه محوره') }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="text-normal line-clamp-1"> سال </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->year }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="text-normal line-clamp-1"> مدل </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->model }} </p>
        </div>
    </div>

    {{-- guide btns --}}
    <div class="flex_center flex-col gap-2 md:max-w-[524px] md:flex-row lg:gap-4">
        <x-pdp_landing.linkBtn text="دانلود کاتالوگ" class="rounded-custom text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
        <x-pdp_landing.linkBtn text="مشاوره و خرید" class="rounded-custom text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
    </div>
</section>