@push('script')
    <script type="module">
        var swiper = new Swiper('.arian_disel_slider', {
            // Optional parameters
            loop: true,
            slidePerView: 1,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
@endpush

<x-layout.default.main :land="$land">

    {{-- <x-layout.landing.sidebar :land="$land" /> --}}

    <img src="{{ asset('assets/images/test/blue-lines.png') }}" alt="lines"
        class="absolute right-0 w-full top-[34rem]" />
    <img src="{{ asset('assets/images/test/blue-line-3.png') }}" alt="line-3"
        class="absolute right-0 w-full top-[52rem]" />
    <img src="{{ asset('assets/images/test/blue-line-2.png') }}" alt="line-2"
        class="absolute right-0 w-full bottom-[20rem]" />

    {{-- default_container --}}
    <main class="">
        {{-- slider --}}
        <section class="mb-2.5 lg:mb-8 relative z-[1] sm:default_container">
            <div class="swiper arian_disel_slider slider_type_1">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <a href="#" class="swiper-slide w-full relative pt-[52%]">{{-- 48 --}}
                        <img src="{{ asset('assets/images/test/truck.png') }}" alt="truck"
                            class="absolute top-0 right-0 w-full h-full sm:rounded-b" />
                    </a>
                    <a href="#" class="swiper-slide w-full relative pt-[52%]">{{-- 48 --}}
                        <img src="{{ asset('assets/images/test/truck.png') }}" alt="truck"
                            class="absolute top-0 right-0 w-full h-full sm:rounded-b" />
                    </a>
                    <a href="#" class="swiper-slide w-full relative pt-[52%]">{{-- 48 --}}
                        <img src="{{ asset('assets/images/test/truck.png') }}" alt="truck"
                            class="absolute top-0 right-0 w-full h-full sm:rounded-b" />
                    </a>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </section>

        {{-- products --}}
        <section
            class="default_container flex items-center flex-col md:flex-row gap-2.5 lg:gap-3 mb-9 md:justify-start relative z-[1]">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white"> محصولات </h3>
            <div
                class="flex flex-col flex-wrap items-center content-center w-full h-20 text-base font-bold text-red-700 md:flex-row md:flex-nowrap md:content-normal md:h-auto gap-y-4 gap-x-5 dark:text-white">
                <a href="#"
                    class="h-8 bg-white rounded w-36 flex_center drop-shadow-red dark:drop-shadow-none dark:bg-gray-700">
                    کشنده </a>
                <a href="#"
                    class="h-8 bg-white rounded w-36 flex_center drop-shadow-red dark:drop-shadow-none dark:bg-gray-700">
                    کامیون </a>
                <a href="#"
                    class="h-8 bg-white rounded w-36 flex_center drop-shadow-red dark:drop-shadow-none dark:bg-gray-700">
                    کامییونت </a>
                <a href="#"
                    class="h-8 bg-white rounded w-36 flex_center drop-shadow-red dark:drop-shadow-none dark:bg-gray-700">
                    ون </a>
            </div>
        </section>

        {{-- favorites --}}
        <section class="mb-4 lg:mb-16 relative z-[1] default_container">
            <h3 class="mb-4 text-lg font-bold text-center text-gray-900 lg:text-right dark:text-white lg:px-4"> برگزیده
                ها </h3>
            {{--
                "-none" => border-radius: 0px
                "-sm"   => border-radius: 2px
                ""      => border-radius: 4px
                "-xl"   => border-radius: 12px

                "title_color_type_1" => red theme title

                "button_color_type_warning_default" => red border theme button default
            --}}
            <x-home_landing.products.products type="1" evenOdd="false" radius="-xl" gapX="4" gapY="4"
                titleColor="title_color_type_1" defaultButtonColor="button_color_type_warning_default"
                actionButtonColor="button_color_type_warning" />
        </section>

        {{-- notifications --}}
        {{-- 
            type 1 for list
            type 2 for tail    
        --}}
        <x-home_landing.announcement type="2" radius="12" gap="16" />

        {{-- videos --}}
        <x-home_landing.videos radius="12" />

        {{-- terms of sale --}}
        <x-home_landing.termsOfSale radius="12" />
    </main>

    {{-- CATEGORIES | PRODUCTS --}}
    {{-- <x-layout.landing.products class="mt-5 md:mt-16" :land="$land" :data="$data" /> --}}

    {{-- VIDEOS --}}
    {{--
    @if ($land->videos)
        <section class="relative grid grid-cols-1 gap-5 px-5 mt-5 md:mt-16 xl:px-0 md:grid-cols-2 lg:grid-cols-4">
            <header
                class="sticky top-0 flex flex-row items-center bg-gray-100 md:min-h-60 md:min-w-fit rounded-xl p-7 md:flex-col group md:relative md:bg-gradient-to-t from-gray-100 to-gray-300">
                <span
                    class="text-lg font-bold md:mb-3 md:text-5xl lg:text-3xl grow md:grid md:place-items-center">{{ __('Videos') }}</span>
                <a href="#"
                   class="px-5 py-1 text-xs font-bold text-red-800 transition-all duration-200 border-2 border-red-800 rounded-full md:order-4 group-hover:border-red-700 group-hover:text-white group-hover:bg-red-700 md:text-sm">{{ __('Show all') }}</a>
            </header>

            @foreach ($land->videos->take(3) as $video)
                --}}{{--                <a href="{{ route('landing.video.show', ['page'=> $land->slug , 'video'=> $video->slug]) }}" --}}{{--
                <div
                    class="group hover:scale-105 transform transition duration-200 bg-gray-100 rounded-xl px-3.5 pt-3.5 pb-2 flex flex-col">
                    <div class="w-full overflow-hidden bg-gray-300 rounded-lg dark:bg-gray-950 shrink-0">
                        {!! $video->link !!}
                    </div>
                    <h2 class="grid mt-2 mb-1 text-sm font-bold text-center text-gray-900 grow place-items-center">{{$video->alt}}</h2>
                </div>
                --}}{{--                </a> --}}{{--
            @endforeach
        </section>
    @endif
    --}}

    {{-- ARTICLES --}}
    {{-- <x-layout.landing.articles :land="$land" class="mt-5 md:mt-16" /> --}}

    {{-- CATEGORIES | PRODUCTS --}}
    {{--
    @if ($data)
        @foreach ($data as $item)
            @if ($item['products']->count())
                <section class="px-5 mt-5 md:mt-16 xl:px-0">
                    <header class="flex items-center justify-between">
                        <h3 class="font-bold font-bakh me-10">{{ $item['category']->title }}</h3>
                        <div class="bg-gray-500/20 flex-1 h-0.5"></div>
                        @if ($item['products']->count() > 4)
                            <a href="#"
                               class="font-medium bg-gray-500/20 hover:bg-gray-500/40 px-5 py-1.5 text-xs rounded-full transition-all duration-200">{{ __('Show all') }}</a>
                        @endif
                    </header>
                    <main class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($item['products']->take(4) as $product)
                            <a href="{{ route('landing.product.show',['page'=> $land->slug, 'product'=> $product->slug]) }}"
                               class="c-item">
                                <img class="p-10 bg-white rounded-md aspect-square dark:bg-gray-950"
                                     src="{{$product->image}}" alt="{{$product->name}}">
                                <h2>{{$product->name}}</h2>
                                <span>{{$product->model}} | {{$product->year}}</span>
                            </a>
                        @endforeach
                    </main>
                </section>
            @endif
        @endforeach
    @endif
    --}}

    {{-- ARTICLES --}}
    {{--
    @if ($newsArticles || $blogArticles)
        <section class="grid grid-cols-1 gap-10 px-5 mt-5 md:mt-16 xl:px-0 md:grid-cols-2">
            <x-layout.landing.article-group :title="__('News and notifications')"
                                            link="#"
                                            :contents="$newsArticles"/>

            <x-layout.landing.article-group :title="__('Latest blog content')"
                                            link="#"
                                            :contents="$blogArticles"/>
        </section>
    @endif
    --}}


</x-layout.default.main>
