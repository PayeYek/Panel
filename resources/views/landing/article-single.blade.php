@php
    $borderType = match ($land->styles->border_type.'') {
        '0' => '',
        '1' => 'border border-stone-400',
        '2' => 'drop-shadow-base',
        default => '',
    };
@endphp
{{-- @dd($land->articles) --}}
<x-layout.default.main :land="$land">

    {{-- type 1 --}}
    @if ($land->styles->a_view_type.'' === '1')
        <main class="relative pt-4 default_container mb-8 sm:mb-24 lg:mb-28">
            {{-- breadcrumbs --}}
            <x-common_landing.breadcrumbs :data="$breadcrumbs" />

            <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                <h1 class="text-xl font-medium leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                <p class="flex-none mt-1 text-sm font-normal"> {{ jdate($article->created_at)->format('%B، %Y') }} </p>
            </div>

            <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="absolute top-0 left-0 w-full h-full" />
{{--                <div class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">--}}
{{--                </div>--}}
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
                        class="w-full text-base font-medium text-white rounded-custom flex_center max-w-64 h-11 bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                        ثبت درخواست </button>
                </form>
            </section>

            {{-- articles --}}
            <section class="relative flex flex-col pb-10 sm:pb-0">
                {{-- header --}}
                    <h3 class="mb-2 text-base font-medium text-center sm:text-lg text-stone-700"> آخرین اخبار و اطلاعیه ها
                    </h3>
                    <hr class="mx-auto mb-6 w-60 sm:w-96 border-normal lg:mb-0" />
                    {{-- show all --}}
                    <Link href="{{ route('landing.article.list', ['page' => $land->slug]) }}"
                        class="hidden float-left px-2 mb-3 mr-auto text-base font-normal cursor-pointer text-normal lg:inline-block">
                    نمایش همه </Link>
                    <MoreArticles :slides="{{ $land->articles }}" borderType="{{ $borderType }}" striped="{{$land->styles->article_striped}}" landSlug="{{ $land->slug }}" containerClass="{{ $land->styles->border_type == 2 ? '!py-6' : '' }}" />
            </section>
        </main>
    @endif

    {{-- type 2 --}}
    @if ($land->styles->a_view_type.'' === '2')
        <main class="relative pt-4 default_container mb-8 sm:mb-24 lg:mb-28">
            {{-- breadcrumbs --}}
            <x-common_landing.breadcrumbs :data="$breadcrumbs" />
            <section class="grid grid-cols-1 gap-8 lg:gap-4 lg:grid-cols-7 xl:grid-cols-4">
                {{-- description --}}
                <section class="order-1 w-full lg:col-span-5 xl:gap-8 xl:col-span-3 lg:order-2">
                    <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                        <h1 class="text-xl font-medium leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                        <p class="flex-none mt-1 text-sm font-normal"> {{ jdate($article->created_at)->format('%B، %Y') }} </p>
                    </div>

                    <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                        <img src="{{ $article->image }}"
                            alt="{{ $article->title }}" class="absolute top-0 left-0 w-full h-full" />
{{--                        <div--}}
{{--                            class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">--}}
{{--                        </div>--}}
                    </div>

                    {{-- details --}}
                    <section class="mb-8 overflow-hidden lg:mb-16 custom_table_striped_container custom_article_styles">
                        {!! $article->body !!}
                    </section>
                </section>

                {{-- left column --}}
                <section class="flex flex-col order-2 gap-6 lg:order-1 lg:col-span-2 xl:col-span-1">
                    {{-- articles --}}
                    <section>
                        {{-- header --}}
                        <div class="flex items-center mb-4 sm:justify-between lg:px-4">
                            <a href="{{ route('landing.article.list', ['page' => $land->slug]) }}" class="text-lg font-medium text-gray-900 md:text-xl lg:text-lg"> آخرین اخبار و اطلاعیه ها
                            </a>
                            {{-- <a href="{{ route('landing.article.list', ['page' => $land->slug]) }}"
                                class="absolute bottom-0 flex items-center gap-2 text-base font-normal sm:static lg:absolute right-4 lg:right-auto lg:left-2 text-normal">
                                <span> مشاهده همه </span>
                                <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a> --}}
                        </div>
                        <ul class="grid grid-cols-1 gap-4 list-none md:grid-cols-3 lg:grid-cols-1">
                            @foreach ($land->articles->take(3) as $article)
                                <li class="flex flex-col bg-white w-full rounded-custom overflow-hidden {{ $borderType }}">
                                    <div class="relative w-full pt-[56%] mb-2">
                                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                                            class="absolute top-0 left-0 w-full h-full" />
                                    </div>
                                    {{-- info --}}
                                    <div class="flex flex-col px-5 pt-2 pb-4">
                                        <p
                                            class="mb-2 text-lg font-medium text-justify text-gray-900 md:line-clamp-1 lg:line-clamp-none">
                                            {{ $article->title }} </p>
                                        <p
                                            class="mb-3 text-sm font-normal leading-7 text-justify text-gray-900 line-clamp-3 md:h-20 lg:h-auto">
                                            {{ $article->description }}
                                        </p>
                                        <a href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}"
                                            class="flex items-center gap-3 pt-1 pb-2 mr-auto text-sm font-medium text-normal">
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
                        class="flex flex-col bg-white {{ $borderType }} rounded-custom overflow-hidden sm:mx-6 md:mx-10 lg:mx-0 lg:sticky lg:top-40 lg:z-[1]">
                        {{-- title --}}
                        <div class="w-full h-20 text-xl font-black text-white bg-normal flex_center">
                            <p> ارتباط با کارشناسان فروش </p>
                        </div>
                        <form action="#" method="#" class="flex flex-col items-center px-5 pt-6 pb-10">
                            <p class="mb-6 text-base font-normal leading-7 text-normal"> جهت ارتباط و اطلاع از شرایط
                                فروش شماره خود را وارد کنید. </p>
                            <input name="phone" type="tel"
                                class="bg-dark-50 mb-12 h-10 max-w-72 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900"
                                placeholder="09" />
                            <button type="submit"
                                class="w-full text-base font-medium text-white rounded-custom flex_center max-w-72 h-11 bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                                ثبت درخواست </button>
                        </form>
                    </section>
                </section>
            </section>
        </main>
    @endif

    {{-- type 3 --}}
    @if ($land->styles->a_view_type.'' === '3')
        <main class="relative pt-4 default_container mb-8 sm:mb-24 lg:mb-28">
            {{-- breadcrumbs --}}
            <x-common_landing.breadcrumbs :data="$breadcrumbs" />

            <section class="grid grid-cols-1 gap-8 lg:gap-4 lg:grid-cols-7 xl:grid-cols-4">
                {{-- description --}}
                <section class="lg:col-span-5 xl:gap-8 xl:col-span-3">
                    <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                        <h1 class="text-xl font-medium leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                        <p class="flex-none mt-1 text-sm font-normal"> {{ jdate($article->created_at)->format('%B، %Y') }} </p>
                    </div>

                    <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                            class="absolute top-0 left-0 w-full h-full" />
{{--                        <div--}}
{{--                            class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">--}}
{{--                        </div>--}}
                    </div>

                    {{-- details --}}
                    <section class="mb-8 overflow-hidden lg:mb-0 custom_table_striped_container custom_article_styles">
                        {!! $article->body !!}
                    </section>
                </section>

                {{-- left column --}}
                <section class="flex flex-col gap-6 lg:col-span-2 xl:col-span-1">
                    {{-- articles --}}
                    <section>
                        {{-- header --}}
                        <div class="flex items-center mb-4 lg:px-4">
                            <a href="{{ route('landing.article.list', ['page' => $land->slug]) }}" class="text-lg font-medium text-gray-900 md:text-xl lg:text-lg"> آخرین اخبار و اطلاعیه ها
                            </a>
                            {{-- <a href="#"
                                class="absolute bottom-0 flex items-center gap-2 text-base font-normal sm:static lg:absolute right-4 lg:right-auto lg:left-2 text-normal">
                                <span> مشاهده همه </span>
                                <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a> --}}
                        </div>
                        <ul class="grid grid-cols-1 gap-4 list-none md:grid-cols-3 lg:grid-cols-1">
                            @foreach ($land->articles->take(3) as $article)
                                <li
                                    class="flex flex-col bg-white w-full rounded-custom overflow-hidden {{ $borderType }}">
                                    <div class="relative w-full pt-[56%] mb-2">
                                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                                            class="absolute top-0 left-0 w-full h-full" />
                                    </div>
                                    {{-- info --}}
                                    <div class="flex flex-col px-5 pt-2 pb-4">
                                        <p
                                            class="mb-2 text-lg font-medium text-justify text-gray-900 md:line-clamp-1 lg:line-clamp-none">
                                            {{ $article->title }} </p>
                                        <p
                                            class="mb-3 text-sm font-normal leading-7 text-justify text-gray-900 line-clamp-3 md:h-20 lg:h-auto">
                                            {{ $article->description }}
                                        </p>
                                        <a href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}"
                                            class="flex items-center gap-3 pt-1 pb-2 mr-auto text-sm font-medium text-normal">
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
                        class="flex flex-col bg-normal {{ $borderType }} rounded-custom overflow-hidden sm:mx-6 md:mx-10 lg:mx-0 lg:sticky lg:top-40 lg:z-[1]">
                        {{-- title --}}
                        <div class="w-full h-20 text-xl font-black text-white flex_center">
                            <p> ارتباط با کارشناسان فروش </p>
                        </div>
                        <form action="#" method="#" class="flex flex-col items-center px-5 pt-6 pb-10">
                            <p class="mb-6 text-base font-normal leading-7 text-white text-center"> جهت ارتباط و اطلاع از شرایط
                                فروش شماره خود را وارد کنید. </p>
                            <input name="phone" type="tel"
                                class="bg-white mb-12 h-10 max-w-72 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900"
                                placeholder="09" />
                            <button type="submit"
                                class="w-full text-base font-medium text-white border border-white rounded-custom flex_center max-w-72 h-11">
                                ثبت درخواست </button>
                        </form>
                    </section>
                </section>
            </section>
        </main>
    @endif

    {{-- type 4 --}}
    @if ($land->styles->a_view_type.'' === '4')
        <main class="relative pt-4 default_container mb-8 sm:mb-24 lg:mb-28">
            {{-- breadcrumbs --}}
            <x-common_landing.breadcrumbs :data="$breadcrumbs" />

            <section class="grid grid-cols-1 gap-8 lg:gap-4 lg:grid-cols-7 xl:grid-cols-4">
                {{-- description --}}
                <section class="order-1 lg:col-span-5 xl:gap-8 xl:col-span-3 lg:order-2">
                    <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                        <h1 class="text-xl font-medium leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                        <p class="flex-none mt-1 text-sm font-normal">
                            {{ jdate($article->created_at)->format('%B، %Y') }} </p>
                    </div>

                    <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                            class="absolute top-0 left-0 w-full h-full" />
{{--                        <div--}}
{{--                            class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">--}}
{{--                        </div>--}}
                    </div>

                    {{-- details --}}
                    <section class="mb-8 overflow-hidden lg:mb-0 custom_table_striped_container custom_article_styles">
                        {!! $article->body !!}
                    </section>
                </section>

                {{-- right column --}}
                <section class="flex flex-col order-2 gap-6 lg:gap-8 lg:col-span-2 xl:col-span-1 lg:order-1">
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
                                <div class="relative w-full pt-[56%] col-span-4">
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
                                        {{ jdate($article->created_at)->format('%B، %Y') }} </p>
                                </div>
                                </Link>
                            @endforeach
                        </section>
                    </section>

                    {{-- contact to expert --}}
                    <section
                        class="flex flex-col bg-white {{ $borderType }} rounded-custom overflow-hidden mb-8 sm:mx-6 md:mx-10 lg:mx-0 lg:mb-0 lg:sticky lg:top-40 lg:z-[1]">
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
                                class="w-full text-base font-medium text-white rounded-custom flex_center max-w-72 h-11 bg-normal">
                                ثبت درخواست </button>
                        </form>
                    </section>
                </section>
            </section>
        </main>
    @endif

    {{-- type 5 --}}
    @if ($land->styles->a_view_type.'' === '5')
        <main class="relative pt-4 default_container mb-8">
            {{-- breadcrumbs --}}
            <x-common_landing.breadcrumbs :data="$breadcrumbs" />

            <section class="grid grid-cols-1 gap-8 lg:gap-4 lg:grid-cols-7 xl:grid-cols-4">
                {{-- description --}}
                <section class="order-1 lg:col-span-5 xl:gap-8 xl:col-span-3 lg:order-2">
                    <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                        <h1 class="text-xl font-medium leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                        <p class="flex-none mt-1 text-sm font-normal">
                            {{ jdate($article->created_at)->format('%B، %Y') }} </p>
                    </div>

                    <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 rounded-custom overflow-hidden">
                        <img src="{{ $article->image }}" alt="{{ $article->title }}"
                            class="absolute top-0 left-0 w-full h-full" />
{{--                        <div--}}
{{--                            class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent">--}}
{{--                        </div>--}}
                    </div>

                    {{-- details --}}
                    <section
                        class="mb-8 overflow-hidden lg:mb-16 custom_table_striped_container custom_article_styles">
                        {!! $article->body !!}
                    </section>

                    {{-- contact to expert --}}
                    {{-- <section
                        class="flex flex-col bg-normal pb-12 pt-8 {{ $borderType }} rounded-custom mb-8 sm:mx-6 md:mx-10 lg:mx-12 lg:mb-0">
                        title
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
                                class="w-full text-base font-medium text-white border border-white rounded-custom flex_center max-w-72 h-11">
                                ثبت درخواست </button>
                        </form>
                    </section> --}}

                </section>

                {{-- right column --}}
                <section class="flex flex-col order-2 lg:col-span-2 xl:col-span-1 lg:order-1 lg:pt-2">
                    <div class="flex items-center mb-4 lg:px-4">
                        <a href="{{ route('landing.article.list', ['page' => $land->slug]) }}" class="text-lg font-medium text-gray-900 md:text-xl lg:text-lg"> آخرین اخبار و اطلاعیه ها
                        </a>
                    </div>
                    {{-- more articles --}}
                    <section class="flex flex-col gap-4">
                        @foreach ($land->articles->take(3) as $article)
                            <Link
                                href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}"
                                class="grid grid-cols-10 bg-white w-full rounded-custom overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[56%] col-span-4 border-l border-l-dark-100">
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
                                    {{ jdate($article->created_at)->format('%B، %Y') }} </p>
                            </div>
                            </Link>
                        @endforeach
                    </section>
                </section>
            </section>
        </main>
        @switch($land->styles->contact_type)
            @case(1)
                <x-home_landing.contact.type-one />
            @break

            @case(2)
                <x-home_landing.contact.type-five />
            @break

            @case(3)
                <x-home_landing.contact.type-six />
            @break

            @case(4)
                <x-home_landing.contact.type-four />
            @break

            @case(5)
                <x-home_landing.contact.type-two />
            @break
        @endswitch
    @endif

    {{-- type 6 --}}
    @if ($land->styles->a_view_type.'' === '6')
        <main class="relative pt-4">
            {{-- breadcrumbs --}}
            <x-common_landing.breadcrumbs :data="$breadcrumbs" />

            {{-- <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                <h1 class="text-xl font-medium leading-8 sm:text-2xl"> {{ $article->title }} </h1>
                <p class="flex-none mt-1 text-sm font-normal"> {{ jdate($article->created_at)->format('%B، %Y') }} </p>
            </div> --}}

            <div class="default_container mb-2 md:mb-4 lg:mb-8">
                <div class="w-full relative pt-[56%] rounded-custom overflow-hidden">
                    <img src="{{ $article->image }}" alt="{{ $article->title }}" class="absolute top-0 left-0 w-full h-full" />
                    <div class="absolute z-[1] bottom-0 sm:bottom-6 text-base sm:text-xl lg:text-2xl left-0 w-full px-4 lg:px-6 bg-gradient-to-r from-normal/50 to-normal h-12 sm:h-16 lg:h-24 flex items-center line-clamp-1 text-white">
                        {{ $article->title }}
                    </div>
                </div>
            </div>

            {{-- details --}}
            <section class="mb-8 overflow-hidden lg:mb-16 custom_article_styles custom_table_striped_container default_container">
                {!! $article->body !!}
            </section>

            {{-- articles --}}
            <section class="relative flex flex-col pb-10 sm:pb-0 default_container mb-8 sm:mb-12 lg:mb-16">
                <div class="flex items-center gap-4 mb-2 lg:mb-4">
                    {{-- circle --}}
                    <div class="size-3 rounded-full bg-normal"></div>
                    <h3 class="mb-2 text-xl font-normal text-center text-stone-700"> دیگر اخبار و مقالات </h3>
                    <Link href="{{ route('landing.article.list', ['page' => $land->slug]) }}" class="text-normal text-base font-medium hidden sm:block"> (مشاهده همه) </Link>
                </div>
                <div class="list-none sm:mb-0 w-full flex flex-col gap-4">
                    @foreach ($land->articles->take(3) as $article)
                        <Link href="{{ route('landing.article.show', ['page' => $land->slug, 'article' => $article->slug]) }}" class="flex flex-col sm:flex-row rounded-custom overflow-hidden bg-white {{ $borderType }}">
                            {{-- image --}}
                            <div
                                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none">
                                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
                            </div>
                            {{-- docs --}}
                            <div class="px-5 md:pl-8 flex flex-col sm:justify-center sm:flex-1 py-4">
                                <div class="flex flex-col gap-1 mb-2 sm:flex-row sm:justify-between sm:items-center">
                                    <h3 class="mb-1 text-base font-medium text-stone-700 line-clamp-1"> {{ $article->title }} </h3>
                                    <h4 class="text-normal text-sm font-normal flex-none"> {{ jdate($article->created_at)->format('%B، %Y') }} </h4>
                                </div>
                                <p
                                    class="text-sm text-justify lg:text-base line-clamp-3 lg:line-clamp-2 lg:h-24 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500">
                                    {{ $article->description }}
                                </p>
                                <div class="flex items-center justify-start sm:justify-end">
                                    <div class="text-sm font-medium flex items-center gap-4 text-stone-700">
                                        <span> ادامه </span>
                                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 16L9.41 14.59L3.83 9L16 9V7L3.83 7L9.41 1.41L8 0L0 8L8 16Z" fill="current"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </Link>
                    @endforeach
                </div>
            </section>

            {{-- contact to expert --}}
            @switch($land->styles->contact_type)
                @case(1)
                    <x-home_landing.contact.type-one />
                    @break
                @case(2)
                    {{-- contact to expert --}}
                    <x-home_landing.contact.type-five />
                    @break
                @case(3)
                    {{-- contact to expert --}}
                    <x-home_landing.contact.type-six />
                    @break
                @case(4)
                    {{-- contact to expert --}}
                    <x-home_landing.contact.type-four />
                    @break
                @case(5)
                    {{-- contact to expert --}}
                    <x-home_landing.contact.type-two />
                    @break
                @case(6)
                    {{-- contact to expert --}}
                    <x-home_landing.contact.type-seven />
                    @break
                @case(7)
                    {{-- contact to expert --}}
                    <x-home_landing.contact.type-eight />
                    @break
                @default

            @endswitch
        </main>
    @endif

</x-layout.default.main>
