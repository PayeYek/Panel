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
@dd($breadcrumbs)
<x-layout.default.main :land="$land">
    <main class="pt-4">
        {{-- breadcrumbs --}}
        <ul class="default_container flex items-center text-[10px] gap-1.5 text-gray-900 mb-4">
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
        <section class="grid grid-cols-1 gap-4 default_container mb-8">
            {{-- product images --}}
            <section class="w-full pt-[72%] relative">
                <div class="absolute inset-0">
                    <img src="/" alt="/" class="w-full h-full object-cover" />
                </div>
            </section>

            {{-- info --}}
            <section class="">
                {{-- boxes --}}
                <div class="grid grid-cols-3 gap-3 text-sm font-normal mb-4">
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700"> سیستم ترمز </p>
                        <p class="text-gray-900"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700"> سیستم ترمز </p>
                        <p class="text-gray-900"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700"> سیستم ترمز </p>
                        <p class="text-gray-900"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700"> سیستم ترمز </p>
                        <p class="text-gray-900"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700"> سیستم ترمز </p>
                        <p class="text-gray-900"> کاسه ای </p>
                    </div>
                    <div class="aspect-square flex_center flex-col p-1 bg-dark-50 gap-1 {{ $radiusSize }}">
                        <p class="text-red-700"> سیستم ترمز </p>
                        <p class="text-gray-900"> کاسه ای </p>
                    </div>
                </div>

                {{-- guide btns --}}
                <div class="flex_center flex-col gap-2">
                    <LandBtn to="/" classNames="h-11 w-[254px] bg-white border border-red-700 text-red-700 text-base font-bold flex_center {{ $radiusSize }}" text="دانلود کاتالوگ" />
                    <LandBtn to="/" classNames="h-11 w-[254px] bg-red-700 text-white text-base font-bold flex_center {{ $radiusSize }}" text="مشاوره و خرید" />
                </div>
            </section>
        </section>

        {{-- tabs --}}
        <div class="overflow-hidden sticky top-16 mb-4 z-[1] bg-white pt-2">
            <div class="overflow-auto flex">
                <ul class="flex-none text-sm mx-4 font-normal text-gray-900 gap-10 flex items-center border-b-2 border-[#e7e8e9] l_tab_styles">
                    <li class="flex-none py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:bg-red-700 before:hidden active"> مشخصات فنی </li>
                    <li class="flex-none py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:bg-red-700 before:hidden"> توضیحات تکمیلی </li>
                    <li class="flex-none py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:bg-red-700 before:hidden"> دیدگاه شما </li>
                    <li class="flex-none py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:bg-red-700 before:hidden"> سوالات متداول </li>
                </ul>
            </div>
        </div>

        {{-- Technical Specifications --}}
        <section class="default_container">
            <ul class="flex flex-col gap-2 text-gray-900">
                <x-pdp.TechnicalSpecifications radius="{{ $radiusSize }}" />
            </ul>
        </section>
    </main>

</x-layout.default.main>