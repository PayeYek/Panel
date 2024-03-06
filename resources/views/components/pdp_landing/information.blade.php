@props([
    'colorPalette' => '1',
    'productName' => '',
    'radius' => '8',
    'product' => '',
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

    $textStyle = match($colorPalette) {
        '1' => 'text-red-700',
        '2' => 'text-blue-700',
        '3' => 'text-rose-700',
        '4' => 'text-zinc-700',
        '5' => 'text-cobalt-700',
        default => 'text-red-700'
    };

    $fillBtnTheme = $vacantBtnTheme = '';
    switch ($colorPalette) {
        case '1':
            $vacantBtnTheme = 'vacant_btn_theme_warning';
            $fillBtnTheme = 'fill_btn_theme_warning_filled';
            break;
        case '2':
            $vacantBtnTheme = 'vacant_btn_theme_primary';
            $fillBtnTheme = 'fill_btn_theme_primary_filled';
            break;
        case '3':
            $vacantBtnTheme = 'vacant_btn_theme_rose';
            $fillBtnTheme = 'fill_btn_theme_rose_filled';
            break;
        case '4':
            $vacantBtnTheme = 'vacant_btn_theme_zinc';
            $fillBtnTheme = 'fill_btn_theme_zinc_filled';
            break;
        case '5':
            $vacantBtnTheme = 'vacant_btn_theme_cobalt';
            $fillBtnTheme = 'fill_btn_theme_cobalt_filled';
            break;
    };
@endphp

<section class="lg:pt-24">
    <h1 class="hidden md:block text-2xl lg:text-[32px] font-medium {{ $textStyle }} mb-8 lg:mb-11 line-clamp-1"> {{ $productName }} </h1>
    {{-- boxes --}}
    <div class="grid grid-cols-3 gap-3 text-sm 2xl:text-[15px] font-normal mb-4 md:max-w-[524px]">
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
            <p class="line-clamp-1 {{ $textStyle }}"> نوع کاربری </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->usage }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
            <p class="{{ $textStyle }} line-clamp-1"> نوع کابین </p>
            <p class="text-gray-900 line-clamp-1 font-semibold">  {{ $product->cabin == 0 ? 'بدون خواب' : 'خواب دار' }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
            <p class="{{ $textStyle }} line-clamp-1"> تناژ </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->tonnage }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
            <p class="{{ $textStyle }} line-clamp-1"> تعداد محور چرخ‌ها </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->axle == 1 ? 'تک محوره' : ($product->axle == 2 ? 'جفت محوره' : 'سه محوره') }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
            <p class="{{ $textStyle }} line-clamp-1"> سال </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->year }} </p>
        </div>
        <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
            <p class="{{ $textStyle }} line-clamp-1"> مدل </p>
            <p class="text-gray-900 line-clamp-1 font-semibold"> {{ $product->model }} </p>
        </div>
    </div>

    {{-- guide btns --}}
    <div class="flex_center flex-col gap-2 md:max-w-[524px] md:flex-row lg:gap-4 ">
        <LandBtn to="/" classNames="h-11 w-[254px] {{ $vacantBtnTheme }} text-base font-bold flex_center {{ $radiusSize }}" text="دانلود کاتالوگ" />
        <LandBtn to="/" classNames="h-11 w-[254px] {{ $fillBtnTheme }} text-base font-bold flex_center {{ $radiusSize }}" text="مشاوره و خرید" />
    </div>
</section>