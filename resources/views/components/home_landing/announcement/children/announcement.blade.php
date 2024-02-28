@props([
    'type' => '1',
    'radiusSize' => '8',
    'colorPalette' => '2',
    'title' => '',
    'description' => '',
    'image' => '',
    'articleSlug' => '',
    'landSlug' => '/'
])

@php
    $fillBtnTheme = '';
    $fillBtnTheme = match($colorPalette) {
        '1' => 'text-white bg-red-700 hover:bg-red-800 focus:shadow-focus focus:shadow-red-700/50',
        '2' => 'text-white bg-blue-700 hover:bg-blue-800 focus:shadow-focus focus:shadow-blue-700/50',
        '3' => 'text-white bg-rose-700 hover:bg-rose-800 focus:shadow-focus focus:shadow-rose-700/50',
        '4' => 'text-white bg-zinc-700 hover:bg-zinc-800 focus:shadow-focus focus:shadow-zinc-700/50',
        '5' => 'text-white bg-cobalt-700 hover:bg-cobalt-800 focus:shadow-focus focus:shadow-cobalt-700/50',
        default => null
    };
@endphp
@switch($type)
    @case(1)
        <li class="flex flex-col sm:flex-row {{ $radiusSize }} bg-white drop-shadow-base overflow-hidden">
            {{-- image --}}
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none">
                <img src="{{ $image }}" alt="{{ $title }}" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
            </div>
            {{-- docs --}}
            <div class="px-6 pb-6 pt-2.5 md:pl-10 flex flex-col sm:justify-center sm:flex-1">
                <h3 class="mb-4 text-lg font-bold text-gray-900 line-clamp-1"> {{ $title }} </h3>
                <p
                    class="text-sm text-justify line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-16 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500 ">
                    {{ $description }}
                </p>
                <LandBtn text="بیشتر" to="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" classNames="mr-auto text-sm font-bold {{ $fillBtnTheme }} {{ $radiusSize }} flex_center h-8 w-[6.5rem]" />
            </div>
        </li>
        @break
    @case(2)
        <li class="flex flex-col w-60 lg:w-full flex-none overflow-hidden {{ $radiusSize }} drop-shadow-base bg-white ">
            <div class="relative w-full pt-[62%]">
                <img src="{{ $image }}" alt="{{ $title }}"
                    class="absolute top-0 left-0 w-full h-full object-cover" />
            </div>
            {{-- info --}}
            <div class="px-4 pt-3 pb-4">
                <h3 class="mb-2 text-sm font-bold text-gray-900 line-clamp-1"> {{ $title }} </h3>
                <p class="mb-3 text-xs font-normal leading-5 h-10 text-justify text-gray-900  line-clamp-2">
                    {{ $description }}
                </p>
                <LandBtn text="بیشتر" to="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" classNames="mx-auto lg:ml-0 text-sm font-bold {{ $fillBtnTheme }} {{ $radiusSize }} flex_center h-8 w-[6.5rem]" />
            </div>
        </li>
        @break
    @case(3) 
        <li class="flex flex-col sm:flex-row bg-white border-t first:border-t-0 py-4 first:pt-0 last:pb-0 border-dark-100">
            {{-- image --}}
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 {{ $radiusSize }} overflow-hidden">
                <img src="{{ $image }}" alt="{{ $title }}" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
            </div>
            {{-- docs --}}
            <div class="px-6 md:pl-8 flex flex-col sm:justify-center sm:flex-1">
                <h3 class="mb-4 text-lg font-bold text-gray-900 line-clamp-1"> {{ $title }} </h3>
                <p
                    class="text-sm text-justify lg:text-base line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-24 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500">
                    {{ $description }}
                </p>
                <div class="flex items-center justify-between">
                    <p class="text-dark-500 text-sm font-normal lg:text-base"> 4 مهر 1400 </p>
                    <LandBtn text="بیشتر" to="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" classNames="text-sm font-bold {{ $fillBtnTheme }} {{ $radiusSize }} flex_center h-8 w-[6.5rem]" />
                </div>
            </div>
        </li>
        @break
    @default
        
@endswitch
