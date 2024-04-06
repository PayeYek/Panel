<x-layout.default.main :land="$land">
    {{-- mb-8 sm:mb-24 lg:mb-28 --}}
    <main class="">
        {{-- slider --}}
        @if ($land->slides)
            <Slider :slides="{{ $land->slides }}" :sliderType="{{ $land->styles->land_id }}" />
        @endif

        <section class="default_container">
            @switch($land->styles->land_id)
                @case(1)
                    <section
                        class="grid grid-cols-1 sm:grid-cols-2 mb-12 gap-4 lg:gap-5 lg:rounded-none lg:*:rounded-custom *:rounded-custom sm:*:rounded-none sm:rounded-custom sm:overflow-hidden sm:gap-0 *:bg-[#f5f5f5] *:flex_center *:flex-col *:text-stone-700">
                        {{-- branches --}}
                        <Link href="{{ route('landing.sales', ['page' => $land->slug]) }}" class="h-40">
                            <svg class="size-8 stroke-normal mb-3" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16 17.334C18.2091 17.334 20 15.5431 20 13.334C20 11.1248 18.2091 9.33398 16 9.33398C13.7909 9.33398 12 11.1248 12 13.334C12 15.5431 13.7909 17.334 16 17.334Z"
                                    stroke="current" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M15.9987 2.66699C13.1697 2.66699 10.4566 3.7908 8.45623 5.79119C6.45584 7.79157 5.33203 10.5047 5.33203 13.3337C5.33203 15.8563 5.86803 17.507 7.33203 19.3337L15.9987 29.3337L24.6654 19.3337C26.1294 17.507 26.6654 15.8563 26.6654 13.3337C26.6654 10.5047 25.5416 7.79157 23.5412 5.79119C21.5408 3.7908 18.8277 2.66699 15.9987 2.66699Z"
                                    stroke="current" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-center text-lg font-medium mb-0.5"> لیست نمایندگی ها </p>
                            <p class="text-center text-sm font-normal"> نمایش لیست نماینده ها </p>
                        </Link>
                        {{-- terms of sale --}}
                        <Link href="{{ route('landing.article.list', ['page' => $land->slug]) }}" class="h-40">
                            <svg class="size-8 fill-normal mb-3" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.5 3C1.66875 3 1 3.66875 1 4.5V7.5C1 8.33125 1.66875 9 2.5 9H5.5C6.33125 9 7 8.33125 7 7.5V4.5C7 3.66875 6.33125 3 5.5 3H2.5ZM12 4C10.8938 4 10 4.89375 10 6C10 7.10625 10.8938 8 12 8H30C31.1063 8 32 7.10625 32 6C32 4.89375 31.1063 4 30 4H12ZM12 14C10.8938 14 10 14.8938 10 16C10 17.1062 10.8938 18 12 18H30C31.1063 18 32 17.1062 32 16C32 14.8938 31.1063 14 30 14H12ZM12 24C10.8938 24 10 24.8937 10 26C10 27.1063 10.8938 28 12 28H30C31.1063 28 32 27.1063 32 26C32 24.8937 31.1063 24 30 24H12ZM1 14.5V17.5C1 18.3313 1.66875 19 2.5 19H5.5C6.33125 19 7 18.3313 7 17.5V14.5C7 13.6687 6.33125 13 5.5 13H2.5C1.66875 13 1 13.6687 1 14.5ZM2.5 23C1.66875 23 1 23.6688 1 24.5V27.5C1 28.3312 1.66875 29 2.5 29H5.5C6.33125 29 7 28.3312 7 27.5V24.5C7 23.6688 6.33125 23 5.5 23H2.5Z"
                                    fill="current" />
                            </svg>
                            <p class="text-center text-lg font-medium mb-0.5"> شرایط فروش </p>
                            <p class="text-center text-sm font-normal"> نمایش آخرین شرایط فروش آرین دیزل </p>
                        </Link>
                    </section>
                    @break
                @case(2)
                    <section class="grid grid-cols-1 sm:grid-cols-3 gap-4 *:h-20 sm:*:h-32 sm:*:flex-col sm:*:justify-center sm:*:gap-4 md:*:h-36 lg:*:h-40 *:w-full *:rounded-custom *:bg-stone-200 *:flex *:items-center *:gap-5 *:px-4 text-sm lg:text-base font-medium text-stone-700 mb-4 md:mb-8 lg:mb-12">
                        <Link href="{{ route('landing.product.list', ['page' => $land->slug]) }}" class="w-full">
                            <img src="http://127.0.0.1:8000/storage/media/land/files/PeXC7isWCxB61sIFymVIIJ52TGmSEUsLDLBXs9Pg.png" alt="دسته بندی محصولات" class="w-24 object-cover h-16" />
                            <p> دسته بندی محصولات </p>
                        </Link>
                        <Link href="{{ route('landing.article.list', ['page' => $land->slug, 'f' => 'news']) }}" class="w-full">
                            <img src="http://127.0.0.1:8000/storage/media/land/files/akLbg6Xe3QA6cETaO8stmxkFJxUWukl8koB3WDgb.png" alt="آخرین اخبار" class="w-24 object-cover h-16" />
                            <p> آخرین اخبار </p>
                        </Link>
                        <Link href="{{ route('landing.article.list', ['page' => $land->slug, 'f' => 'sell']) }}" class="w-full">
                            <img src="http://127.0.0.1:8000/storage/media/land/files/G4P7QGDVXU1H9wmctqzIht4DM1denuxG2bY58HRF.png" alt="شرایط فروش" class="w-24 object-cover h-16" />
                            <p> شرایط فروش </p>
                        </Link>
                    </section>
                    @break
                @case(6)
                    <section class="flex flex-col sm:flex-row items-center gap-4 text-stone-700 mb-8 lg:mb-14">
                        <section class="group w-full prespective drop-shadow-base">
                            <section class="bg-white rounded-custom h-40 sm:h-36 lg:h-44 relative w-full prespective-3d group-hover:rotateY-180 duration-300">
                                <div class="flex flex-col justify-center h-full gap-4 px-8 lg:px-10 rounded-custom border-r-4 lg:border-r-8 border-r-normal absolute top-0 right-0 w-full backface-hidden">
                                    <p class="text-lg font-medium lg:text-2xl"> دسته بندی محصولات </p>
                                    <p class="text-sm leading-6 font-normal lg:text-base line-clamp-2"> گارانتی ماشین های کاریزان گارانتی ماشین های کاریزان </p>
                                </div>
    
                                <div class="absolute top-0 right-0 w-full h-full rounded-custom drop-shadow-base bg-no-repeat bg-cover overflow-hidden bg-center bg-[url('https://paye1.com/storage/media/land/files/COzYlN8cuGnSowm5hVgg9XeiXGVbd2YQpbuWrVYv.png')] rotateY-180 backface-hidden">
                                    <div class="w-full h-full flex_center bg-gradient-to-t from-black/80 to-transparent">
                                        <Link href="{{ route('landing.product.list', ['page' => $land->slug]) }}" class="h-11 w-44 flex_center border border-white rounded-custom text-lg font-medium text-white bg-transparent hover:bg-black/20"> بیشتر بخوانید </Link>
                                    </div>
                                </div>
                            </section>
                        </section>
                        <section class="group w-full prespective drop-shadow-base">
                            <section class="bg-white rounded-custom h-40 sm:h-36 lg:h-44 relative w-full prespective-3d group-hover:rotateY-180 duration-300">
                                <div class="flex flex-col justify-center h-full gap-4 px-8 lg:px-10 rounded-custom border-r-4 lg:border-r-8 border-r-normal absolute top-0 right-0 w-full backface-hidden">
                                    <p class="text-lg font-medium lg:text-2xl"> شرایط فروش </p>
                                    <p class="text-sm leading-6 font-normal lg:text-base line-clamp-2"> گارانتی ماشین های کاریزان گارانتی ماشین های کاریزان </p>
                                </div>
    
                                <div class="absolute top-0 right-0 w-full h-full rounded-custom drop-shadow-base bg-no-repeat bg-cover overflow-hidden bg-center bg-[url('https://paye1.com/storage/media/land/files/bzLctE71e9mTL0hsv9YVqW8S7EzwuiNFVVSqrYoQ.png')] rotateY-180 backface-hidden">
                                    <div class="w-full h-full flex_center bg-gradient-to-t from-black/80 to-transparent">
                                        <Link href="{{ route('landing.article.list', ['page' => $land->slug, 'f' => 'sell']) }}" class="h-11 w-44 flex_center border border-white rounded-custom text-lg font-medium text-white bg-transparent hover:bg-black/20"> بیشتر بخوانید </Link>
                                    </div>
                                </div>
                            </section>
                        </section>
                        <section class="group w-full prespective drop-shadow-base">
                            <section class="bg-white rounded-custom h-40 sm:h-36 lg:h-44 relative w-full prespective-3d group-hover:rotateY-180 duration-300">
                                <div class="flex flex-col justify-center h-full gap-4 px-8 lg:px-10 rounded-custom border-r-4 lg:border-r-8 border-r-normal absolute top-0 right-0 w-full backface-hidden">
                                    <p class="text-lg font-medium lg:text-2xl"> اخبار و مقالات </p>
                                    <p class="text-sm leading-6 font-normal lg:text-base line-clamp-2"> گارانتی ماشین های کاریزان گارانتی ماشین های کاریزان </p>
                                </div>
    
                                <div class="absolute top-0 right-0 w-full h-full rounded-custom drop-shadow-base bg-no-repeat bg-cover overflow-hidden bg-center bg-[url('https://paye1.com/storage/media/land/files/QGAIVeIQZrUU3JFFaZ80fgMGHbfjojQfF5Si7Tqp.png')] rotateY-180 backface-hidden">
                                    <div class="w-full h-full flex_center bg-gradient-to-t from-black/80 to-transparent">
                                        <Link href="{{ route('landing.article.list', ['page' => $land->slug, 'f' => 'news']) }}" class="h-11 w-44 flex_center border border-white rounded-custom text-lg font-medium text-white bg-transparent hover:bg-black/20"> بیشتر بخوانید </Link>
                                    </div>
                                </div>
                            </section>
                        </section>
                    </section>
                    @break
                @case(7)
                    <section class="*:h-20 sm:*:h-32 flex flex-col md:flex-row items-center md:*:flex-1 *:justify-center rounded-custom bg-stone-200 *:flex *:items-center text-xl md:text-2xl lg:text-3xl font-normal lg:font-medium text-stone-700 mb-4 md:mb-8 lg:mb-12">
                        <Link href="{{ route('landing.product.list', ['page' => $land->slug]) }}" class="relative before:bottom-0 before:left-1/2 before:w-32 before:-translate-x-1/2 before:h-px before:bg-stone-400 before:absolute before:content-[''] md:before:left-0 md:before:bottom-1/2 md:before:w-px md:before:h-14 md:before:translate-x-0 md:before:translate-y-1/2">
                            <p> دسته بندی محصولات </p>
                        </Link>
                        <Link href="{{ route('landing.article.list', ['page' => $land->slug, 'f' => 'sell']) }}" class="relative before:bottom-0 before:left-1/2 before:w-32 before:-translate-x-1/2 before:h-px before:bg-stone-400 before:absolute before:content-[''] md:before:left-0 md:before:bottom-1/2 md:before:w-px md:before:h-14 md:before:translate-x-0 md:before:translate-y-1/2">
                            <p> طرح های ویژه </p>
                        </Link>
                        <Link href="{{ route('landing.article.list', ['page' => $land->slug, 'f' => 'news']) }}" class="">
                            <p> آخرین اخبار </p>
                        </Link>
                    </section>
                    @break
                @default
                    
            @endswitch
        </section>

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

        @switch($land->styles->land_id)
            @case(1)
                {{-- quick access --}}
                <x-home_landing.quickaccess :landSlug="$land->slug" classnames="mb-8 sm:mb-24 lg:mb-28" />
                @break
            @case(2)
                <x-home_landing.contact.type-one />
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
