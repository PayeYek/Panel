<x-layout.default.main :land="$land">
{{-- @dd($product) --}}
    {{-- type 1 --}}
    <main class="pt-4 relative mb-8 sm:mb-24 lg:mb-28">

        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        {{-- product detail --}}
        <section
            class="grid grid-cols-1 lg:grid-cols-10 gap-4 lg:gap-10 xl:gap-16 default_container mb-14 lg:mb-12 xl:mb-16">
            <h1 class="lg:hidden text-xl font-medium text-stone-700 mb-5"> {{ $product->name }} </h1>
            {{-- product images --}}
            <section class="lg:flex flex-col gap-3 lg:col-span-6">
                {{-- desktop slider --}}
                <landPdpDesktopSlider name="{{ $product->name }}" mainImage="{{ $product->image }}"
                    slides="{{ $product }}" />

                {{-- mobile slider --}}
                <landPdpMobileSlider slides="{{ $product }}" />
            </section>

            {{-- info --}}
            <x-pdp_landing.information productName="{{ $product->name }}" :product="$product" />
        </section>

        {{-- Further Details --}}
        <section class="default_container mb-20">
            <p
                class="pr-4 relative text-xl mb-7 font-medium text-stone-700 before:top-1/2 before:right-0 before:-translate-y-1/2 before:bg-normal before:h-12 before:w-1 before:rounded-l-custom before:absolute before:content-['']">
                درباره محصول </p>
            <div class="pb-4 text-justify custom_article_styles">
                {!! $product->body !!}
            </div>
        </section>

        {{-- Technical Specifications --}}
        <section class="default_container mb-20">
            <p
                class="pr-4 relative text-xl mb-7 font-medium text-stone-700 before:top-1/2 before:right-0 before:-translate-y-1/2 before:bg-normal before:h-12 before:w-1 before:rounded-l-custom before:absolute before:content-['']">
                مشخصات </p>
            <ul class="flex flex-col gap-2 text-stone-700">
                @foreach ($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs)
                    <x-splade-data default="{ toggle: {{ $loop->index == 0 ? 'true' : 'false' }} }">
                        <li class="p-4 bg-stone-200 rounded-custom lg:px-8">
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
                        </li>
                    </x-splade-data>
                @endforeach
            </ul>
        </section>

        {{-- videos --}}
        <section class="mb-20 relative default_container" id="video-player-container">
            <p
                class="pr-4 relative text-xl mb-7 font-medium text-stone-700 before:top-1/2 before:right-0 before:-translate-y-1/2 before:bg-normal before:h-12 before:w-1 before:rounded-l-custom before:absolute before:content-['']">
                ویدیو </p>
            <x-home_landing.videos :data="$product->videos" />
        </section>

        {{-- video modal --}}
        <section class="fixed inset-0 z-[4] bg-black/60 hidden" id="ifame-container"
            onclick="hideVideoByThumbnail(this)">
            <div class="w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center"
                id="ifame-box"></div>
        </section>

        {{-- viewpoint --}}
        <section class="default_container mb-20">
            <p
                class="pr-4 relative text-xl mb-7 font-medium text-stone-700 before:top-1/2 before:right-0 before:-translate-y-1/2 before:bg-normal before:h-12 before:w-1 before:rounded-l-custom before:absolute before:content-['']">
                دیدگاه </p>
            <ul class="flex flex-col gap-7 text-gray-900">
                @if ($comments->count() > 0)
                    @foreach ($comments as $comment)
                        <li>
                            {{-- user name --}}
                            <p class="block text-base font-medium text-stone-700 mb-1.5"> {{ $comment->name }} </p>

                            {{-- user viewpoint --}}
                            <div class="flex flex-col gap-4 bg-stone-700/5 rounded-custom p-4">
                                <div class="font-normal leading-6 lg:leading-7 text-justify text-sm lg:text-base">
                                    {{ $comment->comment }}
                                </div>

                                {{-- <div class="flex items-center text-sm font-normal justify-end gap-5 text-stone-700">
                                    like
                                    <button type="button" class="flex items-center gap-2">
                                        <svg class="h-5 stroke-current" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.79169 8.9668H5.82198V19.6982H1.79341C1.6816 19.6985 1.57085 19.6766 1.46749 19.634C1.36413 19.5914 1.27019 19.5288 1.19105 19.4498C1.11192 19.3708 1.04913 19.277 1.00629 19.1737C0.963456 19.0705 0.941406 18.9597 0.941406 18.8479V9.81708C0.941406 9.59157 1.03099 9.3753 1.19045 9.21584C1.34991 9.05638 1.56618 8.9668 1.79169 8.9668Z" stroke="current" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.83746 19.7478L7.06317 20.3598C7.53803 20.5964 8.06088 20.7181 8.59231 20.7164H19.7506C20.2231 20.7158 20.6792 20.5427 21.033 20.2295C21.3869 19.9164 21.6142 19.4848 21.6723 19.0158L23.0317 10.2404C23.0731 9.96737 23.056 9.68869 22.9818 9.42272C22.9076 9.15674 22.7779 8.90952 22.6012 8.69733C22.4244 8.48515 22.2048 8.31282 21.9566 8.19171C21.7085 8.07059 21.4374 8.00344 21.1615 7.99468H13.694V3.04554C13.6917 2.79354 13.6389 2.54457 13.5387 2.31331C13.4386 2.08204 13.2932 1.87317 13.111 1.69902C12.9289 1.52486 12.7137 1.38894 12.4782 1.29928C12.2427 1.20962 11.9916 1.16803 11.7397 1.17697C11.4194 1.1736 11.1037 1.25332 10.8234 1.40835C10.5431 1.56338 10.3077 1.78843 10.1403 2.06154L5.82031 8.96668V19.6981" stroke="current" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p> 0 </p>
                                    </button>
                                    dislike
                                    <button type="button" class="flex items-center gap-2">
                                        <svg class="h-5 stroke-current" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.79169 13.0332H5.82198V2.30177H1.79341C1.6816 2.30155 1.57085 2.32338 1.46749 2.36601C1.36413 2.40864 1.27019 2.47123 1.19105 2.55021C1.11192 2.62919 1.04913 2.723 1.00629 2.82627C0.963456 2.92955 0.941406 3.04025 0.941406 3.15206V12.1829C0.941406 12.4084 1.03099 12.6247 1.19045 12.7842C1.34991 12.9436 1.56618 13.0332 1.79169 13.0332Z" stroke="current" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.83746 2.25218L7.06317 1.64017C7.53803 1.4036 8.06088 1.28189 8.59231 1.2836H19.7506C20.2231 1.2842 20.6792 1.45734 21.033 1.77048C21.3869 2.08363 21.6142 2.51523 21.6723 2.98418L23.0317 11.7596C23.0731 12.0326 23.056 12.3113 22.9818 12.5773C22.9076 12.8433 22.7779 13.0905 22.6012 13.3027C22.4244 13.5149 22.2048 13.6872 21.9566 13.8083C21.7085 13.9294 21.4374 13.9966 21.1615 14.0053H13.694V18.9545C13.6917 19.2065 13.6389 19.4554 13.5387 19.6867C13.4386 19.918 13.2932 20.1268 13.111 20.301C12.9289 20.4751 12.7137 20.6111 12.4782 20.7007C12.2427 20.7904 11.9916 20.832 11.7397 20.823C11.4194 20.8264 11.1037 20.7467 10.8234 20.5916C10.5431 20.4366 10.3077 20.2116 10.1403 19.9385L5.82031 13.0333V2.30189" stroke="current" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p> 0 </p>
                                    </button>
                                </div> --}}
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

        {{-- add viewpoint --}}
        <x-pdp_landing.addViewpoint :land="$land" :product="$product" />
    </main>

</x-layout.default.main>
