<x-layout.landing>

    {{--HEADER: LOGO | LINKS: HOME, PRODUCTS, SALLER, ABOUT | SALLER --}}
    <header class="px-5 xl:px-0 flex flex-col md:flex-row items-center justify-between gap-5">

        <x-layout.landing.logo :land="$land"/>

        <div class="flex flex-1">
            <nav
                class="flex gap-y-2 flex-wrap text-sm font-medium bg-gray-200 dark:bg-gray-800 md:bg-transparent dark:md:bg-transparent rounded-md px-3 py-2.5 divide-x md:divide-none divide-gray-500/50 rtl:divide-x-reverse">
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Home')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Products')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Sales Agency')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100" href="#about">{{__('About us')}}</a>
            </nav>
        </div>

        <a
            class="text-white text-center w-full max-w-48 md:w-fit font-medium text-sm bg-red-500 hover:bg-red-600 rounded-md px-3 py-2.5 transition-all duration-100"
            href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Terms of sale')}}</a>

    </header>

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
    @if($land->categories)
        @foreach($land->categories as $cat)
            @if($cat->products->count())
                <section class="mt-5 md:mt-16 px-5 xl:px-0">
                    <header class="flex items-center justify-between">
                        <h3 class="font-bold font-bakh me-10">{{ $cat->title }}</h3>
                        <div class="bg-gray-500/20 flex-1 h-0.5"></div>
                        @if($cat->products->count() > 4)
                            <a href="#"
                               class="font-medium bg-gray-500/20 hover:bg-gray-500/40 px-5 py-1.5 text-xs rounded-full transition-all duration-200">{{ __('Show all') }}</a>
                        @endif
                    </header>
                    <main class="mt-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        @foreach($cat->products->take(4) as $product)
                            <a href="{{ route('landing.product.show',['page'=> $land->slug, 'product'=> $product->slug]) }}"
                               class="c-item">
                                <img class="aspect-square rounded-md"
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

    {{--ADVERTISE--}}
    <section class="mt-5 md:mt-16 xl:rounded-md overflow-hidden">
        <div class="carousel-cell">
            <img class="h-[268px] md:h-[400px] object-cover"
                 src="{{ 'https://via.placeholder.com/1380x360.png/ff0000?text=تبلیغات' }}" alt="{{ 'alt' }}"/>
        </div>
    </section>

    {{--FOOTER: LOGO, DESC | LINKS: HOME, NEWS, ARTICLES, PRODUCTS, SALLER--}}
    <footer
        class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-5 mt-5 md:mt-16 mx-5 xl:mx-0 px-10 bg-gray-200 dark:bg-gray-800/90 rounded-t-lg py-10">
        <section class="flex flex-col md:col-span-full lg:col-span-2">
            <x-layout.landing.logo :land="$land" in-footer/>
            <p class="text-sm mt-6 md:mt-3 text-justify">
                {{$land->description}}
            </p>
        </section>

        @php
            $buttons = [
            [
            'title'=>'دسترسی سریع',
            'items' => ['محصولات','کاتالوگها','گالری تصاویر','درباره ما']
            ],
            [
            'title'=>'دانستنی',
            'items' =>['نمایندگی فروش مجاز','اطلاعیه های فروش','مطالب وبلاگ']
            ],
            [
            'title'=>'انواع محصولات',
            'items' => ['کامیون','کامیونت','کشنده','تریلر']
            ],
            ];
        @endphp

        @foreach($buttons as  $button)
            <main class="mt-10 md:mt-0">
                <header class="flex items-center justify-between">
                    <div class="bg-gray-500/20 flex-1 h-0.5"></div>
                    <h4 class="font-medium font-bakh bg-gray-500/20 rounded-md px-3 py-1">{{  $button['title'] }}</h4>
                    <div class="bg-gray-500/20 flex-1 h-0.5"></div>
                </header>
                <ul class="flex flex-col gap-4 mt-5 items-center justify-stretch">
                    @foreach($button['items'] as  $item)
                        <li class="w-full flex">
                            <a href="#"
                               class="w-full text-sm hover:text-red-500 bg-gray-500/10 text-center md:text-start rounded-md px-3 py-1 transition-all duration-100">{{ $item }}</a>
                        </li>
                    @endforeach
                </ul>
            </main>
        @endforeach

        <section
            class="md:pt-5 border-none md:border-t md:border-dashed border-gray-500/20 col-span-full flex flex-col md:flex-row-reverse items-center justify-between gap-5">
            <x-layout.landing.social class="invisible"/>
            <span class="text-xs text-center md:text-start border-t md:border-none border-dashed border-gray-500 py-2">
                {{__('message.rights', ['brand' => $land->title, 'year' => jdate()->getYear()])}}
            </span>
        </section>

    </footer>


</x-layout.landing>

