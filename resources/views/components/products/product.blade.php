@props([
    'type' => '1',
    'image' => '/',
    'href' => '#',
    'radius' => '-xl',
    'titleColor' => 'title_color_type_1',
    'defaultButtonColor' => 'button_color_type_warning_default',
    'actionButtonColor' => 'button_color_type_warning',
])
@switch($type)
    {{-- @case(1)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{$radius}} px-8 lg:px-5 xl:px-8 py-5 bg-white dark:bg-gray-700 flex flex-col">
            <div class="h-32 mx-auto mb-2">
                <img src="{{ $image }}" alt="mammut" class="h-full" />
            </div>
            <h3 class="mb-4 text-lg font-bold text-center text-gray-900 lg:text-right dark:text-white line-clamp-1"> کامیون جک <span class="inline-block text-red-700 dark:text-red-600">&nbsp; X5000-D </span></h3>
            <ul class="flex flex-col gap-4 pr-4 text-xs font-light text-gray-900 list-none dark:text-white">
                <li class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    <p> 16 اینچ </p>
                </li>
                <li class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    <p> 26 </p>
                </li>
                <li class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    <p> جفت </p>
                </li>
            </ul>
            <a href="{{$href}}"
                class="w-36 mx-auto mt-8 text-lg font-bold text-red-700  border border-red-700 rounded{{$radius}} dark:hover:bg-red-600 dark:hover:text-white hover:bg-red-700 hover:text-white dark:border-red-600 dark:text-red-600 h-11 flex_center">
                مشخصات </a>
        </div>
    @break --}}
    @case(2)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{ $radius }} w-60 pt-2 px-8 sm:w-full mx-auto sm:mx-0 pb-5 items-center bg-white dark:bg-dark-700 flex flex-col">
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

    @case(3)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{ $radius }} px-8 w-72 sm:w-full sm:mx-0 mx-auto pt-1 pb-8 items-center bg-white dark:bg-gray-700 flex flex-col">
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

    @case(4)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{ $radius }} pl-6 pr-8 max-w-[400px] sm:max-w-full w-full sm:mx-0 mx-auto pt-5 pb-8 bg-white dark:bg-gray-700 flex flex-col">
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

    @case(5)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded{{ $radius }} px-6 max-w-[500px] gap-2 sm:max-w-full w-full sm:mx-0 mx-auto pt-6 pb-10 bg-white dark:bg-gray-700 flex items-center">
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

    @case(6)
        <div
            class="flex flex-col w-72 sm:mx-0 sm:w-full mx-auto sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 bg-white dark:bg-gray-700 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-300 dark:after:border-dark-300 relative">
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

    @case(7)
        <div
            class="md:drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] md:rounded{{ $radius }} flex flex-col md:flex-row md:items-center lg:pl-14 md:gap-4 lg:gap-10 xl:gap-16 w-full px-6 md:px-10 pb-8 pt-6 bg-white sm:px-9 dark:bg-gray-700 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden md:after:hidden after:border-[#37474F]/40 dark:after:border-gray-600 relative before:absolute before:content-[''] before:bg-red-700 dark:before:bg-red-600 before:top-0 before:right-0 before:w-4 before:hidden md:before:block before:h-full before:rounded-r{{ $radius }}">
            <div class="h-32 mx-auto mb-3 md:h-40 md:mx-0 md:mb-0 md:w-40 lg:h-[11.5rem] lg:w-[11.5rem] md:flex-none">
                <img src="{{ $image }}" alt="mammut" class="object-contain h-full" />
            </div>
            <div class="mb-12 md:mb-0 md:flex-1">
                <h3 class="text-base font-bold text-gray-900 mb-7 dark:text-white md:line-clamp-1"> کامیون جفت محور 26 تن
                    Shacmoto <span class="inline-block text-sm text-red-700 dark:text-red-600">&nbsp; X5000-D </span></h3>
                <ul class="grid grid-cols-2 col-span-2 list-none md:grid-cols-3 gap-x-2 gap-y-10 md:gap-y-7">
                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9.664 1.319a.75.75 0 0 1 .672 0 41.059 41.059 0 0 1 8.198 5.424.75.75 0 0 1-.254 1.285 31.372 31.372 0 0 0-7.86 3.83.75.75 0 0 1-.84 0 31.508 31.508 0 0 0-2.08-1.287V9.394c0-.244.116-.463.302-.592a35.504 35.504 0 0 1 3.305-2.033.75.75 0 0 0-.714-1.319 37 37 0 0 0-3.446 2.12A2.216 2.216 0 0 0 6 9.393v.38a31.293 31.293 0 0 0-4.28-1.746.75.75 0 0 1-.254-1.285 41.059 41.059 0 0 1 8.198-5.424ZM6 11.459a29.848 29.848 0 0 0-2.455-1.158 41.029 41.029 0 0 0-.39 3.114.75.75 0 0 0 .419.74c.528.256 1.046.53 1.554.82-.21.324-.455.63-.739.914a.75.75 0 1 0 1.06 1.06c.37-.369.69-.77.96-1.193a26.61 26.61 0 0 1 3.095 2.348.75.75 0 0 0 .992 0 26.547 26.547 0 0 1 5.93-3.95.75.75 0 0 0 .42-.739 41.053 41.053 0 0 0-.39-3.114 29.925 29.925 0 0 0-5.199 2.801 2.25 2.25 0 0 1-2.514 0c-.41-.275-.826-.541-1.25-.797a6.985 6.985 0 0 1-1.084 3.45 26.503 26.503 0 0 0-1.281-.78A5.487 5.487 0 0 0 6 12v-.54Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p> اتومات </p>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9.664 1.319a.75.75 0 0 1 .672 0 41.059 41.059 0 0 1 8.198 5.424.75.75 0 0 1-.254 1.285 31.372 31.372 0 0 0-7.86 3.83.75.75 0 0 1-.84 0 31.508 31.508 0 0 0-2.08-1.287V9.394c0-.244.116-.463.302-.592a35.504 35.504 0 0 1 3.305-2.033.75.75 0 0 0-.714-1.319 37 37 0 0 0-3.446 2.12A2.216 2.216 0 0 0 6 9.393v.38a31.293 31.293 0 0 0-4.28-1.746.75.75 0 0 1-.254-1.285 41.059 41.059 0 0 1 8.198-5.424ZM6 11.459a29.848 29.848 0 0 0-2.455-1.158 41.029 41.029 0 0 0-.39 3.114.75.75 0 0 0 .419.74c.528.256 1.046.53 1.554.82-.21.324-.455.63-.739.914a.75.75 0 1 0 1.06 1.06c.37-.369.69-.77.96-1.193a26.61 26.61 0 0 1 3.095 2.348.75.75 0 0 0 .992 0 26.547 26.547 0 0 1 5.93-3.95.75.75 0 0 0 .42-.739 41.053 41.053 0 0 0-.39-3.114 29.925 29.925 0 0 0-5.199 2.801 2.25 2.25 0 0 1-2.514 0c-.41-.275-.826-.541-1.25-.797a6.985 6.985 0 0 1-1.084 3.45 26.503 26.503 0 0 0-1.281-.78A5.487 5.487 0 0 0 6 12v-.54Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p> اتومات </p>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9.664 1.319a.75.75 0 0 1 .672 0 41.059 41.059 0 0 1 8.198 5.424.75.75 0 0 1-.254 1.285 31.372 31.372 0 0 0-7.86 3.83.75.75 0 0 1-.84 0 31.508 31.508 0 0 0-2.08-1.287V9.394c0-.244.116-.463.302-.592a35.504 35.504 0 0 1 3.305-2.033.75.75 0 0 0-.714-1.319 37 37 0 0 0-3.446 2.12A2.216 2.216 0 0 0 6 9.393v.38a31.293 31.293 0 0 0-4.28-1.746.75.75 0 0 1-.254-1.285 41.059 41.059 0 0 1 8.198-5.424ZM6 11.459a29.848 29.848 0 0 0-2.455-1.158 41.029 41.029 0 0 0-.39 3.114.75.75 0 0 0 .419.74c.528.256 1.046.53 1.554.82-.21.324-.455.63-.739.914a.75.75 0 1 0 1.06 1.06c.37-.369.69-.77.96-1.193a26.61 26.61 0 0 1 3.095 2.348.75.75 0 0 0 .992 0 26.547 26.547 0 0 1 5.93-3.95.75.75 0 0 0 .42-.739 41.053 41.053 0 0 0-.39-3.114 29.925 29.925 0 0 0-5.199 2.801 2.25 2.25 0 0 1-2.514 0c-.41-.275-.826-.541-1.25-.797a6.985 6.985 0 0 1-1.084 3.45 26.503 26.503 0 0 0-1.281-.78A5.487 5.487 0 0 0 6 12v-.54Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p> اتومات </p>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9.664 1.319a.75.75 0 0 1 .672 0 41.059 41.059 0 0 1 8.198 5.424.75.75 0 0 1-.254 1.285 31.372 31.372 0 0 0-7.86 3.83.75.75 0 0 1-.84 0 31.508 31.508 0 0 0-2.08-1.287V9.394c0-.244.116-.463.302-.592a35.504 35.504 0 0 1 3.305-2.033.75.75 0 0 0-.714-1.319 37 37 0 0 0-3.446 2.12A2.216 2.216 0 0 0 6 9.393v.38a31.293 31.293 0 0 0-4.28-1.746.75.75 0 0 1-.254-1.285 41.059 41.059 0 0 1 8.198-5.424ZM6 11.459a29.848 29.848 0 0 0-2.455-1.158 41.029 41.029 0 0 0-.39 3.114.75.75 0 0 0 .419.74c.528.256 1.046.53 1.554.82-.21.324-.455.63-.739.914a.75.75 0 1 0 1.06 1.06c.37-.369.69-.77.96-1.193a26.61 26.61 0 0 1 3.095 2.348.75.75 0 0 0 .992 0 26.547 26.547 0 0 1 5.93-3.95.75.75 0 0 0 .42-.739 41.053 41.053 0 0 0-.39-3.114 29.925 29.925 0 0 0-5.199 2.801 2.25 2.25 0 0 1-2.514 0c-.41-.275-.826-.541-1.25-.797a6.985 6.985 0 0 1-1.084 3.45 26.503 26.503 0 0 0-1.281-.78A5.487 5.487 0 0 0 6 12v-.54Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p> اتومات </p>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9.664 1.319a.75.75 0 0 1 .672 0 41.059 41.059 0 0 1 8.198 5.424.75.75 0 0 1-.254 1.285 31.372 31.372 0 0 0-7.86 3.83.75.75 0 0 1-.84 0 31.508 31.508 0 0 0-2.08-1.287V9.394c0-.244.116-.463.302-.592a35.504 35.504 0 0 1 3.305-2.033.75.75 0 0 0-.714-1.319 37 37 0 0 0-3.446 2.12A2.216 2.216 0 0 0 6 9.393v.38a31.293 31.293 0 0 0-4.28-1.746.75.75 0 0 1-.254-1.285 41.059 41.059 0 0 1 8.198-5.424ZM6 11.459a29.848 29.848 0 0 0-2.455-1.158 41.029 41.029 0 0 0-.39 3.114.75.75 0 0 0 .419.74c.528.256 1.046.53 1.554.82-.21.324-.455.63-.739.914a.75.75 0 1 0 1.06 1.06c.37-.369.69-.77.96-1.193a26.61 26.61 0 0 1 3.095 2.348.75.75 0 0 0 .992 0 26.547 26.547 0 0 1 5.93-3.95.75.75 0 0 0 .42-.739 41.053 41.053 0 0 0-.39-3.114 29.925 29.925 0 0 0-5.199 2.801 2.25 2.25 0 0 1-2.514 0c-.41-.275-.826-.541-1.25-.797a6.985 6.985 0 0 1-1.084 3.45 26.503 26.503 0 0 0-1.281-.78A5.487 5.487 0 0 0 6 12v-.54Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p> اتومات </p>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9.664 1.319a.75.75 0 0 1 .672 0 41.059 41.059 0 0 1 8.198 5.424.75.75 0 0 1-.254 1.285 31.372 31.372 0 0 0-7.86 3.83.75.75 0 0 1-.84 0 31.508 31.508 0 0 0-2.08-1.287V9.394c0-.244.116-.463.302-.592a35.504 35.504 0 0 1 3.305-2.033.75.75 0 0 0-.714-1.319 37 37 0 0 0-3.446 2.12A2.216 2.216 0 0 0 6 9.393v.38a31.293 31.293 0 0 0-4.28-1.746.75.75 0 0 1-.254-1.285 41.059 41.059 0 0 1 8.198-5.424ZM6 11.459a29.848 29.848 0 0 0-2.455-1.158 41.029 41.029 0 0 0-.39 3.114.75.75 0 0 0 .419.74c.528.256 1.046.53 1.554.82-.21.324-.455.63-.739.914a.75.75 0 1 0 1.06 1.06c.37-.369.69-.77.96-1.193a26.61 26.61 0 0 1 3.095 2.348.75.75 0 0 0 .992 0 26.547 26.547 0 0 1 5.93-3.95.75.75 0 0 0 .42-.739 41.053 41.053 0 0 0-.39-3.114 29.925 29.925 0 0 0-5.199 2.801 2.25 2.25 0 0 1-2.514 0c-.41-.275-.826-.541-1.25-.797a6.985 6.985 0 0 1-1.084 3.45 26.503 26.503 0 0 0-1.281-.78A5.487 5.487 0 0 0 6 12v-.54Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p> اتومات </p>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col items-center gap-6 md:flex-none">
                <a href="{{ $href }}"
                    class="text-lg font-bold text-red-700  border border-red-700 w-36 rounded{{ $radius }} dark:hover:bg-red-600 dark:hover:text-white hover:bg-red-700 hover:text-white dark:border-red-600 dark:text-red-600 h-11 flex_center">
                    مشخصات </a>
                <a href="{{ $href }}"
                    class="text-lg font-bold text-white  bg-red-700 w-36 rounded{{ $radius }} dark:bg-red-600 h-11 flex_center">
                    شرایط فروش </a>
            </div>
        </div>
    @break

    @case(8)
        <div
            class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] lg:drop-shadow-none lg:rounded-none rounded{{ $radius }} px-8 lg:px-5 xl:px-8 py-5 bg-white dark:bg-gray-700 flex flex-col lg:border-l lg:border-l-[#37474F]/40 dark:lg:border-l-gray-600 first:border-r-0 lg:[&:nth-child(4n+4)]:border-l-0 lg:border-t lg:border-t-[#37474F]/40 lg:dark:border-t-gray-600 lg:[&:nth-of-type(-n+4)]:border-t-0">
            <div class="h-32 mx-auto mb-2">
                <img src="{{ $image }}" alt="mammut" class="h-full" />
            </div>
            <h3 class="mb-4 text-lg font-bold text-center text-gray-900 dark:text-white line-clamp-1"> کامیون جک <span
                    class="text-red-700 dark:text-red-600">&nbsp; X5000-D </span></h3>
            <ul class="flex flex-col gap-4 pr-4 text-xs font-light text-gray-900 list-none dark:text-white">
                <li class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    <p> 16 اینچ </p>
                </li>
                <li class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    <p> 26 </p>
                </li>
                <li class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    <p> جفت </p>
                </li>
            </ul>
            <a href="{{ $href }}"
                class="w-full mt-8 text-lg font-bold text-red-700  border border-red-700 md:mx-auto md:w-36 rounded{{ $radius }} dark:hover:bg-red-600 dark:hover:text-white hover:bg-red-700 hover:text-white dark:border-red-600 dark:text-red-600 h-11 flex_center">
                مشخصات </a>
        </div>
    @break

    @default
@endswitch
