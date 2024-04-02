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
            $item['link'] = route('landing.product.list', ['page' => $land->slug, 'category' => $c->id]);
            $data['items'][] = $item;
        }
        $buttons[] = $data;
@endphp

<footer class="bg-stone-900 px-10 py-10">
    <section class="default_container grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-10 md:gap-4 mb-16 lg:gap-10">
        {{-- about --}}
        <section class="flex flex-col gap-4 md:gap-8 lg:col-span-2">
            <p class="text-white text-base font-medium"> درباره شرکت </p>
            <div class="text-sm font-normal text-white leading-7 text-justify">
                {{$land->description}}
            </div>
        </section>

        {{-- footer lists --}}
        <section class="grid grid-cols-1 md:grid-cols-3 md:col-span-3 gap-8 md:gap-4 lg:gap-10 text-white lg:col-span-3">
            @foreach($buttons as  $button)
                <x-splade-data default="{ dropdown: false }">
                    <section class="flex flex-col md:gap-8">
                        {{-- title --}}
                        <div class="flex items-center justify-between">
                            <p class="text-base font-medium"> {{ $button['title'] }} </p>
                            <button type="button" class="cursor-pointer md:hidden" @click="data.dropdown = !data.dropdown">
                                <svg :class="data.dropdown ? 'rotate-180' : 'rotate-0'" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 14L11.9992 9.42L7 14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        {{-- items --}}
                        <div class="flex flex-col gap-4 overflow-hidden duration-300" :class="data.dropdown ? 'py-4 md:py-0 max-h-60 md:max-h-full' : 'py-0 max-h-0 md:max-h-full'">
                            @isset($button['items'])
                                @foreach($button['items'] as  $item)
                                    <Link href="{{ $item['link'] }}"> {{ $item['name'] }} </Link>
                                @endforeach
                            @endisset
                        </div>
                    </section>
                </x-splade-data>
            @endforeach
        </section>
    </section>

    <section class="flex_center flex-col gap-10 md:flex-row-reverse md:justify-between default_container">
        <x-layout.landing.social inFooter />
        <span class="text-xs sm:text-sm text-center font-normal text-white">
            {{__('message.rights', ['brand' => 'نام برند', 'year' => jdate()->getYear()])}}
        </span>
    </section>
</footer>
