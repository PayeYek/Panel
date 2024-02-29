@props([
    'type' => '1',
    'image' => '/',
    'name' => '',
    'productSlug' => '',
    'landSlug' => '',
    'radius' => '8',
    'colorPalette' => '1',
    'evenOdd' => 'false',
    'description' => '',
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

    $radiusSizeSm = match($radius) {
        '0' => 'sm:rounded-none',
        '2' => 'sm:rounded-sm',
        '4' => 'sm:rounded',
        '6' => 'sm:rounded-md',
        '8' => 'sm:rounded-lg',
        '12' => 'sm:rounded-xl',
        '16' => 'sm:rounded-2xl',
        default => 'sm:rounded-md'
    };

    $fillBtnTheme = $vacantBtnTheme = '';
    switch ($colorPalette) {
        case '1':
            $vacantBtnTheme = 'vacant_btn_theme_warning';
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8' => 'fill_btn_theme_warning_filled',
                default => 'fill_btn_theme_warning_empty'
            };
            break;
        case '2':
            $vacantBtnTheme = 'vacant_btn_theme_primary';
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8' => 'fill_btn_theme_primary_filled',
                default => 'fill_btn_theme_primary_empty'
            };
            break;
        case '3':
            $vacantBtnTheme = 'vacant_btn_theme_rose';
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8' => 'fill_btn_theme_rose_filled',
                default => 'fill_btn_theme_rose_empty'
            };
            break;
        case '4':
            $vacantBtnTheme = 'vacant_btn_theme_zinc';
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8' => 'fill_btn_theme_zinc_filled',
                default => 'fill_btn_theme_zinc_empty'
            };
            break;
        case '5':
            $vacantBtnTheme = 'vacant_btn_theme_cobalt';
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8' => 'fill_btn_theme_cobalt_filled',
                default => 'fill_btn_theme_cobalt_empty'
            };
            break;
        
    }

    $pseudoColor = match($colorPalette) {
        '1' => 'before:bg-red-700',
        '2' => 'before:bg-blue-700',
        '3' => 'before:bg-rose-700',
        '4' => 'before:bg-zinc-700',
        '5' => 'before:bg-cobalt-700',
        default => 'before:bg-red-700'
    };
@endphp

