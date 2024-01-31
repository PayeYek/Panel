<x-layout.landing.land :land="$land">

    {{--SLIDER--}}
    @if($land->slides)
        <section class="main-carousel mt-5 xl:rounded-md overflow-hidden"
                 data-flickity='{ "pageDots": false, "prevNextButtons": false, "autoPlay": "500", "cellAlign": "left", "contain": true }'>
            @foreach($land->slides as $slide)
                <div class="carousel-cell">
                    <img class="h-[220px] md:h-[400px] object-cover"
                         src="{{ $slide->image }}" alt="{{ $slide->alt }}"/>
                </div>
            @endforeach
        </section>
    @endif

    {{--CATEGORIES | PRODUCTS--}}
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

    {{--ARTICLES--}}
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


</x-layout.landing.land>

