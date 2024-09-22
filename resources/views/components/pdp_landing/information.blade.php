@props([
    'productName' => '',
    'product' => '',
    'landId' => '',
    'infoType' => '',
    'landSlug' => '',
    'categories' => '',
])

@php
    $boxStyle = match($infoType) {
        1  => 'bg-[#F2F2F2]',
        3  => 'relative before:absolute before:content-[""] before:bottom-0 before:inset-x-6 before:h-px before:bg-normal/30 last:before:bg-transparent',
        4  => 'bg-[#F2F2F2] border-r-4 border-r-normal',
        5  => 'border border-r-4 border-stone-400',
        default => 'bg-[#F2F2F2]'
    };
@endphp
{{-- @dd($landSlug) --}}
<section class="flex flex-col-reverse gap-4 lg:pt-6 lg:flex-col lg:col-span-4">
    <h1 class="hidden lg:block text-2xl lg:text-[32px] font-medium text-normal mb-8 lg:mb-11 line-clamp-1"> {{ $productName }} </h1>
    {{-- boxes --}}
    <div class="grid grid-cols-1 gap-2 text-sm lg:mb-16">
        @if ($product->usage)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> نوع کاربری </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->usage }} </p>
            </div>
        @endif
        @if ($product->cabin)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> نوع کابین </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3">  {{ $product->cabin == 0 ? 'بدون خواب' : 'خواب دار' }} </p>
            </div>
        @endif
        @if ($product->tonnage)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> تناژ </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->tonnage }} </p>
            </div>
        @endif
        @if ($product->axle)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> تعداد محور چرخ‌ها </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->axle == 1 ? 'تک محوره' : ($product->axle == 2 ? 'جفت محوره' : 'سه محوره') }} </p>
            </div>
        @endif
        @if ($product->year)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> سال </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->year }} </p>
            </div>
        @endif
        @if ($product->model)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> مدل </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->model }} </p>
            </div>
        @endif
    </div>

    {{-- guide btns --}}
    <PdpCounseling catalogLink="{{ $product->catalog == null ? '#' : $product->catalog }}" categories="{!! $categories !!}" landSlug="{{ $landSlug }}" landId="{{ $landId }}" />
</section>