@switch($type)
    @case(1)
        <div
            class="drop-shadow-base {{ $radiusSize }} pt-2 px-8 w-full pb-5 items-center flex flex-col {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }}">
            <div class="mb-2 h-36">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
            <div class="flex flex-col gap-4">
                <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-40 h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
                <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
            </div>
        </div>
    @break

    @case(2)
        <div
            class="drop-shadow-base {{ $radiusSize }} px-8 w-full pt-1 pb-8 items-center {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} flex flex-col">
            <div class="h-32 mb-0.5">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> {{ $name }} </h3>
            <div class="grid w-56 grid-cols-2 gap-2">
                <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-full h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-full h-11 flex_center before:{{ $radiusSize }}" />
                <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-full col-span-2 h-11 flex_center before:{{ $radiusSize }}" />
            </div>
        </div>
    @break

    @case(3)
        <div
            class="drop-shadow-base {{ $radiusSize }} px-8 w-full pt-1 pb-8 items-center {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} flex flex-col">
            <div class="h-32 mb-0.5">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> {{ $name }} </h3>
            <div class="grid w-56 grid-cols-2 gap-2">
                <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-full h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-full h-11 flex_center before:{{ $radiusSize }}" />
                <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-full col-span-2 h-11 flex_center before:{{ $radiusSize }}" />
            </div>
        </div>
    @break

    @case(4)
        <div
            class="drop-shadow-base {{ $radiusSize }} pl-6 pr-8 w-full pt-5 pb-8 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} flex flex-col">
            <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> {{ $name }} </h3>
            <div class="flex items-center justify-between gap-4">
                <div class="flex-none h-32 lg:h-28 xl:h-32">
                    <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
                </div>
                <div class="flex flex-col w-40 gap-2 shrink">
                    <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-40 h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                    <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
                    <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
                </div>
            </div>
        </div>
    @break

    @case(5)
        <div
            class="drop-shadow-base {{ $radiusSize }} px-6 gap-2 w-full pt-6 pb-10 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} flex items-center">
            <div class="flex-none h-28 sm:h-32">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="flex flex-col flex-1 gap-4">
                <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> {{ $name }} </h3>
                <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                    <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-full h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                    <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-full h-11 flex_center before:{{ $radiusSize }}" />
                    <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-full col-span-2 h-11 flex_center before:{{ $radiusSize }}" />
                </div>
            </div>
        </div>
    @break

    @case(6)
        <div
            class="drop-shadow-base {{ $radiusSize }} px-6 gap-2 w-full pt-6 pb-10 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} flex items-center">
            <div class="flex-none h-28 sm:h-32">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="flex flex-col flex-1 gap-4">
                <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> {{ $name }} </h3>
                <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                    <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-full h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                    <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-full h-11 flex_center before:{{ $radiusSize }}" />
                    <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-full col-span-2 h-11 flex_center before:{{ $radiusSize }}" />
                </div>
            </div>
        </div>
    @break

    @case(7)
        <div
            class="flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-300 dark:after:border-dark-300 relative">
            <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> {{ $name }} </h3>
                <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                    {{ $description }}
                </p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-40 h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
                <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
            </div>
        </div>
    @break

    @case(8)
        <div
            class="flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 sm:pr-10 pb-6 pt-4 sm:py-6 {{ $radiusSizeSm }} sm:drop-shadow-base {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-300 dark:after:border-dark-300 sm:after:hidden relative {{ $pseudoColor }} before:absolute before:content-[''] before:top-0 before:right-0 before:w-4 before:hidden sm:before:block before:h-full overflow-hidden">
            <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 sm:gap-4 font-bold lg:mb-1 text-lg {{ $titleColor }}"> {{ $name }} </h3>
                <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                    {{ $description }}
                </p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-40 h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
                <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
            </div>
        </div>
    @break

    @case(9)
        <div
            class="px-8 lg:px-5 xl:px-8 py-5 sm:pb-12 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} w-full items-center flex flex-col sm:border-l sm:border-l-dark-300 sm:[&:nth-child(2n+2)]:border-l-0 lg:[&:nth-child(2n+2)]:border-l lg:[&:nth-child(4n+4)]:border-l-0 border-t border-t-dark-300 first:border-t-0 sm:first:rounded-none sm:last:rounded-none sm:[&:nth-of-type(-n+2)]:border-t-0 lg:[&:nth-of-type(-n+2)]:border-t lg:[&:nth-of-type(-n+4)]:border-t-0">
            <div class="h-32 mb-2">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 {{ $titleColor }}"> {{ $name }} </h3>
            <div class="flex flex-col gap-4">
                <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-40 h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
                <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
            </div>
        </div>
    @break

    @case(10)
        <div
            class="border-b last:border-b-0 border-dark-100 pl-6 pr-8 w-full pt-5 pb-8 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} sm:border-l sm:[&:nth-child(2n)]:border-l-0 lg:[&:nth-child(2n)]:border-l lg:[&:nth-child(3n)]:border-l-0 flex flex-col">
            <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> {{ $name }} </h3>
            <div class="flex items-center justify-between gap-4">
                <div class="flex-none h-32 lg:h-28 xl:h-32">
                    <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
                </div>
                <div class="flex flex-col w-40 gap-2 shrink">
                    <LandBtn text="مشخصات" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative w-40 h-11 flex_center {{ $vacantBtnTheme }} {{ $radiusSize }} before:{{ $radiusSize }}" />
                    <LandBtn text="کاتالوگ" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $vacantBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
                    <LandBtn text="خرید اقساطی" to="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" classNames="text-sm lg:text-base font-bold cursor-pointer relative {{ $fillBtnTheme }} {{ $radiusSize }} w-40 h-11 flex_center before:{{ $radiusSize }}" />
                </div>
            </div>
        </div>
    @break

    @default
@endswitch
