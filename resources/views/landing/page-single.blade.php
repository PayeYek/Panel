<x-layout.default.main :land="$land">

    {{-- <x-layout.landing.sidebar :land="$land" /> --}}

    <img src="{{ asset('assets/svg/pattern-1.svg') }}" alt="lines"
         class="absolute right-0 w-full top-[38rem]"/>
    <img src="{{ asset('assets/svg/pattern-2.svg') }}" alt="line-3"
         class="absolute right-0 w-full top-[76rem]"/>
    <img src="{{ asset('assets/svg/pattern-2.svg') }}" alt="line-2"
         class="absolute right-0 w-full bottom-48"/>

    {{-- default_container --}}
    <main class="">
        {{-- slider --}}
        @if($land->slides)
            <Slider :slides="{{$land->slides}}"/>
        @endif

        {{-- products --}}
        <x-home_landing.productCategories radius="8"/>

        {{-- favorites --}}
        {{-- :type="$land->styles->product_type" --}}
        <x-home_landing.products :landSlug="$land->slug" :data="$land->products" :type="$land->styles->product_type" :colorPalette="$land->styles->color" evenOdd="false" radius="8"
            titleColor="title_color_type_1" />

        {{-- @dd($land->styles->article_type); --}}
        {{-- @dd($land->styles); --}}
        {{-- notifications --}}
        {{--
            type 1 for list
            type 2 for tail
        --}}
        {{-- $land->styles->article_type --}}
        <x-home_landing.announcement :landSlug="$land->slug" :data="$land->articles" type="1" :colorPalette="$land->styles->color" radius="8"/>

        {{-- videos --}}
        <x-home_landing.videos radius="12"/>

        {{-- terms of sale --}}
        <x-home_landing.termsOfSale radius="12"/>
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
