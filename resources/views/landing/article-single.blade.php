@php
    $textStyle = match($land->styles->color."") {
        '1' => 'text-red-700',
        '2' => 'text-blue-700',
        '3' => 'text-rose-700',
        '4' => 'text-zinc-700',
        '5' => 'text-cobalt-700',
        default => null
    };

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
@endphp

<x-layout.landing.land :land="$land">
{{-- @dd($article->toArray()) --}}
    <main class="pt-4 relative default_container">
        {{-- breadcrumbs --}}
        {{-- <x-common_landing.breadcrumbs :data="$breadcrumbs" /> --}}

        <div class="flex items-start justify-between gap-4 mb-2.5 md:mb-4 {{ $textStyle }}">
            <h1 class="text-xl leading-8 font-bold"> {{$article->title}} </h1>
            <p class="text-sm font-normal flex-none mt-1"> 12 بهمن 1402 </p>
        </div>

        <div class="w-full relative pt-[56%] mb-2 md:mb-4 lg:mb-8 {{ $radiusSize }} overflow-hidden">
            <img src="{{$article->image}}" alt="{{$article->title}}" class="absolute top-0 left-0 w-full h-full" />
            <div class="absolute z-[1] bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black to-transparent"></div>
        </div>

        {{-- details --}}
        <section class="mb-8 lg:mb-16">
            {!! $article->body !!}
        </section>

        {{-- contact to expert --}}
        <section class="flex flex-col bg-white drop-shadow-base {{ $radiusSize }} overflow-hidden mb-8 sm:mx-6 md:mx-10 lg:mb-12">
            {{-- title --}}
            <div class="h-20 w-full bg-violet-600 text-white text-xl font-black flex_center">
                <p> ارتباط با کارشناسان فروش </p>
            </div>
            <form action="#" method="#" class="pb-10 pt-6 px-5 flex flex-col items-center">
                <p class="text-base font-normal leading-7 text-violet-600 mb-6"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید. </p>
                <input name="phone" type="tel" class="bg-dark-50 mb-12 h-10 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal px-3 text-gray-900" placeholder="09" />
                <button type="submit" class="{{ $radiusSize }} flex_center w-64 h-11 text-base font-bold bg-violet-600 text-white"> ثبت درخواست </button>
            </form>
        </section>

        {{-- articles --}}
        <section class="relative pb-10 sm:pb-0">
            {{-- header --}}
            <div class="flex items-center mb-4 sm:justify-between lg:px-4">
                <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900"> آخرین اخبار و اطلاعیه ها </h3>
                <a href="#" class="items-center absolute bottom-0 sm:static right-4 gap-2 text-base font-normal flex text-violet-600">
                    <span> مشاهده همه </span>
                    <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden drop-shadow-base">
                    <div class="relative w-full pt-[62%] mb-2">
                        <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                    </div>
                    {{-- info --}}
                    <div class="px-5 pt-2 pb-4 flex flex-col">
                        <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                        <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                            شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                        </p>
                        <a href="#" class="items-center gap-3 text-sm font-bold flex text-violet-600 mr-auto pb-2 pt-1">
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
                <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden drop-shadow-base">
                    <div class="relative w-full pt-[62%] mb-2">
                        <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                    </div>
                    {{-- info --}}
                    <div class="px-5 pt-2 pb-4 flex flex-col">
                        <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                        <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                            شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                        </p>
                        <a href="#" class="items-center gap-3 text-sm font-bold flex text-violet-600 mr-auto pb-2 pt-1">
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
                <div class="flex flex-col bg-white w-full {{ $radiusSize }} overflow-hidden drop-shadow-base">
                    <div class="relative w-full pt-[62%] mb-2">
                        <img src="/" alt="hello world" class="absolute top-0 left-0 w-full h-full" />
                    </div>
                    {{-- info --}}
                    <div class="px-5 pt-2 pb-4 flex flex-col">
                        <p class="text-lg font-bold text-gray-900 mb-2 text-justify"> عنوان اطلاعیه </p>
                        <p class="text-sm font-normal text-gray-900 line-clamp-3 leading-6 text-justify mb-3">
                            شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
                        </p>
                        <a href="#" class="items-center gap-3 text-sm font-bold flex text-violet-600 mr-auto pb-2 pt-1">
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

</x-layout.landing.land>
