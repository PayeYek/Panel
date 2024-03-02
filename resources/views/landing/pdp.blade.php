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

{{-- @dd($product->toArray()) --}}
<x-layout.default.main :land="$land">
    <main class="pt-4">
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
                <div class="w-full pt-[100%] relative">
                    <div class="absolute inset-0">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover {{ $radiusSize }}" />
                    </div>
                </div>

                {{-- image thumbnails --}}
                <div class="md:grid hidden grid-cols-3 gap-3">
                    <div class="aspect-square w-full cursor-pointer bg-gray-300 {{ $radiusSize }}">
                        <img src="/" alt="thumbnail" class="w-full h-full {{ $radiusSize }} object-cover" />
                    </div>
                    <div class="aspect-square w-full cursor-pointer bg-gray-300 {{ $radiusSize }}">
                        <img src="/" alt="thumbnail" class="w-full h-full {{ $radiusSize }} object-cover" />
                    </div>
                    <div class="aspect-square w-full cursor-pointer bg-gray-300 {{ $radiusSize }}">
                        <img src="/" alt="thumbnail" class="w-full h-full {{ $radiusSize }} object-cover" />
                    </div>
                </div>
            </section>

            {{-- info --}}
            <section class="">
                <p class="hidden md:block text-2xl lg:text-[32px] font-medium text-red-700 mb-8 lg:mb-11 line-clamp-1"> {{ $product->name }} </p>
                {{-- boxes --}}
                <div class="grid grid-cols-3 gap-3 text-sm font-normal mb-4 md:max-w-[524px]">
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> سیستم ترمز </p>
                        <p class="text-gray-900 line-clamp-1"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> سیستم ترمز </p>
                        <p class="text-gray-900 line-clamp-1"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> سیستم ترمز </p>
                        <p class="text-gray-900 line-clamp-1"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> سیستم ترمز </p>
                        <p class="text-gray-900 line-clamp-1"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> سیستم ترمز </p>
                        <p class="text-gray-900 line-clamp-1"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700 line-clamp-1"> سیستم ترمز </p>
                        <p class="text-gray-900 line-clamp-1"> کاسه ای </p>
                    </div>
                </div>

                {{-- guide btns --}}
                <div class="flex_center flex-col gap-2 md:max-w-[524px] md:flex-row lg:gap-4 ">
                    <LandBtn to="/" classNames="h-11 w-[254px] bg-white border border-red-700 text-red-700 text-base font-bold flex_center {{ $radiusSize }}" text="دانلود کاتالوگ" />
                    <LandBtn to="/" classNames="h-11 w-[254px] bg-red-700 text-white text-base font-bold flex_center {{ $radiusSize }}" text="مشاوره و خرید" />
                </div>
            </section>
        </section>

        <x-splade-data default="{ activeTab: 1 }">
            <section class="mb-4">
                {{-- tabs --}}
                <div class="overflow-hidden sticky top-16 lg:top-20 mb-4 z-[1] bg-white pt-2 sm:default_container">
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
                        <x-pdp.TechnicalSpecifications radius="{{ $radiusSize }}" />
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
                                    <p class="text-sm lg:text-base font-normal pb-4">
                                        در سال 1402  قدرتمندترین کامیون کمپرسی جفت
                                        محور‌ بازار با نام شکموتو ایکس 5000D با قدرت موتور 450 اسب بخار رونمایی شد و توجه بسیاری را به خود جلب کرد. این خودرو طراحی داخلی منحصر به فردی دارد و با وجود یک تخت خواب، راحتی را برای سرنشین خود تضمین می‌کند.
            
                                         SHACMOTO
                                        X5000-D با قابلیت کروز کنترل و فرمان چندمنظوره به
                                            راحتی رقبای خود را کنار می‌زند. در کنار تمام این مزایا، این خودرو با داشتن
                                            سیستم آلایندگی EURO 5 EEV به
                                        کاهش آلودگی هوا نیز کمک می‌کند. از دیگر امکانات این خودروی 26 تنی می‌توان به دوربین 360 درجه و سقف شیشه‌ای اشاره کرد. در ادامه اطلاعات تکمیلی این
                                        کامیون بی‌نظیر را بخوانید.
                                    </p>
                                </div>
                            </li>
                        </x-splade-data>
                    </ul>
                </section>
        
                {{-- viewpoint --}}
                <section class="default_container" v-show="data.activeTab == 3">
                    <ul class="flex flex-col gap-7 text-gray-900 mb-4">
                        <x-splade-data default="{ toggle: false }">
                            <li class="p-4 drop-shadow-base bg-white {{ $radiusSize }} lg:pr-16 lg:pl-8 xl:pr-28">
                                {{-- user name --}}
                                <p class="block text-sm leading-6 lg:leading-7 lg:text-base font-bold text-[#585d68] border-b border-[#e7e8e9] mb-3 pb-0.5"> مهران محمودی </p>
                                {{-- user viewpoint --}}
                                <div class="flex items-center justify-between gap-10">
                                    <p class="text-normal leading-6 lg:leading-7 text-justify text-sm lg:text-base"> 
                                        سلام خسته نباشید. قیمت نقدی این محصول چقدره و چند روزه تحویل میدید؟
                                    </p>
                                    <button type="button" class="cursor-pointer" @click="data.toggle = !data.toggle">
                                        <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
        
                                <div class="duration-1000 overflow-hidden lg:pr-2" v-bind:class="data.toggle ? 'max-h-96 pb-4 mt-4' : 'max-h-0 pb-0'">
                                    <p class="text-sm leading-6 lg:text-base lg:leading-7 text-justify font-normal pb-4 bg-gray-100 py-2 px-2.5 {{ $radiusSize }}">
                                        کامیونت 8.5 تن جک یا N721-N85 از تولیدات شرکت جک موتورز چین است که توسط آرین دیزل مونتاژ و به بازار عرضه می‌شود. این خودرو با داشتن قدرت موتور 155 اسب بخار و تناژ 8.5 تن برای مسیرهای بین شهری مناسب است. در طی سال‌های اخیر، کامیونت‌های جک مورد توجه بخش بزرگی از بازار قرار گرفته زیرا این خودروها دارای قدرت بالا و استهلاک کمی هستند. کامیونت 8.5 تن جک با داشتن جای خواب و صندلی دونفره شاگرد، مسیر سفر را برای سرنشینان خود هموار می‌کند. برای اطلاعات بیشتر در ادامه با ما همراه باشید.
                                    </p>
                                </div>
                            </li>
                        </x-splade-data>
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
                                <div class="flex items-center justify-between gap-10">
                                    <p class="text-normal leading-6 lg:leading-7 text-justify text-sm lg:text-base"> 
                                        سلام خسته نباشید. قیمت نقدی این محصول چقدره و چند روزه تحویل میدید؟
                                    </p>
                                    <button type="button" class="cursor-pointer" @click="data.toggle = !data.toggle">
                                        <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
        
                                <div class="duration-1000 overflow-hidden lg:pr-2" v-bind:class="data.toggle ? 'max-h-96 pb-4 mt-4' : 'max-h-0 pb-0'">
                                    <p class="text-sm leading-6 lg:text-base lg:leading-7 text-justify font-normal pb-4 bg-gray-100 py-2 px-2.5 {{ $radiusSize }}">
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
    </main>

</x-layout.default.main>