<x-layout.landing.land :land="$land">

    <x-layout.landing.sidebar :land="$land"/>

    {{--CATEGORIES | PRODUCTS--}}
    <x-layout.landing.products class="mt-5 md:mt-16" :land="$land" :data="$data"/>

    {{--VIDEOS--}}
    {{--
    @if($land->videos)
        <section class="mt-5 md:mt-16 px-5 xl:px-0 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 relative">
            <header
                class="md:min-h-60 md:min-w-fit rounded-xl p-7 flex flex-row md:flex-col items-center group sticky top-0 md:relative bg-gray-100 md:bg-gradient-to-t from-gray-100 to-gray-300">
                <span
                    class="md:mb-3 text-lg md:text-5xl lg:text-3xl font-bold grow md:grid md:place-items-center">{{ __('Videos') }}</span>
                <a href="#"
                   class="px-5 py-1 border-2 rounded-full md:order-4 border-red-800 text-red-800 group-hover:border-red-700 group-hover:text-white group-hover:bg-red-700 text-xs md:text-sm font-bold transition-all duration-200">{{ __('Show all') }}</a>
            </header>

            @foreach($land->videos->take(3) as $video)
                --}}{{--                <a href="{{ route('landing.video.show', ['page'=> $land->slug , 'video'=> $video->slug]) }}"--}}{{--
                <div
                    class="group hover:scale-105 transform transition duration-200 bg-gray-100 rounded-xl px-3.5 pt-3.5 pb-2 flex flex-col">
                    <div class="w-full rounded-lg bg-gray-300 dark:bg-gray-950 shrink-0 overflow-hidden">
                        {!! $video->link !!}
                    </div>
                    <h2 class="mt-2 mb-1 text-sm font-bold text-gray-900 text-center grow grid place-items-center">{{$video->alt}}</h2>
                </div>
                --}}{{--                </a>--}}{{--
            @endforeach
        </section>
    @endif
    --}}

    {{--ARTICLES--}}
    <x-layout.landing.articles :land="$land" class="mt-5 md:mt-16"/>

    {{--CATEGORIES | PRODUCTS--}}
    {{--
    @if($data)
        @foreach($data as $item)
            @if($item['products']->count())
                <section class="mt-5 md:mt-16 px-5 xl:px-0">
                    <header class="flex items-center justify-between">
                        <h3 class="font-bold font-bakh me-10">{{ $item['category']->title }}</h3>
                        <div class="bg-gray-500/20 flex-1 h-0.5"></div>
                        @if($item['products']->count() > 4)
                            <a href="#"
                               class="font-medium bg-gray-500/20 hover:bg-gray-500/40 px-5 py-1.5 text-xs rounded-full transition-all duration-200">{{ __('Show all') }}</a>
                        @endif
                    </header>
                    <main class="mt-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        @foreach($item['products']->take(4) as $product)
                            <a href="{{ route('landing.product.show',['page'=> $land->slug, 'product'=> $product->slug]) }}"
                               class="c-item">
                                <img class="aspect-square rounded-md bg-white dark:bg-gray-950 p-10"
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

    {{--ARTICLES--}}
    {{--
    @if($newsArticles || $blogArticles)
        <section class="mt-5 md:mt-16 px-5 xl:px-0 grid grid-cols-1 md:grid-cols-2 gap-10">
            <x-layout.landing.article-group :title="__('News and notifications')"
                                            link="#"
                                            :contents="$newsArticles"/>

            <x-layout.landing.article-group :title="__('Latest blog content')"
                                            link="#"
                                            :contents="$blogArticles"/>
        </section>
    @endif
    --}}


</x-layout.landing.land>

