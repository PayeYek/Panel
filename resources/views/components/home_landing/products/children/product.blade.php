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
    'borderType' => '1',
    'categoryId' => '',
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

    $radiusSizeBefore = match($radius) {
        '0' => 'before:rounded-none',
        '2' => 'before:rounded-sm',
        '4' => 'before:rounded',
        '6' => 'before:rounded-md',
        '8' => 'before:rounded-lg',
        '12' => 'before:rounded-xl',
        '16' => 'before:rounded-2xl',
        default => 'before:rounded-md'
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

    $fillBtnTheme = $borderStyle = '';
    switch ($colorPalette) {
        case '1':
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8', '11' => 'fill_btn_theme_warning_filled',
                default => 'fill_btn_theme_warning_empty'
            };
            break;
        case '2':
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8', '11' => 'fill_btn_theme_primary_filled',
                default => 'fill_btn_theme_primary_empty'
            };
            break;
        case '3':
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8', '11' => 'fill_btn_theme_rose_filled',
                default => 'fill_btn_theme_rose_empty'
            };
            break;
        case '4':
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8', '11' => 'fill_btn_theme_zinc_filled',
                default => 'fill_btn_theme_zinc_empty'
            };
            break;
        case '5':
            $fillBtnTheme = match($type) {
                '3', '6', '7', '8', '11' => 'fill_btn_theme_cobalt_filled',
                default => 'fill_btn_theme_cobalt_empty'
            };
            break;

    }

    switch ($borderType) {
        case '1':
            $borderStyle = match($type."") {
                '1', '2', '3', '4', '5', '6'  => 'drop-shadow-base',
                '7', '9', '10' => '',
                '8' => 'sm:drop-shadow-base',
                default => 'drop-shadow-base'
            };
            break;
        case '2':
            $borderStyle = match($type."") {
                '1', '2', '3', '4', '5', '6'  => 'border border-dark-100',
                '7', '9', '10' => '',
                '8' => 'sm:border sm:border-dark-100',
                default => 'border border-dark-100'
            };
            break;
    }
@endphp

