<x-layout.default.main :land="$land">
    {{-- mb-8 sm:mb-24 lg:mb-28 --}}
    <main class="">
        {{-- slider --}}
        @if ($land->slides)
            <Slider :slides="{{ $land->slides }}" :sliderType="{{ $land->styles->slider_type }}" />
        @endif

        @switch($land->styles->land_id)
            @case(1)
                <x-home_landing.quick_access_panel.type_one landSlug="{{ $land->slug }}" />
                @break
            @case(2)
                <x-home_landing.quick_access_panel.type_two landSlug="{{ $land->slug }}" />
                @break
            @case(4)
                <x-home_landing.quick_access_panel.type_four landSlug="{{ $land->slug }}" />
                @break
            @case(5)
                <x-home_landing.quick_access_panel.type_five landSlug="{{ $land->slug }}" :data="$data" />
                    @break
            @case(6)
                <x-home_landing.quick_access_panel.type_six landSlug="{{ $land->slug }}" />
                @break
            @case(7)
                <x-home_landing.quick_access_panel.type_seven landSlug="{{ $land->slug }}" />
                @break
            
            @default
                
        @endswitch

        {{-- favorites --}}
        <x-home_landing.products
            :landSlug="$land->slug"
            :landType="$land->styles->land_id"
            :data="$land->products"
            :type="$land->styles->product_card_type"
            :borderType="$land->styles->border_type"
            companyName="{{ $land->title }}"
            evenOdd="{{ $land->styles->product_striped }}" />

        {{-- articles --}}
        <x-home_landing.announcement
            :landSlug="$land->slug"
            :data="$land->articles"
            :land="$land"
            :landType="$land->styles->land_id"
            :type="$land->styles->article_card_type"
            :borderType="$land->styles->border_type"
            evenOdd="{{ $land->styles->article_striped }}" />

            {{-- videos --}}
            @if ($land->videos->count() > 0)
                <section class="mb-4 sm:mb-8 lg:mb-16 relative z-[3] default_container" id="video-player-container">
                    @switch($land->styles->land_id)
                        @case(1)
                            {{-- header --}}
                            <h3 class="mb-2 text-base sm:text-lg font-medium text-center text-stone-700"> ویدیو ها </h3>
                            <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
                            {{-- show all --}}
                            <Link href="{{ route('landing.videos', ['page' => $land->slug]) }}"
                                class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block float-left px-2 cursor-pointer"> نمایش همه </Link>
                            @break
                        @case(2)
                            <div class="flex items-center gap-4 mb-2 lg:mb-4">
                                {{-- circle --}}
                                <div class="size-3 rounded-full bg-normal"></div>
                                <h3 class="mb-2 text-xl font-normal text-center text-stone-700"> ویدیو ها </h3>
                                <Link href="{{ route('landing.videos', ['page' => $land->slug]) }}" class="text-normal text-base font-medium hidden sm:block"> (مشاهده همه) </Link>
                            </div>
                            @break
                        @case(4)
                            <div class="relative mb-4">
                                {{-- header --}}
                                <h3 class="text-lg lg:text-2xl font-medium text-center text-stone-700"> ویدیو ها </h3>
                                {{-- show all --}}
                                <Link href="{{ route('landing.videos', ['page' => $land->slug]) }}" class="absolute left-0 top-1 text-base font-medium text-stone-700 hidden lg:inline-flex px-2 cursor-pointer flex-row gap-2">
                                    <span> آرشیو ویدیو ها </span>
                                    <svg width="20" height="20" class="stroke-current" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.70833 15.8337L3.26562 10.0003M3.26562 10.0003L8.70833 4.16699M3.26562 10.0003L16.3281 10.0003" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </Link>
                            </div>
                            @break
                        @case(5)
                            <div class="flex_between mb-4">
                                <h3 class="text-lg lg:text-2xl font-medium text-center text-stone-700"> ویدیو ها </h3>
                                {{-- show all --}}
                                <Link href="{{ route('landing.videos', ['page' => $land->slug]) }}" class="absolute left-0 top-1 text-base font-medium text-stone-700 inline-flex px-2 cursor-pointer flex-row gap-2">
                                    <span> آرشیو </span>
                                    <svg width="20" height="20" class="stroke-current" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.70833 15.8337L3.26562 10.0003M3.26562 10.0003L8.70833 4.16699M3.26562 10.0003L16.3281 10.0003" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </Link>
                            </div>
                            @break
                        @case(6)
                            <h3 class="mb-6 text-lg lg:text-2xl font-medium text-center text-stone-700"> ویدیو ها </h3>
                            @break
                        @case(7)
                            <div class="flex items-center justify-between gap-4 mb-2 lg:mb-4">
                                <div class="hidden sm:flex items-center gap-4">
                                    {{-- circle --}}
                                    <div class="size-3 bg-normal"></div>
                                    <h3 class="mb-2 text-xl font-normal text-center text-stone-700"> ویدیو ها </h3>
                                </div>
                                <Link href="{{ route('landing.videos', ['page' => $land->slug]) }}" class="text-base font-medium">
                                    <span class="hidden sm:block text-normal"> آرشیو ویدیو ها </span>
                                    <span class="sm:hidden block text-stone-700"> ویدیو ها </span>
                                </Link>
                            </div>
                            @break
                        @default
                            
                    @endswitch
                    <x-home_landing.videos
                        :data="$land->videos"
                        :type="$land->styles->video_card_type"
                        :landSlug="$land->slug" />
                </section>
        
                {{-- video modal --}}
                <section class="fixed inset-0 z-[4] bg-black/60 hidden" id="ifame-container"
                    onclick="hideVideoByThumbnail(this)">
                    <div class="w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center"
                        id="ifame-box"></div>
                </section>
            @endif

        @switch($land->styles->land_id)
            @case(1)
                {{-- quick access --}}
                <x-home_landing.quickaccess :landSlug="$land->slug" classnames="mb-8 sm:mb-24 lg:mb-28" />
                @break
            @case(2)
                <x-home_landing.contact.type-one />
                @break
            @case(4)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-five />
                @break
            @case(5)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-six />
                @break
            @case(6)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-four />
                @break
            @case(7)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-two />
                @break
            @default
                
        @endswitch

    </main>


</x-layout.default.main>
