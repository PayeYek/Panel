@php
    $tabStyle = match($land->styles->product_list_type) {
        1 => 'pr-4 before:top-1/2 before:right-0 before:-translate-y-1/2 before:bg-normal before:h-12 before:w-1 before:rounded-l-custom before:absolute before:content-[""]',
        2 => 'before:size-3 before:bg-normal before:rounded-full before:absolute befopre:content-[""] before:top-2 before:right-0 pr-6 lg:pr-8',
        3 => 'before:size-3 before:border-y-2 before:border-normal before:border-l-2 before:rounded-full before:absolute befopre:content-[""] before:top-2 before:right-0 pr-6 lg:pr-8',
        4 => 'before:size-3 before:border-2 before:border-normal before:rounded-full before:absolute befopre:content-[""] before:top-2 before:right-0 pr-6 lg:pr-8',
        5 => 'before:size-3 before:bg-normal before:absolute befopre:content-[""] before:top-2 before:right-0 pr-6 lg:pr-8',
        default => ''
    };

    $technicalStyle = match($land->styles->product_list_type) {
        4 => 'border-r-4 border-normal',
        5 => 'border-r-4 border-stone-400',
        default => ''
    };

    $borderStyle = match($land->styles->border_type) {
        0  => 'bg-stone-700/5',
        1  => 'border border-stone-400',
        2  => 'drop-shadow-base',
        default => ''
    };

    $extraStyle = match($land->styles->product_list_type) {
        5  => 'border-r-4',
        default => ''
    };

    $marginBottom = match($land->styles->product_list_type."") {
        '5'  => 'mb-8 sm:mb-24 lg:mb-28',
        default => ''
    };
@endphp

{{-- @dd($categories->toArray()) --}}

<x-layout.default.main :land="$land">
{{-- @dd($product) --}}
    {{-- type 1 --}}
    <main class="pt-4 relative {{ $marginBottom }}">

        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        {{-- product detail --}}
        <section
            class="grid grid-cols-1 lg:grid-cols-10 gap-4 lg:gap-5 default_container mb-14 lg:mb-12 xl:mb-16">
            <h1 class="lg:hidden text-xl font-medium text-stone-700 mb-5"> {{ $product->name }} </h1>
            {{-- product images --}}
            <section class="lg:flex flex-col gap-3 lg:col-span-6">
                {{-- desktop slider --}}
                <landPdpDesktopSlider name="{{ $product->name }}" mainImage="{{ $product->image }}"
                    slides="{{ $product }}" />
                    {{-- @dd() --}}

                {{-- mobile slider --}}
                <landPdpMobileSlider slides="{{ $product }}" />
            </section>

            {{-- info --}}
            <x-pdp_landing.information :infoType="$land->styles->product_list_type" :landId="$land->styles->land_id" productName="{{ $product->name }}" :product="$product" :landSlug="$land->slug" :categories="$categories" />
        </section>

        {{-- Further Details --}}
        @if ($product->body != null)
            <section class="default_container mb-20">
                <p class="relative text-xl mb-7 font-medium text-stone-700 {{ $tabStyle }}"> درباره محصول </p>
                <div class="pb-4 text-justify custom_article_styles">
                    {!! $product->body !!}
                </div>
            </section>
        @endif

        {{-- more articles --}}
        {{-- <section class="default_container mb-20">
            <div class="flex text-base font-medium flex-col gap-2">
                <h4 class="text-stone-700"> لینک دسترسی به معرفی تخصصی محصول </h4>
                <div class="flex items-center flex-wrap gap-4 text-link"></div>
            </div>
        </section> --}}

        {{-- Technical Specifications --}}
        @if ($product->attributes->count())
            <section class="default_container mb-20">
                <p
                    class="relative text-xl mb-7 font-medium text-stone-700 {{ $tabStyle }}">
                    مشخصات </p>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-stone-700">
                    @foreach ($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs)
                        <x-splade-data default="{ toggle: false }">
                            <li>
                                <section class="p-4 bg-stone-200 rounded-custom lg:px-8 {{ $technicalStyle }}">
                                    {{-- title --}}
                                    <div class="flex items-center justify-between cursor-pointer"
                                        @click="data.toggle = !data.toggle">
                                        <p class="text-sm lg:text-base font-medium">
                                            {{ \App\Models\LandAttribute::whereId($key)->first()->name }} </p>
                                        <button type="button" class="cursor-pointer">
                                            <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </div>
                                    <ul class="list-inside list-disc marker:text-stone-700 text-sm lg:text-base font-normal flex flex-col gap-2 duration-1000 overflow-hidden lg:pr-2"
                                        v-bind:class="data.toggle ? 'max-h-96 pb-4 mt-4' : 'max-h-0 pb-0'">
                                        @foreach ($attrs as $attr)
                                            <li> {{ $attr->name }} : {{ $attr->pivot->value->value }} </li>
                                        @endforeach
                                    </ul>
                                </section>
                            </li>
                        </x-splade-data>
                    @endforeach
                </ul>
            </section>
        @endif

        {{-- videos --}}
        @if ($product->videos->count())
            <section class="mb-20 relative default_container" id="video-player-container">
                <p
                    class="relative text-xl mb-7 font-medium text-stone-700 {{ $tabStyle }}">
                    ویدیو </p>
                <x-home_landing.videos :data="$product->videos" :type="$land->styles->video_card_type" :landSlug="$land->slug" />
            </section>

            {{-- video modal --}}
            <section class="fixed inset-0 z-[4] bg-black/60 hidden" id="ifame-container"
                onclick="hideVideoByThumbnail(this)">
                <div class="w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center"
                    id="ifame-box"></div>
            </section>
        @endif


        {{-- viewpoint --}}
        @if ($comments->count())
            <section class="default_container mb-20">
                <p
                class="relative text-xl mb-7 font-medium text-stone-700 {{ $tabStyle }}">
                دیدگاه </p>
                <ul class="flex flex-col gap-7 text-gray-900">
                    @if ($comments->count() > 0)
                        @foreach ($comments as $comment)
                            <li>
                                {{-- user name --}}
                                <p class="block text-base font-medium text-stone-700 mb-1.5 mr-2"> {{ $comment->name }} </p>

                                {{-- user viewpoint --}}
                                <div class="{{ $borderStyle }} {{ $extraStyle }} rounded-custom p-4">
                                    <div class="font-normal leading-6 lg:leading-7 text-justify text-sm lg:text-base">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li
                            class="h-44 w-full flex_center text-center text-normal leading-6 lg:leading-7 text-sm lg:text-base">
                            شما می توانید نظر خود را با ما در میان بگذارید.
                        </li>
                    @endif
                </ul>
                @if ($comments->count() > 3)
                    <button type="button" class="mx-auto text-normal mt-10 text-sm font-medium lg:text-base cursor-pointer block">
                        مشاهده همه
                        دیدگاه ها
                    </button>
                @endif
            </section>
        @endif

        {{-- add viewpoint --}}
        <x-pdp_landing.addViewpoint :land="$land" :product="$product" :tabStyle="$tabStyle" marginbottom="mb-20" />
        {{-- @switch($land->styles->land_id)
            @case(6)
                <x-home_landing.contact.type-four />
            @break
            @case(7)
                <x-home_landing.contact.type-two />
            @break
            @case(8)
                <x-home_landing.quick_access_panel.type_eight landSlug="{{ $land->slug }}" />
            @break
        @endswitch --}}
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

</x-layout.default.main>