@switch($type)
    @case(1)
        <div data-category="{{ $categoryId }}"
            class="{{ $radiusSize }} {{ $borderStyle }} pt-2 px-8 w-full pb-5 items-center flex flex-col {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} product_card">
            <div class="mb-2 h-36">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
            <div class="flex flex-col gap-4">
                <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="{{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="{{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="{{ $radiusSize }} {{ $radiusSizeBefore }} text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </div>
    @break

    @case(2)
        <div data-category="{{ $categoryId }}"
            class="{{ $borderStyle }} {{ $radiusSize }} px-8 w-full pt-1 pb-8 items-center {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} flex flex-col product_card">
            <div class="h-32 mb-0.5">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
            <div class="grid w-56 grid-cols-2 lg:w-full xl:w-56 gap-2">
                <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full col-span-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </div>
    @break

    @case(3)
        <div data-category="{{ $categoryId }}"
            class="{{ $borderStyle }} {{ $radiusSize }} px-8 w-full pt-1 pb-8 items-center {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} flex flex-col product_card">
            <div class="h-32 mb-0.5">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
            <div class="grid w-56 grid-cols-2 lg:w-full xl:w-56 gap-2">
                <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full col-span-full {{ $radiusSize }} {{ $radiusSizeBefore }} text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </div>
    @break

    @case(4)
        <div data-category="{{ $categoryId }}"
            class="{{ $borderStyle }} {{ $radiusSize }} pl-6 pr-8 w-full pt-5 pb-8 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} flex flex-col product_card">
            <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
            <div class="flex items-center justify-between gap-4">
                <div class="flex-none h-32 lg:h-28 xl:h-32">
                    <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
                </div>
                <div class="flex flex-col w-40 gap-2 shrink">
                    <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                    <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                    <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                </div>
            </div>
        </div>
    @break

    @case(5)
        <div data-category="{{ $categoryId }}"
            class="{{ $borderStyle }} {{ $radiusSize }} px-6 gap-2 w-full pt-6 pb-10 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} flex items-center product_card">
            <div class="flex-none h-28 sm:h-32">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="flex flex-col flex-1 gap-4">
                <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
                <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                    <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                    <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                    <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full col-span-2 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                </div>
            </div>
        </div>
    @break

    @case(6)
        <div data-category="{{ $categoryId }}"
            class="{{ $borderStyle }} {{ $radiusSize }} px-6 gap-2 w-full pt-6 pb-10 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} flex items-center product_card">
            <div class="flex-none h-28 sm:h-32">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="flex flex-col flex-1 gap-4">
                <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
                <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                    <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                    <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                    <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full col-span-full {{ $radiusSize }} {{ $radiusSizeBefore }} text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
                </div>
            </div>
        </div>
    @break

    @case(7)
        <div data-category="{{ $categoryId }}"
            class="flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 relative product_card">
            <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
                <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                    {{ $description }}
                </p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </div>
    @break

    @case(8)
        <div data-category="{{ $categoryId }}"
            class="flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 sm:pr-10 pb-6 pt-4 sm:py-6 {{ $borderStyle }} {{ $radiusSizeSm }} {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 sm:after:hidden relative before:bg-normal before:absolute before:content-[''] before:top-0 before:right-0 before:w-4 before:hidden sm:before:block before:h-full overflow-hidden product_card">
            <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 sm:gap-4 font-bold lg:mb-1 text-lg text-gray-900"> {{ $name }} </h3>
                <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                    {{ $description }}
                </p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </div>
    @break

    @case(9)
        <div data-category="{{ $categoryId }}"
            class="px-8 lg:px-5 xl:px-8 py-5 sm:pb-12 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} w-full items-center flex flex-col sm:border-l sm:border-l-dark-100 sm:[&:nth-child(2n+2)]:border-l-0 lg:[&:nth-child(2n+2)]:border-l lg:[&:nth-child(4n+4)]:border-l-0 border-t border-t-dark-100 first:border-t-0 sm:first:rounded-none sm:last:rounded-none sm:[&:nth-of-type(-n+2)]:border-t-0 lg:[&:nth-of-type(-n+2)]:border-t lg:[&:nth-of-type(-n+4)]:border-t-0 product_card">
            <div class="h-32 mb-2">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
            <div class="flex flex-col gap-4">
                <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </div>
    @break

    @case(10)
        <div data-category="{{ $categoryId }}"
            class="border-b last:border-b-0 border-dark-100 pl-6 pr-8 w-full pt-5 pb-8 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} sm:border-l sm:[&:nth-child(2n)]:border-l-0 lg:[&:nth-child(2n)]:border-l lg:[&:nth-child(3n)]:border-l-0 flex flex-col product_card">
            <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
            <div class="flex items-center justify-between gap-4">
                <div class="flex-none h-32 lg:h-28 xl:h-32">
                    <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
                </div>
                <div class="flex flex-col w-40 gap-2 shrink">
                    <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                    <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                    <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-full {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                </div>
            </div>
        </div>
    @break

    @case(11)
        <div data-category="{{ $categoryId }}"
            class="flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} after:absolute after:content-[''] after:top-0 after:left-0 after:w-full after:h-px after:border-t first:after:hidden after:border-dark-100 relative product_card">
            <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ $name }} </h3>
                <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                    {{ $description }}
                </p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <x-home_landing.products.children.linkBtn text="مشخصات" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="کاتالوگ" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal" />
                <x-home_landing.products.children.linkBtn text="خرید اقساطی" href="{{ route('landing.product.show',['page'=> $landSlug, 'product'=> $productSlug]) }}" class="w-40 {{ $radiusSize }} {{ $radiusSizeBefore }} text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </div>
    @break

    @default
@endswitch
