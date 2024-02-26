@props([
    'type' => '1',
    'image' => '/',
    'href' => '#',
    'radius' => '-xl',
    'titleColor' => 'title_color_type_1',
    'defaultButtonColor' => 'button_color_type_warning_default',
    'actionButtonColor' => 'button_color_type_warning',
    'evenOdd' => 'false'
])
@switch($type)
    @case(1)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{ $radius }} w-60 pt-2 px-8 sm:w-full mx-auto sm:mx-0 pb-5 items-center flex flex-col {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }}">
            <div class="mb-2 h-36">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 {{ $titleColor }}"> کامیون جک 8.5 تن </h3>
            <div class="flex flex-col gap-4">
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    مشخصات </a>
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    کاتالوگ </a>
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $actionButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    خرید اقساطی </a>
            </div>
        </div>
    @break

    @case(2)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{ $radius }} px-8 w-72 sm:w-full sm:mx-0 mx-auto pt-1 pb-8 items-center {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} flex flex-col">
            <div class="h-32 mb-0.5">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> کامیون جک 8.5 تن </h3>
            <div class="grid w-56 grid-cols-2 gap-2">
                <a href="{{ $href }}"
                    class="text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-full h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    مشخصات </a>
                <a href="{{ $href }}"
                    class="text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-full h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    کاتالوگ </a>
                <a href="{{ $href }}"
                    class="text-base font-bold relative {{ $actionButtonColor }} rounded{{ $radius }} w-full col-span-2 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    خرید اقساطی </a>
            </div>
        </div>
    @break

    @case(3)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{ $radius }} pl-6 pr-8 max-w-[400px] sm:max-w-full w-full sm:mx-0 mx-auto pt-5 pb-8 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} flex flex-col">
            <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> کامیون جک 8.5 تن </h3>
            <div class="flex items-center justify-between gap-4">
                <div class="flex-none h-32 lg:h-28 xl:h-32">
                    <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
                </div>
                <div class="flex flex-col w-40 gap-2 shrink">
                    <a href="{{ $href }}"
                        class="text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-full h-11 flex_center before:rounded{{ $radius }} product_button_style">
                        مشخصات </a>
                    <a href="{{ $href }}"
                        class="text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-full h-11 flex_center before:rounded{{ $radius }} product_button_style">
                        کاتالوگ </a>
                    <a href="{{ $href }}"
                        class="text-base font-bold relative {{ $actionButtonColor }} rounded{{ $radius }} w-full h-11 flex_center before:rounded{{ $radius }} product_button_style">
                        خرید اقساطی </a>
                </div>
            </div>
        </div>
    @break

    @case(4)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{ $radius }} px-6 max-w-[500px] gap-2 sm:max-w-full w-full sm:mx-0 mx-auto pt-6 pb-10 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} flex items-center">
            <div class="flex-none h-28 sm:h-32">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="flex flex-col flex-1 gap-4">
                <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> کامیون جک 8.5 تن </h3>
                <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                    <a href="{{ $href }}"
                        class="text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-full h-11 flex_center before:rounded{{ $radius }} product_button_style">
                        مشخصات </a>
                    <a href="{{ $href }}"
                        class="text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-full h-11 flex_center before:rounded{{ $radius }} product_button_style">
                        کاتالوگ </a>
                    <a href="{{ $href }}"
                        class="text-base font-bold col-span-2 relative {{ $actionButtonColor }} rounded{{ $radius }} w-full h-11 flex_center before:rounded{{ $radius }} product_button_style">
                        خرید اقساطی </a>
                </div>
            </div>
        </div>
    @break

    @case(5)
        <div
            class="flex flex-col w-w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-300 dark:after:border-dark-300 relative">
            <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 font-bold lg:mb-1 text-lg sm:line-clamp-1 {{ $titleColor }}"> کامیون جک 8.5 تن </h3>
                <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                    کامیونت جک 8.5 تن یکی از موفق‌ترین محصولات شرکت جک است که با ظرفیت حمل بار 8500 کیلوگرم از نظر کیفی در سطح مطلوبی قرار دارد.شرکت جک (JAC) در کشور چین واقع شده
                </p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    مشخصات </a>
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    کاتالوگ </a>
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $actionButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    خرید اقساطی </a>
            </div>
        </div>
    @break

    @case(6)
        <div
            class="flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 sm:pr-10 pb-6 pt-4 sm:py-6 sm:rounded{{ $radius }} sm:drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-300 dark:after:border-dark-300 sm:after:hidden relative before:absolute before:content-[''] before:bg-red-700 dark:before:bg-red-600 before:top-0 before:right-0 before:w-4 before:hidden sm:before:block before:h-full before:rounded-r{{ $radius }}">
            <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 sm:gap-4 font-bold lg:mb-1 text-lg {{ $titleColor }}"> کامیون جک 8.5 تن </h3>
                <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                    کامیونت جک 8.5 تن یکی از موفق‌ترین محصولات شرکت جک است که با ظرفیت حمل بار 8500 کیلوگرم از نظر کیفی در سطح مطلوبی قرار دارد.شرکت جک (JAC) در کشور چین واقع شده
                </p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    مشخصات </a>
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    کاتالوگ </a>
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $actionButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    خرید اقساطی </a>
            </div>
        </div>
    @break

    @case(7)
        <div
            class="px-8 lg:px-5 xl:px-8 py-5 sm:pb-12 {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white dark:bg-dark-700' }} w-60 mx-auto sm:items-center first:rounded-t{{ $radius }} last:rounded-b{{ $radius }} flex flex-col sm:border-l sm:border-l-dark-300 sm:[&:nth-child(2n+2)]:border-l-0 lg:[&:nth-child(2n+2)]:border-l lg:[&:nth-child(4n+4)]:border-l-0 border-t border-t-dark-300 first:border-t-0 sm:w-full sm:first:rounded-none sm:last:rounded-none sm:[&:nth-of-type(-n+2)]:border-t-0 lg:[&:nth-of-type(-n+2)]:border-t lg:[&:nth-of-type(-n+4)]:border-t-0">
            <div class="h-32 mb-2">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 {{ $titleColor }}"> کامیون جک 8.5 تن </h3>
            <div class="flex flex-col gap-4">
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    مشخصات </a>
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $defaultButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    کاتالوگ </a>
                <a href="{{ $href }}"
                    class="text-sm lg:text-base font-bold relative {{ $actionButtonColor }} rounded{{ $radius }} w-40 h-11 flex_center before:rounded{{ $radius }} product_button_style">
                    خرید اقساطی </a>
            </div>
        </div>
    @break

    @default
@endswitch
