@php
    $borderType = match ($land->styles->border_type.'') {
        '0' => '',
        '1' => 'drop-shadow-base',
        '2' => 'border border-dark-100',
        default => '',
    };
@endphp
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="module">
        var swiper2 = new Swiper(".articleSliderType5", {
            slidesPerView: "auto",
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: "auto",
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
            navigation: {
                nextEl: ".articleSliderType5-next",
                prevEl: ".articleSliderType5-prev",
            },
            pagination: {
                el: ".articleSliderType5-pagination",
            },
        });
    </script>
@endpush
{{-- @dd($breadcrumbs) --}}
<x-layout.default.main :land="$land">



    {{-- type 1 --}}
    @if ($land->styles->a_view_type.'' === '1')
        <main class="relative pt-4 default_container">
            {{-- breadcrumbs --}}
            <x-common_landing.breadcrumbs :data="$breadcrumbs" />

            <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                <h1 class="text-xl font-bold leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                <p class="flex-none mt-1 text-sm font-normal"> 12 بهمن 1402 </p>
            </div>

            <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="absolute top-0 left-0 w-full h-full" />
                <div class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">
                </div>
            </div>

            {{-- details --}}
            <section class="mb-8 overflow-hidden lg:mb-16 custom_article_styles custom_table_striped_container">
                {!! $article->body !!}
            </section>

            {{-- contact to expert --}}
            <section
                class="flex flex-col bg-white border border-[#F0F3F7] rounded-custom overflow-hidden mb-8 sm:mx-6 md:mx-10 lg:mb-12">
                {{-- title --}}
                <div
                    class="w-full h-20 text-xl font-black text-white lg:text-2xl bg-stone-700 drop-shadow-base flex_center">
                    <p> ارتباط با کارشناسان فروش </p>
                </div>
                <form action="#" method="#" class="flex flex-col items-center px-5 pt-6 pb-10">
                    <p class="mb-6 text-base font-normal leading-7 text-center text-stone-700"> جهت ارتباط و اطلاع از
                        شرایط فروش شماره خود را وارد کنید. </p>
                    <input name="phone" type="tel"
                        class="bg-white mb-5 max-w-64 h-11 border border-[#CFD1D4] focus:border-[#CFD1D4] focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#acacac] text-base font-normal px-3 text-stone-700 tracking-widest"
                        placeholder="09" />
                    <button type="submit"
                        class="w-full text-base font-bold text-white rounded-custom flex_center max-w-64 h-11 bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                        ثبت درخواست </button>
                </form>
            </section>

            {{-- articles --}}
            <section class="relative flex flex-col pb-10 sm:pb-0">
                {{-- header --}}
                    <h3 class="mb-2 text-base font-bold text-center sm:text-lg text-stone-700"> آخرین اخبار و اطلاعیه ها
                    </h3>
                    <hr class="mx-auto mb-6 w-60 sm:w-96 border-normal lg:mb-0" />
                    {{-- show all --}}
                    <Link href="#"
                        class="hidden float-left px-2 mb-3 mr-auto text-base font-normal cursor-pointer text-normal lg:inline-block">
                    نمایش همه </Link>
                    <div class="w-full swiper articleSliderType5">
                        <div class="mb-4 swiper-wrapper">
                            @foreach ($land->articles as $article)
                                <div :class="'swiper-slide flex flex-col flex-none overflow-hidden rounded-custom {{ $borderType }} ' + ({{ $land->styles->article_striped.'' }} === '1' ? 'evenOdd_cards' : 'bg-white')">
                                    <div class="relative w-full pt-[62%]">
                                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                                            class="absolute top-0 left-0 object-cover w-full h-full" />
                                    </div>
                                    {{-- info --}}
                                    <div class="px-2 pt-3 pb-4">
                                        <div class="gap-4 mb-1 flex_between">
                                            <h3
                                                class="text-base font-bold leading-7 sm:text-lg text-stone-700 line-clamp-1">
                                                {{ $article->title }} </h3>
                                            <h4 class="flex-none text-sm font-bold leading-7 sm:text-base text-normal"> بهمن
                                                1402 </h4>
                                        </div>
                                        <p
                                            class="mb-2 text-sm font-normal leading-6 sm:leading-7 sm:h-20 sm:mb-3 text-justify text-stone-700 line-clamp-3 h-[72px]">
                                            {{ $article->description }}
                                        </p>
                                        <x-home_landing.announcement.children.linkBtn text="بیشتر"
                                            href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}"
                                            class="mx-auto text-white bg-stone-700" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next articleSliderType5-next"></div>
                        <div class="swiper-button-prev articleSliderType5-prev"></div>
                        <div class="swiper-pagination articleSliderType5-pagination"></div>
                    </div>
            </section>
        </main>
    @endif

    {{-- type 2 --}}
    @if ($land->styles->a_view_type.'' === '2')
        <main class="relative pt-4 default_container">
            {{-- breadcrumbs --}}
            {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}
            <section class="flex flex-col gap-8 lg:flex-row lg:items-start">
                {{-- description --}}
                <section class="order-1 w-full lg:flex-1 lg:order-2">
                    <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                        <h1 class="text-xl font-bold leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                        <p class="flex-none mt-1 text-sm font-normal"> 12 بهمن 1402 </p>
                    </div>

                    <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                        <img src="https://paye1.com/storage/media/land/files/d2x7MNw4kS6JWjSomLV9hL2aN9sWkjbm7xgGAxqZ.jpg"
                            alt="{{ $article->title }}" class="absolute top-0 left-0 w-full h-full" />
                        <div
                            class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">
                        </div>
                    </div>

                    {{-- details --}}
                    <section class="mb-8 overflow-hidden lg:mb-16 custom_table_striped_container custom_article_styles">
                        {!! $article->body !!}
                    </section>
                </section>

                {{-- left column --}}
                <section class="flex flex-col order-2 gap-6 lg:w-72 lg:flex-none lg:order-1">
                    {{-- articles --}}
                    <section class="relative pb-10 sm:pb-0 lg:pb-10">
                        {{-- header --}}
                        <div class="flex items-center mb-4 sm:justify-between lg:px-4">
                            <h3 class="text-lg font-bold text-gray-900 md:text-xl lg:text-lg"> آخرین اخبار و اطلاعیه ها
                            </h3>
                            <a href="#"
                                class="absolute bottom-0 flex items-center gap-2 text-base font-normal sm:static lg:absolute right-4 lg:right-auto lg:left-2 text-normal">
                                <span> مشاهده همه </span>
                                <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <ul class="grid grid-cols-1 gap-4 list-none md:grid-cols-3 lg:grid-cols-1">
                            @foreach ($land->articles->take(3) as $article)
                                <li
                                    class="flex flex-col bg-white w-full rounded-custom overflow-hidden {{ $borderType }}">
                                    <div class="relative w-full pt-[62%] mb-2">
                                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                                            class="absolute top-0 left-0 w-full h-full" />
                                    </div>
                                    {{-- info --}}
                                    <div class="flex flex-col px-5 pt-2 pb-4">
                                        <p
                                            class="mb-2 text-lg font-bold text-justify text-gray-900 md:line-clamp-1 lg:line-clamp-none">
                                            {{ $article->title }} </p>
                                        <p
                                            class="mb-3 text-sm font-normal leading-7 text-justify text-gray-900 line-clamp-3 md:h-20 lg:h-auto">
                                            {{ $article->description }}
                                        </p>
                                        <a href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}"
                                            class="flex items-center gap-3 pt-1 pb-2 mr-auto text-sm font-bold text-normal">
                                            <span> ادامه </span>
                                            <svg class="stroke-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                                    stroke="current" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </section>

                    {{-- contact to expert --}}
                    <section
                        class="flex flex-col bg-white {{ $borderType }} rounded-custom overflow-hidden sm:mx-6 md:mx-10 lg:mx-0">
                        {{-- title --}}
                        <div class="w-full h-20 text-xl font-black text-white bg-normal flex_center">
                            <p> ارتباط با کارشناسان فروش </p>
                        </div>
                        <form action="#" method="#" class="flex flex-col items-center px-5 pt-6 pb-10">
                            <p class="mb-6 text-base font-normal leading-7 text-normal"> جهت ارتباط و اطلاع از شرایط
                                فروش شماره خود را وارد کنید. </p>
                            <input name="phone" type="tel"
                                class="bg-dark-50 mb-12 h-10 w-full max-w-72 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900"
                                placeholder="09" />
                            <button type="submit"
                                class="w-full text-base font-bold text-white rounded-custom flex_center max-w-72 h-11 bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                                ثبت درخواست </button>
                        </form>
                    </section>
                </section>
            </section>
        </main>
    @endif


    {{-- type 3 --}}
    @if ($land->styles->a_view_type.'' === '3')
        <main class="relative pt-4 default_container">
            {{-- breadcrumbs --}}
            {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

            <section class="flex flex-col gap-8 lg:flex-row lg:items-start">
                {{-- description --}}
                <section class="w-full lg:flex-1">
                    <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                        <h1 class="text-xl font-bold leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                        <p class="flex-none mt-1 text-sm font-normal"> 12 بهمن 1402 </p>
                    </div>

                    <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                            class="absolute top-0 left-0 w-full h-full" />
                        <div
                            class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">
                        </div>
                    </div>

                    {{-- details --}}
                    <section class="mb-8 overflow-hidden lg:mb-0 custom_table_striped_container custom_article_styles">
                        {!! $article->body !!}
                    </section>
                </section>

                {{-- left column --}}
                <section class="flex flex-col gap-6 lg:w-72 lg:flex-none">
                    {{-- articles --}}
                    <section class="relative pb-10 sm:pb-0 lg:pb-10">
                        {{-- header --}}
                        <div class="flex items-center mb-4 sm:justify-between lg:px-4">
                            <h3 class="text-lg font-bold text-gray-900 md:text-xl lg:text-lg"> آخرین اخبار و اطلاعیه ها
                            </h3>
                            <a href="#"
                                class="absolute bottom-0 flex items-center gap-2 text-base font-normal sm:static lg:absolute right-4 lg:right-auto lg:left-2 text-normal">
                                <span> مشاهده همه </span>
                                <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <ul class="grid grid-cols-1 gap-4 list-none md:grid-cols-3 lg:grid-cols-1">
                            @foreach ($land->articles->take(3) as $article)
                                <li
                                    class="flex flex-col bg-white w-full rounded-custom overflow-hidden {{ $borderType }}">
                                    <div class="relative w-full pt-[62%] mb-2">
                                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                                            class="absolute top-0 left-0 w-full h-full" />
                                    </div>
                                    {{-- info --}}
                                    <div class="flex flex-col px-5 pt-2 pb-4">
                                        <p
                                            class="mb-2 text-lg font-bold text-justify text-gray-900 md:line-clamp-1 lg:line-clamp-none">
                                            {{ $article->title }} </p>
                                        <p
                                            class="mb-3 text-sm font-normal leading-7 text-justify text-gray-900 line-clamp-3 md:h-20 lg:h-auto">
                                            {{ $article->description }}
                                        </p>
                                        <a href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}"
                                            class="flex items-center gap-3 pt-1 pb-2 mr-auto text-sm font-bold text-normal">
                                            <span> ادامه </span>
                                            <svg class="stroke-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                                    stroke="current" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </section>

                    {{-- contact to expert --}}
                    <section
                        class="flex flex-col bg-normal {{ $borderType }} rounded-custom overflow-hidden sm:mx-6 md:mx-10 lg:mx-0">
                        {{-- title --}}
                        <div class="w-full h-20 text-xl font-black text-white flex_center">
                            <p> ارتباط با کارشناسان فروش </p>
                        </div>
                        <form action="#" method="#" class="flex flex-col items-center px-5 pt-6 pb-10">
                            <p class="mb-6 text-base font-normal leading-7 text-white"> جهت ارتباط و اطلاع از شرایط
                                فروش شماره خود را وارد کنید. </p>
                            <input name="phone" type="tel"
                                class="bg-white mb-12 h-10 w-full max-w-72 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900"
                                placeholder="09" />
                            <button type="submit"
                                class="w-full text-base font-bold text-white border border-white rounded-custom flex_center max-w-72 h-11">
                                ثبت درخواست </button>
                        </form>
                    </section>
                </section>
            </section>
        </main>
    @endif

    {{-- type 4 --}}
    @if ($land->styles->a_view_type.'' === '4')
        <main class="relative pt-4 default_container">
            {{-- breadcrumbs --}}
            {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

            <section class="flex flex-col gap-8 lg:flex-row lg:items-start">
                {{-- description --}}
                <section class="order-1 w-full lg:flex-1 lg:order-2">
                    <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                        <h1 class="text-xl font-bold leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                        <p class="flex-none mt-1 text-sm font-normal">
                            {{ jdate($article->created_at)->format('%B %d، %Y') }} </p>
                    </div>

                    <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                            class="absolute top-0 left-0 w-full h-full" />
                        <div
                            class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">
                        </div>
                    </div>

                    {{-- details --}}
                    <section class="mb-8 overflow-hidden lg:mb-0 custom_table_striped_container custom_article_styles">
                        {!! $article->body !!}
                    </section>
                </section>

                {{-- right column --}}
                <section class="flex flex-col order-2 gap-6 lg:gap-8 lg:w-72 lg:flex-none lg:order-1">
                    {{-- articles --}}
                    <section class="relative">
                        {{-- header --}}
                        <div class="w-full h-20 mb-4 flex_center lg:mb-3 bg-normal rounded-custom">
                            <h3 class="text-xl font-black text-white lg:text-lg"> فهرست آخرین اخبار و اطلاعیه ها </h3>
                        </div>
                        {{-- more articles --}}
                        <section class="flex flex-col gap-4">
                            @foreach ($land->articles->take(3) as $article)
                                <Link
                                    href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}"
                                    class="grid grid-cols-10 bg-white w-full rounded-custom overflow-hidden {{ $borderType }}">
                                <div class="relative w-full pt-[62%] col-span-4">
                                    <img src="{{ $article->image }}" alt="{{ $article->title }}"
                                        class="absolute top-0 left-0 object-cover w-full h-full" />
                                </div>
                                {{-- info --}}
                                <div
                                    class="flex flex-col col-span-6 p-2 px-5 pt-2 pb-4 bg-dark-50 sm:pr-4 sm:py-4 sm:pl-6 lg:py-2 lg:pr-3 lg:pl-2 sm:gap-4 lg:gap-2 sm:justify-center">
                                    <p
                                        class="mb-3 text-base font-normal text-gray-900 lg:text-sm sm:text-justify lg:text-right line-clamp-1 sm:line-clamp-2 sm:h-12 lg:h-10 sm:mb-0">
                                        {{ $article->title }} </p>
                                    <p class="text-xs font-normal text-normal line-clamp-1">
                                        {{ jdate($article->created_at)->format('%B %d، %Y') }} </p>
                                </div>
                                </Link>
                            @endforeach
                        </section>
                    </section>

                    {{-- contact to expert --}}
                    <section
                        class="flex flex-col bg-white {{ $borderType }} rounded-custom overflow-hidden mb-8 sm:mx-6 md:mx-10 lg:mx-0 lg:mb-0">
                        {{-- title --}}
                        <div class="w-full h-20 text-xl font-black text-white bg-normal lg:text-lg flex_center">
                            <p> ارتباط با کارشناسان فروش </p>
                        </div>
                        <form action="#" method="#" class="flex flex-col items-center px-5 pt-6 pb-10">
                            <p class="mb-6 text-base font-normal leading-7 text-normal"> جهت ارتباط و اطلاع از شرایط
                                فروش شماره خود را وارد کنید. </p>
                            <input name="phone" type="tel"
                                class="bg-dark-50 mb-12 max-w-72 h-10 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900"
                                placeholder="09" />
                            <button type="submit"
                                class="w-full text-base font-bold text-white rounded-custom flex_center max-w-72 h-11 bg-normal">
                                ثبت درخواست </button>
                        </form>
                    </section>
                </section>
            </section>
        </main>
    @endif

    {{-- type 5 --}}
    @if ($land->styles->a_view_type.'' === '5')
        <main class="relative pt-4 default_container">
            {{-- breadcrumbs --}}
            {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

            <section class="flex flex-col gap-8 lg:flex-row lg:items-start">
                {{-- description --}}
                <section class="order-1 w-full lg:flex-1 lg:order-2">
                    <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                        <h1 class="text-xl font-bold leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                        <p class="flex-none mt-1 text-sm font-normal">
                            {{ jdate($article->created_at)->format('%B %d، %Y') }} </p>
                    </div>

                    <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                            class="absolute top-0 left-0 w-full h-full" />
                        <div
                            class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">
                        </div>
                    </div>

                    {{-- details --}}
                    <section
                        class="mb-8 overflow-hidden lg:mb-16 custom_table_striped_container custom_article_styles">
                        {!! $article->body !!}
                    </section>

                    {{-- contact to expert --}}
                    <section
                        class="flex flex-col bg-normal pb-12 pt-8 {{ $borderType }} rounded-custom mb-8 sm:mx-6 md:mx-10 lg:mx-12 lg:mb-0">
                        {{-- title --}}
                        <div class="w-full mb-4 text-xl font-black text-white flex_center">
                            <p> ارتباط با کارشناسان فروش </p>
                        </div>
                        <form action="#" method="#" class="flex flex-col items-center px-5">
                            <p class="mb-6 text-base font-normal leading-7 text-white"> جهت ارتباط و اطلاع از شرایط
                                فروش شماره خود را وارد کنید. </p>
                            <input name="phone" type="tel"
                                class="bg-dark-50 mb-6 max-w-72 h-10 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900"
                                placeholder="09" />
                            <button type="submit"
                                class="w-full text-base font-bold text-white border border-white rounded-custom flex_center max-w-72 h-11">
                                ثبت درخواست </button>
                        </form>
                    </section>
                </section>

                {{-- right column --}}
                <section class="flex flex-col order-2 lg:w-72 lg:flex-none lg:order-1 lg:pt-12">
                    {{-- search --}}
                    <form action="#" class="h-10 relative mb-3.5 max-w-96 w-full mr-auto lg:mr-0 lg:max-w-full">
                        <input type="text"
                            class="w-full h-full rounded-custom border border-gray-900 text-gray-900 focus:ring-0 outline-none pl-10 pr-2 placeholder:text-[#888b93] text-sm font-normal focus:border-gray-900"
                            placeholder="جستجوی عنوان" />
                        <button type="submit" class="absolute cursor-pointer top-2 left-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.9284 17.0416L20.4016 20.4016M19.2816 11.4416C19.2816 15.7715 15.7715 19.2816 11.4416 19.2816C7.11165 19.2816 3.60156 15.7715 3.60156 11.4416C3.60156 7.11165 7.11165 3.60156 11.4416 3.60156C15.7715 3.60156 19.2816 7.11165 19.2816 11.4416Z"
                                    stroke="#111827" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </button>
                    </form>
                    {{-- more articles --}}
                    <section class="flex flex-col gap-4">
                        @foreach ($land->articles->take(3) as $article)
                            <Link
                                href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}"
                                class="grid grid-cols-10 bg-white w-full rounded-custom overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[62%] col-span-4 border-l border-l-dark-100">
                                <img src="{{ $article->image }}" alt="{{ $article->title }}"
                                    class="absolute top-0 left-0 object-cover w-full h-full" />
                            </div>
                            {{-- info --}}
                            <div
                                class="flex flex-col col-span-6 p-2 px-5 pt-2 pb-4 sm:pr-4 sm:py-4 sm:pl-6 lg:py-2 lg:pr-3 lg:pl-2 sm:gap-4 lg:gap-2 sm:justify-center">
                                <p
                                    class="mb-3 text-base font-normal text-gray-900 sm:text-justify lg:text-right line-clamp-1 sm:line-clamp-2 sm:h-12 lg:h-10 lg:text-sm sm:mb-0">
                                    {{ $article->title }} </p>
                                <p class="text-xs font-normal text-normal line-clamp-1">
                                    {{ jdate($article->created_at)->format('%B %d، %Y') }} </p>
                            </div>
                            </Link>
                        @endforeach
                    </section>
                </section>
            </section>
        </main>
    @endif

</x-layout.default.main>



