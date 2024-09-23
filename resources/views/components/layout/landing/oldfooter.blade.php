@props(['land'=>null])

{{--ADVERTISE--}}
{{--<section class="mt-5 md:mt-16 xl:rounded-md overflow-hidden">
    <div class="carousel-cell">
        <img class="h-[220px] md:h-[400px] object-cover"
             src="{{ asset('assets/images/test/Arian diesel 02 resize.jpg') }}" alt="{{ 'alt' }}"/>
    </div>
</section>--}}

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
            'items' => [
                            ['name' => 'محصولات', 'link' => route('landing.product.list', ['page' => $land->slug])],
                            //['name' => 'کاتالوگ‌ها',  'link' => route('landing.page.catalogs', ['page' => $land->slug])],
                            ['name' => 'درباره ما',  'link' => route('landing.page.about', ['page' => $land->slug])]
                    ]
            ],
            [
            'title'=>'دانستنی',
            'items' => [
                            ['name' => 'نمایندگی فروش مجاز', 'link' => route('landing.page.show', ['page' => $land->slug])],
                            ['name' => 'اطلاعیه های فروش',  'link' => route('landing.article.list', ['page' => $land->slug])],
                            ['name' => 'مطالب وبلاگ',  'link' => route('landing.article.list', ['page' => $land->slug])]
                    ]
            ],
        ];

        $cats = array();
        foreach ($land->products as $product) {
            $cats[] = $product->category_id;
        }
        $cats = array_unique($cats);

        $data = array();
        $data['title'] = 'انواع محصولات';
        foreach ($cats as $cat) {
            $c = \App\Models\LandCategory::find($cat);
            $item['name'] = $c->title;
            $item['link'] = route('landing.product.category', ['page' => $land->slug, 'category' => $c->slug]);
            $data['items'][] = $item;
        }
        $buttons[] = $data;

        $footerLinkseStyle = match($land->styles->color."") {
            '1' => 'hover:text-red-800',
            '2' => 'hover:text-blue-800',
            '3' => 'hover:text-rose-800',
            '4' => 'hover:text-zinc-800',
            '5' => 'hover:text-cobalt-800',
            default => 'hover:text-red-800'
        };

    @endphp

    @foreach($buttons as  $button)
        <main class="mt-10 md:mt-0">
            <header class="flex items-center justify-between">
                <div class="bg-gray-500/20 flex-1 h-0.5"></div>
                <h4 class="font-medium font-bakh bg-gray-500/20 rounded-md px-3 py-1">{{ $button['title'] }}</h4>
                <div class="bg-gray-500/20 flex-1 h-0.5"></div>
            </header>
            <ul class="flex flex-col gap-4 mt-5 items-center justify-stretch">
                @isset($button['items'])
                    @foreach($button['items'] as  $item)
                        <li class="w-full flex">
                            <a href="{{ $item['link'] }}"
                               class="w-full text-sm {{ $footerLinkseStyle }} bg-gray-500/10 text-center md:text-start rounded-md px-3 py-1 transition-all duration-100">{{ $item['name'] }}</a>
                        </li>
                    @endforeach
                @endisset
            </ul>
        </main>
    @endforeach

    <section
        class="md:pt-5 border-none md:border-t md:border-dashed border-gray-500/20 col-span-full flex flex-col md:flex-row-reverse items-center justify-between gap-5">
        <x-layout.landing.social colorPalette="{{ $land->styles->color }}" />
        <span class="text-xs text-center md:text-start border-t md:border-none border-dashed border-gray-500 py-2">
                {{__('message.rights', ['brand' => 'نام برند', 'year' => jdate()->getYear()])}}
            {{--{{__('message.rights', ['brand' => $land->title, 'year' => jdate()->getYear()])}}--}}
            </span>
    </section>

</footer>
