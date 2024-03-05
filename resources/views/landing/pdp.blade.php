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
        default => null
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

        <x-splade-data default="{ activeTab: 2 }">
            <section class="mb-4">
                {{-- tabs --}}
                <x-pdp_landing.sectionTabs colorPalette="{{ $land->styles->color }}"/>

                {{-- Technical Specifications --}}
                <section class="default_container" v-show="data.activeTab == 1">
                    <ul class="flex flex-col gap-2 text-gray-900">
                        @foreach($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs)
                            <x-splade-data default="{ toggle: false }">
                                <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:pr-16 lg:pl-8 xl:pr-28">
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

                {{-- Further Details --}}
                <section class="default_container" v-show="data.activeTab == 2">
                    <ul class="flex flex-col gap-2 text-gray-900">
                        <x-splade-data default="{ toggle: true }">
                            <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:pr-16 lg:pl-8 xl:pr-28">
                                {{-- title --}}
                                <div class="flex items-center justify-between">
                                    <p class="text-sm lg:text-base font-bold"> بررسی اجمالی </p>
                                    <button type="button" class="cursor-pointer" @click="data.toggle = !data.toggle">
                                        <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="duration-1000 overflow-hidden lg:pr-2"
                                     v-bind:class="data.toggle ? 'max-h-96 pb-4 mt-4' : 'max-h-0 pb-0'">
                                    <div class="text-sm !leading-7 lg:text-base font-normal pb-4 text-justify">
                                        {!! $product->body !!}
                                    </div>
                                </div>
                            </li>
                        </x-splade-data>
                    </ul>
                </section>

                {{-- viewpoint --}}
                <section class="default_container" v-show="data.activeTab == 3">
                    <ul class="flex flex-col gap-7 text-gray-900 mb-4">
                        @foreach($comments as $comment)
                            <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:pr-16 lg:pl-8 xl:pr-28">
                                {{-- user name --}}
                                <p class="block text-sm leading-6 lg:leading-7 lg:text-base font-bold text-[#585d68] mb-3 pb-0.5"> {{ $comment->name }} </p>

                                {{-- user viewpoint --}}
                                <div class="p-4 bg-dark-50 {{ $radiusSize }} flex flex-col gap-2 sm:pr-8 sm:py-5">
                                    <p class="text-sm leading-6 lg:text-base lg:leading-7 text-justify font-normal">
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <button type="button"
                            class="mx-auto text-red-700 text-sm font-bold lg:text-base cursor-pointer block"> مشاهده همه
                        دیدگاه ها
                    </button>
                </section>

                {{-- faq --}}
                <section class="default_container" v-show="data.activeTab == 4">
                    <ul class="flex flex-col gap-7 text-gray-900">
                        <x-splade-data default="{ toggle: false }">
                            <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:pr-16 lg:pl-8 xl:pr-28">
                                {{-- user name --}}
                                <p class="block text-sm leading-6 lg:leading-7 lg:text-base font-bold text-[#585d68] border-b border-[#e7e8e9] mb-3 pb-0.5">
                                    مهران محمودی </p>
                                {{-- user viewpoint --}}
                                <div class="flex justify-between items-start gap-10 sm:px-4">
                                    <div class="flex gap-4">
                                        <svg class="flex-none mt-1.5" width="14" height="14" viewBox="0 0 14 14"
                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7 0C3.13409 0 0 3.07768 0 6.874C0 10.6703 3.13409 13.748 7 13.748C10.8659 13.748 14 10.6703 14 6.874C14 3.07768 10.8659 0 7 0ZM6.29491 4.95866C6.44127 4.67557 6.54945 4.54122 6.63918 4.47123C6.70664 4.41874 6.79827 4.37437 7 4.37437C7.39773 4.37437 7.63636 4.66807 7.63636 4.98553C7.63636 5.15925 7.602 5.24549 7.50782 5.35547C7.37609 5.5092 7.13236 5.69605 6.65 6.00913L6.36364 6.1941V7.49891C6.36364 7.66465 6.43068 7.8236 6.55002 7.94079C6.66936 8.05799 6.83123 8.12382 7 8.12382C7.16877 8.12382 7.33064 8.05799 7.44998 7.94079C7.56932 7.8236 7.63636 7.66465 7.63636 7.49891V6.86338C7.98127 6.62966 8.27082 6.40595 8.48082 6.16098C8.78436 5.80728 8.90909 5.42984 8.90909 4.98553C8.90909 4.06691 8.18809 3.12455 7 3.12455C6.56473 3.12455 6.17973 3.23453 5.84945 3.49137C5.54145 3.73071 5.33145 4.06004 5.15964 4.39436C5.11971 4.46777 5.09512 4.54827 5.0873 4.63113C5.07948 4.714 5.0886 4.79757 5.11412 4.87693C5.13963 4.95628 5.18103 5.02984 5.23589 5.09327C5.29075 5.15671 5.35795 5.20874 5.43356 5.24633C5.50918 5.28391 5.59167 5.30628 5.67621 5.31214C5.76074 5.31799 5.84562 5.3072 5.92585 5.2804C6.00609 5.25361 6.08006 5.21134 6.14344 5.15609C6.20681 5.10084 6.25831 5.03372 6.29491 4.95866ZM7.63636 9.6861C7.63636 9.52036 7.56932 9.36141 7.44998 9.24422C7.33064 9.12703 7.16877 9.06119 7 9.06119C6.83123 9.06119 6.66936 9.12703 6.55002 9.24422C6.43068 9.36141 6.36364 9.52036 6.36364 9.6861V9.99855C6.36364 10.1643 6.43068 10.3232 6.55002 10.4404C6.66936 10.5576 6.83123 10.6235 7 10.6235C7.16877 10.6235 7.33064 10.5576 7.44998 10.4404C7.56932 10.3232 7.63636 10.1643 7.63636 9.99855V9.6861Z"
                                                  fill="#B91C1C"/>
                                        </svg>
                                        <p class="text-normal leading-6 lg:leading-7 text-justify text-sm lg:text-base">
                                            سلام خسته نباشید. قیمت نقدی این محصول چقدره و چند روزه تحویل میدید؟
                                        </p>
                                    </div>
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
                    </ul>
                </section>
            </section>
        </x-splade-data>

        <x-home_landing.videos
            colorPalette="{{ $land->styles->color }}"
            radius="{{ $land->styles->radius }}"
            :data="$land->videos"
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
