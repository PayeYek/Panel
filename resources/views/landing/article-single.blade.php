@props([
    'borderType' => '1',
])

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

    $borderType = match($borderType) {
        '1' => 'drop-shadow-base',
        '2' => 'border border-dark-100',
        default => 'drop-shadow-base'
    };
@endphp

<x-layout.default.main :land="$land">
    {{-- type 1 --}}
    <main class="pt-4 relative default_container hidden">
        {{-- breadcrumbs --}}
        {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

        <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
            <h1 class="text-xl leading-8 font-bold"> {{$article->title}} </h1>
            <p class="text-sm font-normal flex-none mt-1"> 12 بهمن 1402 </p>
        </div>

        <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 {{ $radiusSize }} overflow-hidden">
            <img src="{{$article->image}}" alt="{{$article->title}}" class="absolute top-0 left-0 w-full h-full" />
            <div class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent"></div>
        </div>

        {{-- details --}}
        <section class="mb-8 lg:mb-16 custom_article_styles custom_table_striped_container overflow-hidden">
            {!! $article->body !!}
        </section>

        {{-- contact to expert --}}
        <section class="flex flex-col bg-white {{ $borderType }} {{ $radiusSize }} overflow-hidden mb-8 sm:mx-6 md:mx-10 lg:mb-12">
            {{-- title --}}
            <div class="h-20 w-full bg-normal text-white text-xl font-black flex_center">
                <p> ارتباط با کارشناسان فروش </p>
            </div>
            <form action="#" method="#" class="pb-10 pt-6 px-5 flex flex-col items-center">
                <p class="text-base font-normal leading-7 text-normal mb-6"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید. </p>
                <input name="phone" type="tel" class="bg-dark-50 mb-12 w-full max-w-72 h-10 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900" placeholder="09" />
                <button type="submit" class="{{ $radiusSize }} flex_center w-full max-w-72 h-11 text-base font-bold bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal text-white"> ثبت درخواست </button>
            </form>
        </section>

        {{-- articles --}}
        <section class="relative pb-10 sm:pb-0">
            {{-- header --}}
            <div class="flex items-center mb-4 sm:justify-between lg:px-4">
                <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900"> آخرین اخبار و اطلاعیه ها </h3>
                <a href="#" class="items-center absolute bottom-0 sm:static right-4 gap-2 text-base font-normal flex text-normal">
                    <span> مشاهده همه </span>
                    <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                    <div class="relative w-full pt-[62%] mb-2">
                        <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                    </div>
                    {{-- info --}}
                    <div class="px-5 pt-2 pb-4 flex flex-col">
                        <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                        <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3 md:h-[72px]">
                            شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                        </p>
                        <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                            <span> ادامه </span>
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                    stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                    <div class="relative w-full pt-[62%] mb-2">
                        <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                    </div>
                    {{-- info --}}
                    <div class="px-5 pt-2 pb-4 flex flex-col">
                        <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                        <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3 md:h-[72px]">
                            شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                        </p>
                        <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                            <span> ادامه </span>
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                    stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                    <div class="relative w-full pt-[62%] mb-2">
                        <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                    </div>
                    {{-- info --}}
                    <div class="px-5 pt-2 pb-4 flex flex-col">
                        <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                        <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3 md:h-[72px]">
                            شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                        </p>
                        <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                            <span> ادامه </span>
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                    stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
        </section>
    </main>

    {{-- type 2 --}}
    <main class="pt-4 relative default_container hidden">
        {{-- breadcrumbs --}}
        {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

        <section class="flex flex-col lg:flex-row lg:items-start gap-8">
            {{-- description --}}
            <section class="w-full lg:flex-1 order-1 lg:order-2">
                <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                    <h1 class="text-xl leading-8 font-bold"> {{$article->title}} </h1>
                    <p class="text-sm font-normal flex-none mt-1"> 12 بهمن 1402 </p>
                </div>
        
                <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 {{ $radiusSize }} overflow-hidden">
                    <img src="{{$article->image}}" alt="{{$article->title}}" class="absolute top-0 left-0 w-full h-full" />
                    <div class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent"></div>
                </div>
        
                {{-- details --}}
                <section class="mb-8 lg:mb-16 custom_table_striped_container custom_article_styles overflow-hidden">
                    {!! $article->body !!}
                </section>
            </section>

            {{-- left column --}}
            <section class="flex flex-col gap-6 lg:w-72 lg:flex-none order-2 lg:order-1">
                {{-- articles --}}
                <section class="relative pb-10 sm:pb-0 lg:pb-10">
                    {{-- header --}}
                    <div class="flex items-center mb-4 sm:justify-between lg:px-4">
                        <h3 class="text-lg md:text-xl lg:text-lg font-bold text-gray-900"> آخرین اخبار و اطلاعیه ها </h3>
                        <a href="#" class="items-center absolute bottom-0 sm:static lg:absolute right-4 lg:right-auto lg:left-2 gap-2 text-base font-normal flex text-normal">
                            <span> مشاهده همه </span>
                            <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-1 gap-4">
                        <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[62%] mb-2">
                                <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                            </div>
                            {{-- info --}}
                            <div class="px-5 pt-2 pb-4 flex flex-col">
                                <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                                <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                                    شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                                </p>
                                <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                                    <span> ادامه </span>
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                            stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[62%] mb-2">
                                <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                            </div>
                            {{-- info --}}
                            <div class="px-5 pt-2 pb-4 flex flex-col">
                                <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                                <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                                    شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                                </p>
                                <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                                    <span> ادامه </span>
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                            stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[62%] mb-2">
                                <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                            </div>
                            {{-- info --}}
                            <div class="px-5 pt-2 pb-4 flex flex-col">
                                <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                                <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                                    شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                                </p>
                                <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                                    <span> ادامه </span>
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                            stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </section>
                </section>

                {{-- contact to expert --}}
                <section class="flex flex-col bg-white {{ $borderType }} {{ $radiusSize }} overflow-hidden sm:mx-6 md:mx-10 lg:mx-0">
                    {{-- title --}}
                    <div class="h-20 w-full bg-normal text-white text-xl font-black flex_center">
                        <p> ارتباط با کارشناسان فروش </p>
                    </div>
                    <form action="#" method="#" class="pb-10 pt-6 px-5 flex flex-col items-center">
                        <p class="text-base font-normal leading-7 text-normal mb-6"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید. </p>
                        <input name="phone" type="tel" class="bg-dark-50 mb-12 h-10 w-full max-w-72 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900" placeholder="09" />
                        <button type="submit" class="{{ $radiusSize }} flex_center w-full max-w-72 h-11 text-base font-bold bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal text-white"> ثبت درخواست </button>
                    </form>
                </section>
            </section>
        </section>
    </main>


    {{-- type 3 --}}
    <main class="pt-4 relative default_container hidden">
        {{-- breadcrumbs --}}
        {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

        <section class="flex flex-col lg:flex-row lg:items-start gap-8">
            {{-- description --}}
            <section class="w-full lg:flex-1">
                <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                    <h1 class="text-xl leading-8 font-bold"> {{$article->title}} </h1>
                    <p class="text-sm font-normal flex-none mt-1"> 12 بهمن 1402 </p>
                </div>
        
                <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 {{ $radiusSize }} overflow-hidden">
                    <img src="{{$article->image}}" alt="{{$article->title}}" class="absolute top-0 left-0 w-full h-full" />
                    <div class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent"></div>
                </div>
        
                {{-- details --}}
                <section class="mb-8 lg:mb-0 custom_table_striped_container custom_article_styles overflow-hidden">
                    {!! $article->body !!}
                </section>
            </section>

            {{-- left column --}}
            <section class="flex flex-col gap-6 lg:w-72 lg:flex-none">
                {{-- articles --}}
                <section class="relative pb-10 sm:pb-0 lg:pb-10">
                    {{-- header --}}
                    <div class="flex items-center mb-4 sm:justify-between lg:px-4">
                        <h3 class="text-lg md:text-xl lg:text-lg font-bold text-gray-900"> آخرین اخبار و اطلاعیه ها </h3>
                        <a href="#" class="items-center absolute bottom-0 sm:static lg:absolute right-4 lg:right-auto lg:left-2 gap-2 text-base font-normal flex text-normal">
                            <span> مشاهده همه </span>
                            <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-1 gap-4">
                        <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[62%] mb-2">
                                <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                            </div>
                            {{-- info --}}
                            <div class="px-5 pt-2 pb-4 flex flex-col">
                                <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                                <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                                    شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                                </p>
                                <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                                    <span> ادامه </span>
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                            stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[62%] mb-2">
                                <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                            </div>
                            {{-- info --}}
                            <div class="px-5 pt-2 pb-4 flex flex-col">
                                <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                                <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                                    شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                                </p>
                                <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                                    <span> ادامه </span>
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                            stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[62%] mb-2">
                                <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                            </div>
                            {{-- info --}}
                            <div class="px-5 pt-2 pb-4 flex flex-col">
                                <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                                <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                                    شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                                </p>
                                <a href="#" class="items-center gap-3 text-sm font-bold flex text-normal mr-auto pb-2 pt-1">
                                    <span> ادامه </span>
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                                            stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </section>
                </section>

                {{-- contact to expert --}}
                <section class="flex flex-col bg-normal {{ $borderType }} {{ $radiusSize }} overflow-hidden sm:mx-6 md:mx-10 lg:mx-0">
                    {{-- title --}}
                    <div class="h-20 w-full text-white text-xl font-black flex_center">
                        <p> ارتباط با کارشناسان فروش </p>
                    </div>
                    <form action="#" method="#" class="pb-10 pt-6 px-5 flex flex-col items-center">
                        <p class="text-base font-normal leading-7 text-white mb-6"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید. </p>
                        <input name="phone" type="tel" class="bg-white mb-12 h-10 w-full max-w-72 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900" placeholder="09" />
                        <button type="submit" class="{{ $radiusSize }} flex_center w-full max-w-72 h-11 text-base font-bold border border-white text-white"> ثبت درخواست </button>
                    </form>
                </section>
            </section>
        </section>
    </main>

    {{-- type 4 --}}
    <main class="pt-4 relative default_container hidden">
        {{-- breadcrumbs --}}
        {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

        <section class="flex flex-col lg:flex-row lg:items-start gap-8">
            {{-- description --}}
            <section class="w-full lg:flex-1 order-1 lg:order-2">
                <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                    <h1 class="text-xl leading-8 font-bold"> {{$article->title}} </h1>
                    <p class="text-sm font-normal flex-none mt-1"> 12 بهمن 1402 </p>
                </div>
        
                <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 {{ $radiusSize }} overflow-hidden">
                    <img src="{{$article->image}}" alt="{{$article->title}}" class="absolute top-0 left-0 w-full h-full" />
                    <div class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent"></div>
                </div>
        
                {{-- details --}}
                <section class="mb-8 lg:mb-0 custom_table_striped_container custom_article_styles overflow-hidden">
                    {!! $article->body !!}
                </section>
            </section>

            {{-- right column --}}
            <section class="flex flex-col gap-6 lg:gap-8 lg:w-72 lg:flex-none order-2 lg:order-1">
                {{-- articles --}}
                <section class="relative">
                    {{-- header --}}
                    <div class="flex_center mb-4 lg:mb-3 h-20 w-full bg-normal {{ $radiusSize }}">
                        <h3 class="text-xl font-black text-white"> فهرست آخرین اخبار و اطلاعیه ها </h3>
                    </div>
                    {{-- next & prev news btn --}}
                    <div class="w-full text-sm font-normal text-gray-900 h-12 lg:h-8 mb-4 lg:mb-3 {{ $radiusSize }} bg-white {{ $borderType }} px-4 flex items-center justify-between">
                        {{-- prev --}}
                        <a href="#" class="flex items-center gap-2">
                            <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                <path d="M9 7L14 12L9 17" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                            <p> قبلی </p>
                        </a>
                        {{-- next --}}
                        <a href="#" class="flex items-center gap-2">
                            <p> بعدی </p>
                            <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    {{-- more articles --}}
                    <section class="flex flex-col gap-4">
                        <a href="#" class="grid grid-cols-10 bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                            <div class="relative w-full pt-[62%] col-span-4">
                                <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                            </div>
                            {{-- info --}}
                            <div class="px-5 pt-2 pb-4 flex flex-col col-span-6 bg-dark-50 p-2 sm:pr-4 sm:py-4 sm:pl-6 lg:py-3 lg:pr-3 lg:pl-2">
                                <p class="text-base font-normal text-gray-900 sm:text-justify lg:text-right line-clamp-1 sm:line-clamp-2 lg:line-clamp-1 lg:mb-3 mb-3 sm:mb-4"> جهت مشاهده مشخصات فنی، ویدیو، تصاویر، نمای ۳۶۰ درجه، بروشور و لیست قیمت ها روی دکمه زیر کلیک کنید: </p>
                                <p class="text-xs font-normal text-normal line-clamp-1"> 25 فروردین 1402 </p>
                            </div>
                        </a>
                    </section>
                </section>

                {{-- contact to expert --}}
                <section class="flex flex-col bg-white {{ $borderType }} {{ $radiusSize }} overflow-hidden mb-8 sm:mx-6 md:mx-10 lg:mx-0 lg:mb-0">
                    {{-- title --}}
                    <div class="h-20 w-full bg-normal text-white text-xl font-black flex_center">
                        <p> ارتباط با کارشناسان فروش </p>
                    </div>
                    <form action="#" method="#" class="pb-10 pt-6 px-5 flex flex-col items-center">
                        <p class="text-base font-normal leading-7 text-normal mb-6"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید. </p>
                        <input name="phone" type="tel" class="bg-dark-50 mb-12 w-full max-w-72 h-10 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900" placeholder="09" />
                        <button type="submit" class="{{ $radiusSize }} flex_center w-full max-w-72 h-11 text-base font-bold bg-normal text-white"> ثبت درخواست </button>
                    </form>
                </section>
            </section>
        </section>
    </main>

    {{-- type 5 --}}
    <main class="pt-4 relative default_container">
        {{-- breadcrumbs --}}
        {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

        <section class="flex flex-col lg:flex-row lg:items-start gap-8">
            {{-- description --}}
            <section class="w-full lg:flex-1 order-1 lg:order-2">
                <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 text-normal">
                    <h1 class="text-xl leading-8 font-bold"> {{$article->title}} </h1>
                    <p class="text-sm font-normal flex-none mt-1"> 12 بهمن 1402 </p>
                </div>
        
                <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 {{ $radiusSize }} overflow-hidden">
                    <img src="{{$article->image}}" alt="{{$article->title}}" class="absolute top-0 left-0 w-full h-full" />
                    <div class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent"></div>
                </div>
        
                {{-- details --}}
                <section class="mb-8 lg:mb-16 custom_table_striped_container custom_article_styles overflow-hidden">
                    {!! $article->body !!}
                </section>

                {{-- contact to expert --}}
                <section class="flex flex-col bg-normal pb-12 pt-8 {{ $borderType }} {{ $radiusSize }} mb-8 sm:mx-6 md:mx-10 lg:mx-12 lg:mb-0">
                    {{-- title --}}
                    <div class="w-full text-white mb-4 text-xl font-black flex_center">
                        <p> ارتباط با کارشناسان فروش </p>
                    </div>
                    <form action="#" method="#" class="px-5 flex flex-col items-center">
                        <p class="text-base font-normal leading-7 text-white mb-6"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید. </p>
                        <input name="phone" type="tel" class="bg-dark-50 mb-6 w-full max-w-72 h-10 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900" placeholder="09" />
                        <button type="submit" class="{{ $radiusSize }} flex_center w-full max-w-72 h-11 text-base font-bold border border-white text-white"> ثبت درخواست </button>
                    </form>
                </section>
            </section>

            {{-- right column --}}
            <section class="flex flex-col lg:w-72 lg:flex-none order-2 lg:order-1 lg:pt-12">
                {{-- search --}}
                <form action="#" class="h-10 relative mb-3.5 max-w-96 w-full mr-auto lg:mr-0 lg:max-w-full">
                    <input type="text" class="w-full h-full {{ $radiusSize }} border border-gray-900 text-gray-900 focus:ring-0 outline-none pl-10 pr-2 placeholder:text-[#888b93] text-sm font-normal focus:border-gray-900" placeholder="جستجوی عنوان" />
                    <button type="submit" class="absolute top-2 left-2 cursor-pointer">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.9284 17.0416L20.4016 20.4016M19.2816 11.4416C19.2816 15.7715 15.7715 19.2816 11.4416 19.2816C7.11165 19.2816 3.60156 15.7715 3.60156 11.4416C3.60156 7.11165 7.11165 3.60156 11.4416 3.60156C15.7715 3.60156 19.2816 7.11165 19.2816 11.4416Z" stroke="#111827" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </form>
                {{-- next & prev news btn --}}
                <div class="w-full text-sm font-normal text-gray-900 h-12 lg:h-8 mb-3 px-4 flex items-center justify-between">
                    {{-- prev --}}
                    <a href="#" class="flex items-center gap-2">
                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.5">
                            <path d="M9 7L14 12L9 17" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                        <p> قبلی </p>
                    </a>
                    {{-- next --}}
                    <a href="#" class="flex items-center gap-2">
                        <p> بعدی </p>
                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                {{-- more articles --}}
                <section class="flex flex-col gap-4">
                    <a href="#" class="grid grid-cols-10 bg-white w-full {{ $radiusSize }} overflow-hidden {{ $borderType }}">
                        <div class="relative w-full pt-[62%] col-span-4 border-l border-l-dark-100">
                            <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                        </div>
                        {{-- info --}}
                        <div class="px-5 pt-2 pb-4 flex flex-col col-span-6 p-2 sm:pr-4 sm:py-4 sm:pl-6 lg:py-3 lg:pr-3 lg:pl-2">
                            <p class="text-base font-normal text-gray-900 sm:text-justify lg:text-right line-clamp-1 sm:line-clamp-2 lg:line-clamp-1 lg:mb-3 mb-3 sm:mb-4"> جهت مشاهده مشخصات فنی، ویدیو، تصاویر، نمای ۳۶۰ درجه، بروشور و لیست قیمت ها روی دکمه زیر کلیک کنید: </p>
                            <p class="text-xs font-normal text-normal line-clamp-1"> 25 فروردین 1402 </p>
                        </div>
                    </a>
                </section>
            </section>
        </section>
    </main>

</x-layout.default.main>
