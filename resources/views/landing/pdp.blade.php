@php
    $radiusSize = match($land->styles->radius) {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };

    // $linkStyle = match($colorPalette) {
    //     '1' => 'bg-white shadow-lg shadow-red-700/50 hover:text-red-800 text-red-700 hover:shadow-red-800/50',
    //     '2' => 'bg-white shadow-lg shadow-blue-700/50 hover:text-blue-800 text-blue-700 hover:shadow-blue-800/50',
    //     '3' => 'bg-white shadow-lg shadow-rose-700/50 hover:text-rose-800 text-rose-700 hover:shadow-rose-800/50',
    //     '4' => 'bg-white shadow-lg shadow-zinc-700/50 hover:text-zinc-800 text-zinc-700 hover:shadow-zinc-800/50',
    //     '5' => 'bg-white shadow-lg shadow-cobalt-700/50 hover:text-cobalt-800 text-cobalt-700 hover:shadow-cobalt-800/50',
    //     default => null
    // };
@endphp

{{-- @dd($product->pictures) --}}
<x-layout.default.main :land="$land">
    <main class="pt-4 relative">

        {{-- breadcrumbs --}}
        <ul class="default_container flex items-center text-[10px] sm:text-xs gap-1.5 text-gray-900 mb-4">
            <li class="flex items-center gap-1.5">
                <a href="#">
                    خانه
                </a>
    
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 17L10 12L15 7" stroke="#111827" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </li>
            <li class="flex items-center gap-1.5">
                <a href="#">
                    محصولات
                </a>
    
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 17L10 12L15 7" stroke="#111827" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </li>
            <li class="flex items-center gap-1.5">
                <a href="#">
                    کامیونت
                </a>
    
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 17L10 12L15 7" stroke="#111827" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </li>
            <li class="">
                    کامیونت 8.5 تن
            </li>
        </ul>

        {{-- product detail --}}
        <section class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 lg:gap-12 xl:gap-16 default_container mb-8 lg:mb-12 xl:mb-16">
            {{-- product images --}}
            <section class="md:flex flex-col gap-3">
                {{-- desktop slider --}}
                <landPdpDesktopSlider radius="{{ $radiusSize }}" name="{{ $product->name }}" mainImage="{{ $product->image }}" slides="{{ $product }}" />
                
                
                {{-- desktop thumbnails --}}
                {{-- <div class="md:grid hidden grid-cols-3 gap-3">
                    @foreach ($product->pictures as $thumbnail)
                        <div class="aspect-square w-full cursor-pointer {{ $radiusSize }}">
                            <img src="{{ $thumbnail }}" alt="thumbnail" class="w-full h-full {{ $radiusSize }} object-cover" />
                        </div>
                    @endforeach
                </div> --}}



                {{-- mobile slider --}}
                <landPdpMobileSlider slides="{{ $product }}" />
            </section>

            {{-- info --}}
            <section class="">
                <p class="hidden md:block text-2xl lg:text-[32px] font-medium text-red-700 mb-8 lg:mb-11 line-clamp-1"> {{ $product->name }} </p>
                {{-- boxes --}}
                <div class="grid grid-cols-3 gap-3 text-sm font-normal mb-4 md:max-w-[524px]">
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> نوع کاربری </p>
                        <p class="text-gray-900 line-clamp-1"> {{ $product->usage }} </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> نوع کابین </p>
                        <p class="text-gray-900 line-clamp-1">  {{ $product->cabin == 0 ? 'بدون خواب' : 'خواب دار' }} </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> تناژ </p>
                        <p class="text-gray-900 line-clamp-1"> {{ $product->tonnage }} </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> تعداد محور چرخ‌ها </p>
                        <p class="text-gray-900 line-clamp-1"> {{ $product->axle == 1 ? 'تک محوره' : ($product->axle == 2 ? 'جفت محوره' : 'سه محوره') }} </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> سال </p>
                        <p class="text-gray-900 line-clamp-1"> {{ $product->year }} </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        {{-- <p class="text-red-700 line-clamp-1"> سیستم ترمز </p>
                        <p class="text-gray-900 line-clamp-1"> کاسه ای </p> --}}
                    </div>
                </div>

                {{-- guide btns --}}
                <div class="flex_center flex-col gap-2 md:max-w-[524px] md:flex-row lg:gap-4 ">
                    <LandBtn to="/" classNames="h-11 w-[254px] bg-white border border-red-700 text-red-700 text-base font-bold flex_center {{ $radiusSize }}" text="دانلود کاتالوگ" />
                    <LandBtn to="/" classNames="h-11 w-[254px] bg-red-700 text-white text-base font-bold flex_center {{ $radiusSize }}" text="مشاوره و خرید" />
                </div>
            </section>
        </section>

        <x-splade-data default="{ activeTab: 2 }">
            <section class="mb-4">
                {{-- tabs --}}
                <div class="overflow-hidden sticky top-16 sm:top-20 mb-4 z-[1] bg-white pt-2 sm:default_container">
                    <div class="overflow-auto flex sm:border-b-2 sm:border-[#e7e8e9] sm:overflow-visible">
                        <ul class="flex-none text-sm lg:text-base sm:gap-12 md:gap-14 lg:gap-10 mx-4 sm:mx-0 font-normal text-gray-900 gap-10 flex items-center border-b-2 border-[#e7e8e9] sm:border-b-0 l_tab_styles">
                            <li class="flex-none lg:pl-4 xl:pl-8 duration-0 lg:py-3 py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:bg-red-700 before:hidden" @click="data.activeTab = 1" v-bind:class="{'active' : data.activeTab == 1 }"> مشخصات فنی </li>
                            <li class="flex-none lg:pl-4 xl:pl-8 duration-0 lg:py-3 py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:bg-red-700 before:hidden" @click="data.activeTab = 2" v-bind:class="{'active' : data.activeTab == 2 }"> توضیحات تکمیلی </li>
                            <li class="flex-none lg:pl-4 xl:pl-8 duration-0 lg:py-3 py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:bg-red-700 before:hidden" @click="data.activeTab = 3" v-bind:class="{'active' : data.activeTab == 3 }"> دیدگاه شما </li>
                            <li class="flex-none lg:pl-4 xl:pl-8 duration-0 lg:py-3 py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:bg-red-700 before:hidden" @click="data.activeTab = 4" v-bind:class="{'active' : data.activeTab == 4 }"> سوالات متداول </li>
                        </ul>
                    </div>
                </div>

                {{-- Technical Specifications --}}
                <section class="default_container" v-show="data.activeTab == 1">
                    <ul class="flex flex-col gap-2 text-gray-900">
                        @foreach($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs)
                            <x-splade-data default="{ toggle: false }">
                                <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:pr-16 lg:pl-8 xl:pr-28">
                                    {{-- title --}}
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm lg:text-base font-bold"> {{ \App\Models\LandAttribute::whereId($key)->first()->name }} </p>
                                        <button type="button" class="cursor-pointer" @click="data.toggle = !data.toggle">
                                            <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <ul class="list-inside list-disc marker:text-gray-900 text-sm lg:text-base font-normal flex flex-col gap-2 duration-1000 overflow-hidden lg:pr-2" v-bind:class="data.toggle ? 'max-h-96 pb-4 mt-4' : 'max-h-0 pb-0'">
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
                                        <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
        
                                <div class="duration-1000 overflow-hidden lg:pr-2" v-bind:class="data.toggle ? 'max-h-96 pb-4 mt-4' : 'max-h-0 pb-0'">
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
                        <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:pr-16 lg:pl-8 xl:pr-28">
                            {{-- user name --}}
                            <p class="block text-sm leading-6 lg:leading-7 lg:text-base font-bold text-[#585d68] mb-3 pb-0.5"> مهران محمودی </p>
                            
                            {{-- user viewpoint --}}
                            <div class="p-4 bg-dark-50 {{ $radiusSize }} flex flex-col gap-2 sm:pr-8 sm:py-5">
                                <p class="text-sm leading-6 lg:text-base lg:leading-7 text-justify font-normal">
                                    کامیونت 8.5 تن جک یا N721-N85 از تولیدات شرکت جک موتورز چین است که توسط آرین دیزل مونتاژ و به بازار عرضه می‌شود. این خودرو با داشتن قدرت موتور 155 اسب بخار و تناژ 8.5 تن برای مسیرهای بین شهری مناسب است. در طی سال‌های اخیر، کامیونت‌های جک مورد توجه بخش بزرگی از بازار قرار گرفته زیرا این خودروها دارای قدرت بالا و استهلاک کمی هستند. کامیونت 8.5 تن جک با داشتن جای خواب و صندلی دونفره شاگرد، مسیر سفر را برای سرنشینان خود هموار می‌کند. برای اطلاعات بیشتر در ادامه با ما همراه باشید.
                                </p>

                                {{-- like & dislike --}}
                                <div class="flex items-center gap-5 justify-end sm:pl-6 text-[#717171]">
                                    <button type="button" class="flex items-center gap-1 cursor-pointer p-1">
                                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.79169 9.9668H5.82198V20.6982H1.79341C1.6816 20.6985 1.57085 20.6766 1.46749 20.634C1.36413 20.5914 1.27019 20.5288 1.19105 20.4498C1.11192 20.3708 1.04913 20.277 1.00629 20.1737C0.963456 20.0705 0.941406 19.9597 0.941406 19.8479V10.8171C0.941406 10.5916 1.03099 10.3753 1.19045 10.2158C1.34991 10.0564 1.56618 9.9668 1.79169 9.9668Z" stroke="current" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.83746 20.7478L7.06317 21.3598C7.53803 21.5964 8.06088 21.7181 8.59231 21.7164H19.7506C20.2231 21.7158 20.6792 21.5427 21.033 21.2295C21.3869 20.9164 21.6142 20.4848 21.6723 20.0158L23.0317 11.2404C23.0731 10.9674 23.056 10.6887 22.9818 10.4227C22.9076 10.1567 22.7779 9.90952 22.6012 9.69733C22.4244 9.48515 22.2048 9.31282 21.9566 9.19171C21.7085 9.07059 21.4374 9.00344 21.1615 8.99468H13.694V4.04554C13.6917 3.79354 13.6389 3.54457 13.5387 3.31331C13.4386 3.08204 13.2932 2.87317 13.111 2.69902C12.9289 2.52486 12.7137 2.38894 12.4782 2.29928C12.2427 2.20962 11.9916 2.16803 11.7397 2.17697C11.4194 2.1736 11.1037 2.25332 10.8234 2.40835C10.5431 2.56338 10.3077 2.78843 10.1403 3.06154L5.82031 9.96668V20.6981" stroke="current" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-sm font-normal"> 0 </p>
                                    </button>
                                    <button type="button" class="flex items-center gap-1 cursor-pointer p-1">
                                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.79169 14.0332H5.82198V3.30177H1.79341C1.6816 3.30155 1.57085 3.32338 1.46749 3.36601C1.36413 3.40864 1.27019 3.47123 1.19105 3.55021C1.11192 3.62919 1.04913 3.723 1.00629 3.82627C0.963456 3.92955 0.941406 4.04025 0.941406 4.15206V13.1829C0.941406 13.4084 1.03099 13.6247 1.19045 13.7842C1.34991 13.9436 1.56618 14.0332 1.79169 14.0332Z" stroke="current" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.83746 3.25218L7.06317 2.64017C7.53803 2.4036 8.06088 2.28189 8.59231 2.2836H19.7506C20.2231 2.2842 20.6792 2.45734 21.033 2.77048C21.3869 3.08363 21.6142 3.51523 21.6723 3.98418L23.0317 12.7596C23.0731 13.0326 23.056 13.3113 22.9818 13.5773C22.9076 13.8433 22.7779 14.0905 22.6012 14.3027C22.4244 14.5149 22.2048 14.6872 21.9566 14.8083C21.7085 14.9294 21.4374 14.9966 21.1615 15.0053H13.694V19.9545C13.6917 20.2065 13.6389 20.4554 13.5387 20.6867C13.4386 20.918 13.2932 21.1268 13.111 21.301C12.9289 21.4751 12.7137 21.6111 12.4782 21.7007C12.2427 21.7904 11.9916 21.832 11.7397 21.823C11.4194 21.8264 11.1037 21.7467 10.8234 21.5916C10.5431 21.4366 10.3077 21.2116 10.1403 20.9385L5.82031 14.0333V3.30189" stroke="current" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-sm font-normal"> 0 </p>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button type="button" class="mx-auto text-red-700 text-sm font-bold lg:text-base cursor-pointer block"> مشاهده همه دیدگاه ها </button>
                </section>

                {{-- faq --}}
                <section class="default_container" v-show="data.activeTab == 4">
                    <ul class="flex flex-col gap-7 text-gray-900">
                        <x-splade-data default="{ toggle: false }">
                            <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:pr-16 lg:pl-8 xl:pr-28">
                                {{-- user name --}}
                                <p class="block text-sm leading-6 lg:leading-7 lg:text-base font-bold text-[#585d68] border-b border-[#e7e8e9] mb-3 pb-0.5"> مهران محمودی </p>
                                {{-- user viewpoint --}}
                                <div class="flex justify-between items-start gap-10 sm:px-4">
                                    <div class="flex gap-4">
                                        <svg class="flex-none mt-1.5" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 0C3.13409 0 0 3.07768 0 6.874C0 10.6703 3.13409 13.748 7 13.748C10.8659 13.748 14 10.6703 14 6.874C14 3.07768 10.8659 0 7 0ZM6.29491 4.95866C6.44127 4.67557 6.54945 4.54122 6.63918 4.47123C6.70664 4.41874 6.79827 4.37437 7 4.37437C7.39773 4.37437 7.63636 4.66807 7.63636 4.98553C7.63636 5.15925 7.602 5.24549 7.50782 5.35547C7.37609 5.5092 7.13236 5.69605 6.65 6.00913L6.36364 6.1941V7.49891C6.36364 7.66465 6.43068 7.8236 6.55002 7.94079C6.66936 8.05799 6.83123 8.12382 7 8.12382C7.16877 8.12382 7.33064 8.05799 7.44998 7.94079C7.56932 7.8236 7.63636 7.66465 7.63636 7.49891V6.86338C7.98127 6.62966 8.27082 6.40595 8.48082 6.16098C8.78436 5.80728 8.90909 5.42984 8.90909 4.98553C8.90909 4.06691 8.18809 3.12455 7 3.12455C6.56473 3.12455 6.17973 3.23453 5.84945 3.49137C5.54145 3.73071 5.33145 4.06004 5.15964 4.39436C5.11971 4.46777 5.09512 4.54827 5.0873 4.63113C5.07948 4.714 5.0886 4.79757 5.11412 4.87693C5.13963 4.95628 5.18103 5.02984 5.23589 5.09327C5.29075 5.15671 5.35795 5.20874 5.43356 5.24633C5.50918 5.28391 5.59167 5.30628 5.67621 5.31214C5.76074 5.31799 5.84562 5.3072 5.92585 5.2804C6.00609 5.25361 6.08006 5.21134 6.14344 5.15609C6.20681 5.10084 6.25831 5.03372 6.29491 4.95866ZM7.63636 9.6861C7.63636 9.52036 7.56932 9.36141 7.44998 9.24422C7.33064 9.12703 7.16877 9.06119 7 9.06119C6.83123 9.06119 6.66936 9.12703 6.55002 9.24422C6.43068 9.36141 6.36364 9.52036 6.36364 9.6861V9.99855C6.36364 10.1643 6.43068 10.3232 6.55002 10.4404C6.66936 10.5576 6.83123 10.6235 7 10.6235C7.16877 10.6235 7.33064 10.5576 7.44998 10.4404C7.56932 10.3232 7.63636 10.1643 7.63636 9.99855V9.6861Z" fill="#B91C1C"/>
                                        </svg>
                                        <p class="text-normal leading-6 lg:leading-7 text-justify text-sm lg:text-base"> 
                                            سلام خسته نباشید. قیمت نقدی این محصول چقدره و چند روزه تحویل میدید؟
                                        </p>
                                    </div>
                                    <button type="button" class="cursor-pointer mt-1.5" @click="data.toggle = !data.toggle">
                                        <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
        
                                <div class="duration-1000 overflow-hidden bg-gray-100 px-2.5 sm:pr-8 {{ $radiusSize }}" v-bind:class="data.toggle ? 'max-h-96 py-4 sm:py-5 mt-4' : 'max-h-0 pb-0'">
                                    <div class="flex items-center gap-4 mb-2">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 11.993C10.866 11.993 14 10.029 14 6.10099C14 2.17299 10.866 0.208984 7 0.208984C3.134 0.208984 0 2.17299 0 6.10099C0 8.22211 0.914 9.77072 2.364 10.7459L2.454 12.868C2.46286 13.0754 2.52945 13.2766 2.64655 13.4495C2.76366 13.6224 2.92678 13.7605 3.11821 13.8488C3.30963 13.9371 3.52203 13.9721 3.73232 13.9502C3.94262 13.9282 4.14276 13.8501 4.311 13.7243L6.633 11.9861C6.755 11.991 6.877 11.993 7 11.993Z" fill="#5289FF"/>
                                        </svg>
                                        <p class="font-normal text-sm leading-6 lg:text-base lg:leading-7"> پاسخ : </p>
                                    </div>
                                    <p class="text-sm leading-6 lg:text-base lg:leading-7 text-justify font-normal pr-4 sm:pr-6">
                                        کامیونت 8.5 تن جک یا N721-N85 از تولیدات شرکت جک موتورز چین است که توسط آرین دیزل مونتاژ و به بازار عرضه می‌شود. این خودرو با داشتن قدرت موتور 155 اسب بخار و تناژ 8.5 تن برای مسیرهای بین شهری مناسب است. در طی سال‌های اخیر، کامیونت‌های جک مورد توجه بخش بزرگی از بازار قرار گرفته زیرا این خودروها دارای قدرت بالا و استهلاک کمی هستند. کامیونت 8.5 تن جک با داشتن جای خواب و صندلی دونفره شاگرد، مسیر سفر را برای سرنشینان خود هموار می‌کند. برای اطلاعات بیشتر در ادامه با ما همراه باشید.
                                    </p>
                                </div>
                            </li>
                        </x-splade-data>
                    </ul>
                </section>
            </section>
        </x-splade-data>

        <x-home_landing.videos colorPalette="{{ $land->styles->color }}" radius="{{ $land->styles->radius }}" :data="$land->videos" />

        {{-- add viewpoint --}}
        <section class="default_container md:mt-16 relative lg:mt-12 z-[1]">
            <div class="md:bg-white md:drop-shadow-base {{ $radiusSize }}">
                <hr class="border-dark-100 mb-4 md:mb-0 md:absolute md:-top-8 md:inset-x-0 lg:-top-6" />
                <div class="md:w-[492px] md:mx-auto md:pt-10">
                    <p class="text-lg font-bold text-gray-900 mb-1.5 md:mb-5"> ثبت دیدگاه </p>
                    <p class="text-sm font-normal text-gray-900 mb-8 md:mb-4"> با وارد کردن مشخصات خوددیدگاهتان را ثبت کنید. </p>
                    {{-- form --}}
                    <section class="drop-shadow-base md:drop-shadow-none bg-white {{ $radiusSize }} md:rounded-none md:bg-transparent pt-6 pb-8 md:pb-11 flex flex-col items-center">
                        <form action="#" id="addComment" class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10 md:gap-y-4 gap-2 w-56 mb-6 md:w-full md:mb-9">
                            <input name="firstName" type="text" class="shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900" placeholder="نام" />
                            <label for="lastName" class="h-12 w-full relative">
                                <input id="lastName" required name="lastName" type="text" class="peer h-full shadow-glass shadow-black/30 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900" placeholder="نام خانوادگی" />
                                <i class="absolute top-2 right-20 text-red-700 peer-valid:hidden">*</i>
                            </label>
                            <input name="phone" type="tel" class="shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl" placeholder="شماره همراه (اختیاری)" />
                            <input name="email" type="email" class="shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl" placeholder="ایمیل (اختیاری)" />
                            <label for="comment" class="w-full relative h-40 md:h-32 md:col-span-2">
                                <textarea required name="comment" class="shadow-glass shadow-black/30 h-full resize-none peer border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900" placeholder="دیدگاه"></textarea>
                                <i class="absolute top-1 right-[52px] text-red-700 peer-valid:hidden">*</i>
                            </label>
                        </form>
                        <button type="submit" form="addComment" class="{{ $radiusSize }} flex_center w-64 h-11 text-white bg-red-700 hover:bg-red-800 focus:bg-red-800 focus:shadow-focus focus:shadow-red-700/50"> ارسال </button>
                    </section>
                </div>
            </div>
        </section>

        {{-- pattern --}}
        <x-pdp_landing.pattern classNames="absolute bottom-0 left-0 w-full" aspectRatio="pt-[38%]" />
    </main>

</x-layout.default.main>