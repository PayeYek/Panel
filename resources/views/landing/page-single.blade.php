<x-layout.default.main :land="$land">
    {{-- mb-8 sm:mb-24 lg:mb-28 --}}
    <main class="">
        {{-- slider --}}
        @if ($land->slides)
            <Slider :slides="{{ $land->slides }}" :sliderType="{{ $land->styles->slider_type }}"/>
        @endif

        @switch($land->styles->quick_access_panel_type)
            @case(1)
                <x-home_landing.quick_access_panel.type_one landSlug="{{ $land->slug }}"/>
                @break
            @case(2)
                <x-home_landing.quick_access_panel.type_two landSlug="{{ $land->slug }}"/>
                @break
            @case(3)
                <x-home_landing.quick_access_panel.type_three landSlug="{{ $land->slug }}"/>
                @break
            @case(4)
                <x-home_landing.quick_access_panel.type_four landSlug="{{ $land->slug }}" :data="$data"/>
                @break
            @case(5)
                <x-home_landing.quick_access_panel.type_five landSlug="{{ $land->slug }}"/>
                @break
            @case(6)
                <x-home_landing.quick_access_panel.type_six landSlug="{{ $land->slug }}"/>
                @break
            @case(7)
                <x-home_landing.quick_access_panel.type_seven landSlug="{{ $land->slug }}"/>
                @break
            @case(8)
                <x-home_landing.quick_access_panel.type_eight landSlug="{{ $land->slug }}"/>
                @break

            @default

        @endswitch

        {{-- favorites --}}
        @if ($land->products->count() > 0)
            <x-home_landing.products
                :landSlug="$land->slug"
                :landType="$land->styles->land_id"
                :data="$land->products"
                :type="$land->styles->product_card_type"
                :borderType="$land->styles->border_type"
                :headerType="$land->styles->section_header_type"
                companyName="{{ $land->title }}"
                evenOdd="{{ $land->styles->product_striped }}"/>
        @endif

        {{-- articles --}}
        @if ($land->articles()->published()->count() > 0)
            <x-home_landing.announcement
                :landSlug="$land->slug"
                :data="$land->articles"
                :land="$land"
                :landType="$land->styles->land_id"
                :type="$land->styles->article_card_type"
                :borderType="$land->styles->border_type"
                :headerType="$land->styles->section_header_type"
                evenOdd="{{ $land->styles->article_striped }}"/>
        @endif
        
        {{-- videos --}}
        @if ($land->videos->count() > 0)
            <section class="mb-4 sm:mb-8 lg:mb-16 relative z-[3] default_container" id="video-player-container">
                @switch($land->styles->section_header_type)
                    @case(1)
                        <x-home_landing.headerType.type-one title="ویدیو ها"
                                                            link="{{ route('landing.videos', ['page' => $land->slug]) }}"
                                                            showall="نمایش همه"/>
                        @break
                    @case(2)
                        <x-home_landing.headerType.type-two title="ویدیو ها"
                                                            link="{{ route('landing.videos', ['page' => $land->slug]) }}"
                                                            showall="مشاهده همه"/>
                        @break
                    @case(3)
                        <x-home_landing.headerType.type-three title="ویدیو ها"
                                                              link="{{ route('landing.videos', ['page' => $land->slug]) }}"
                                                              showall="آرشیو ویدیو ها"/>
                        @break
                    @case(4)
                        <x-home_landing.headerType.type-four title="ویدیو ها"
                                                             link="{{ route('landing.videos', ['page' => $land->slug]) }}"
                                                             showall="آرشیو ویدیو ها"/>
                        @break
                    @case(5)
                        <x-home_landing.headerType.type-five title="ویدیو ها"/>
                        @break
                    @case(6)
                        <x-home_landing.headerType.type-six title="ویدیو ها"
                                                            link="{{ route('landing.videos', ['page' => $land->slug]) }}"
                                                            showall="آرشیو ویدیو ها"/>
                        @break
                    @default

                @endswitch
                <x-home_landing.videos
                    :data="$land->videos"
                    :type="$land->styles->video_card_type"
                    :landSlug="$land->slug"/>
            </section>

            {{-- video modal --}}
            <section class="fixed inset-0 z-[4] bg-black/60 hidden" id="ifame-container"
                     onclick="hideVideoByThumbnail(this)">
                <div
                    class="w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center"
                    id="ifame-box"></div>
            </section>
        @endif

        @switch($land->styles->contact_type)
            @case(1)
                <x-home_landing.contact.type-one/>
                @break
            @case(2)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-five/>
                @break
            @case(3)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-six/>
                @break
            @case(4)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-four/>
                @break
            @case(5)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-two/>
                @break
            @case(6)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-seven/>
                @break
            @case(7)
                {{-- contact to expert --}}
                <x-home_landing.contact.type-eight/>
                @break
            @default

        @endswitch

    </main>


</x-layout.default.main>
