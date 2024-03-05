@php
    $radiusSize = match($land->styles->radius."") {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };

    $textStyle = match($land->styles->color."") {
        '1' => 'text-red-700',
        '2' => 'text-blue-700',
        '3' => 'text-rose-700',
        '4' => 'text-zinc-700',
        '5' => 'text-cobalt-700',
        default => 'text-red-700',
    };

@endphp

<x-layout.default.main :land="$land">

    {{-- type 1 --}}
    <main class="pt-4 relative">

        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        {{-- product detail --}}
        <section
            class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 lg:gap-12 xl:gap-16 default_container mb-8 lg:mb-12 xl:mb-16">
            {{-- product images --}}
            <section class="md:flex flex-col gap-3">
                {{-- desktop slider --}}
                <landPdpDesktopSlider radius="{{ $radiusSize }}" name="{{ $product->name }}"
                                      mainImage="{{ $product->image }}" slides="{{ $product }}"/>

                {{-- mobile slider --}}
                <landPdpMobileSlider slides="{{ $product }}"/>
            </section>

            {{-- info --}}
            <x-pdp_landing.information productName="{{ $product->name }}" colorPalette="{{ $land->styles->color }}"
                                       radius="{{ $land->styles->radius }}" :product="$product"/>
        </section>

        <x-splade-data default="{ activeTab: 1 }">
            <section class="mb-8 lg:mb-16">
                {{-- tabs --}}
                <x-pdp_landing.sectionTabs colorPalette="{{ $land->styles->color }}"/>

                {{-- Further Details --}}
                <section class="default_container" v-show="data.activeTab == 1">
                    <ul class="flex flex-col gap-2 text-gray-900">
                        <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:px-8">
                            {{-- title --}}
                            <p class="text-sm lg:text-base font-bold"> بررسی اجمالی </p>

                            <div class="lg:pr-2 pb-4 mt-4">
                                <div class="text-sm !leading-8 lg:text-base font-normal pb-4 text-justify">
                                    {!! $product->body !!}
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>

                {{-- Technical Specifications --}}
                <section class="default_container" v-show="data.activeTab == 2">
                    <ul class="flex flex-col gap-2 text-gray-900">
                        @foreach($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs)
                            <x-splade-data default="{ toggle: {{ $loop->index == 0 ? 'true' : 'false' }} }">
                                <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:px-8">
                                    {{-- title --}}
                                    <div class="flex items-center justify-between cursor-pointer"
                                         @click="data.toggle = !data.toggle">
                                        <p class="text-sm lg:text-base font-bold"> {{ \App\Models\LandAttribute::whereId($key)->first()->name }} </p>
                                        <button type="button" class="cursor-pointer">
                                            <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'"
                                                 width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <ul class="list-inside list-disc marker:text-gray-900 text-sm lg:text-base font-normal flex flex-col gap-2 duration-1000 overflow-hidden lg:pr-2"
                                        v-bind:class="data.toggle ? 'max-h-96 pb-4 mt-4' : 'max-h-0 pb-0'">
                                        @foreach($attrs as $attr)
                                            <li class=""> {{ $attr->name }} : {{ $attr->pivot->value->value }} </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </x-splade-data>
                        @endforeach
                    </ul>
                </section>

                {{-- viewpoint --}}
                <section class="default_container" v-show="data.activeTab == 3">
                    <ul class="flex flex-col gap-7 text-gray-900 mb-4">
                        @foreach($comments as $comment)
                            @if($comments->count() > 0)
                                <x-splade-data default="{ toggle: false }">
                                    <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:px-8">
                                        {{-- user name --}}
                                        <p class="block text-sm leading-6 lg:leading-7 lg:text-base font-bold text-[#585d68] border-b border-[#e7e8e9] mb-3 pb-0.5">
                                            {{ $comment->name }} </p>
                                        {{-- user viewpoint --}}
                                        <div class="flex justify-between items-start gap-10 sm:px-4">
                                            <p class="font-normal leading-6 lg:leading-7 text-justify text-sm lg:text-base">
                                                {{ $comment->comment }}
                                            </p>
                                            <button type="button" class="cursor-pointer mt-1.5"
                                                    @click="data.toggle = !data.toggle">
                                                <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="duration-1000 overflow-hidden bg-gray-100 px-2.5 sm:pr-8 {{ $radiusSize }}"
                                            v-bind:class="data.toggle ? 'max-h-96 py-4 sm:py-5 mt-4' : 'max-h-0 pb-0'">
                                            <div class="flex items-center gap-4 mb-2">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7 11.993C10.866 11.993 14 10.029 14 6.10099C14 2.17299 10.866 0.208984 7 0.208984C3.134 0.208984 0 2.17299 0 6.10099C0 8.22211 0.914 9.77072 2.364 10.7459L2.454 12.868C2.46286 13.0754 2.52945 13.2766 2.64655 13.4495C2.76366 13.6224 2.92678 13.7605 3.11821 13.8488C3.30963 13.9371 3.52203 13.9721 3.73232 13.9502C3.94262 13.9282 4.14276 13.8501 4.311 13.7243L6.633 11.9861C6.755 11.991 6.877 11.993 7 11.993Z"
                                                        fill="#5289FF"/>
                                                </svg>
                                                <p class="font-normal text-sm leading-6 lg:text-base lg:leading-7"> پاسخ : </p>
                                            </div>
                                            <p class="text-sm leading-6 lg:text-base lg:leading-7 text-justify font-normal pr-4 sm:pr-6">
                                                کامیونت 8.5 تن جک یا N721-N85 از تولیدات شرکت جک موتورز چین است که توسط آرین
                                                دیزل مونتاژ و به بازار عرضه می‌شود. این خودرو با داشتن قدرت موتور 155 اسب بخار و
                                                تناژ 8.5 تن برای مسیرهای بین شهری مناسب است. در طی سال‌های اخیر، کامیونت‌های جک
                                                مورد توجه بخش بزرگی از بازار قرار گرفته زیرا این خودروها دارای قدرت بالا و
                                                استهلاک کمی هستند. کامیونت 8.5 تن جک با داشتن جای خواب و صندلی دونفره شاگرد،
                                                مسیر سفر را برای سرنشینان خود هموار می‌کند. برای اطلاعات بیشتر در ادامه با ما
                                                همراه باشید.
                                            </p>
                                        </div>
                                    </li>
                                </x-splade-data>
                            @else
                                <li class="h-40 w-full flex_center text-center text-normal leading-6 lg:leading-7 text-sm lg:text-base">
                                    شما می توانید نظر خود را با ما در میان بگذارید.
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <button type="button"
                            class="mx-auto text-red-700 text-sm font-bold lg:text-base cursor-pointer block"> مشاهده همه
                        دیدگاه ها
                    </button>
                </section>
            </section>
        </x-splade-data>

        <x-home_landing.videos
            showAllBtn="false"
            colorPalette="{{ $land->styles->color }}"
            radius="{{ $land->styles->radius }}"
            :data="$product->videos"
            />

        {{-- add viewpoint --}}
        <x-pdp_landing.addViewpoint
            radius="{{ $land->styles->radius }}"
            colorPalette="{{ $land->styles->color }}"
            :land="$land" :product="$product"
            />

        {{-- pattern --}}
        <x-pdp_landing.pattern classNames="absolute bottom-0 left-0 w-full" aspectRatio="pt-[38%]"/>
    </main>

</x-layout.default.main>
