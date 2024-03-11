@props([
    'type' => '1',
    'colorPalette' => '2',
    'title' => '',
    'description' => '',
    'image' => '',
    'articleSlug' => '',
    'landSlug' => '/',
    'borderType' => '1',
])

@php
    $borderStyle = match($borderType) {
        '1'  => 'drop-shadow-base',
        '2'  => 'border border-dark-100',
        default => 'drop-shadow-base'
    };
@endphp
@switch($type)
    @case(1)
        <li class="flex flex-col sm:flex-row rounded-custom bg-white {{ $borderStyle }} overflow-hidden">
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
                <x-home_landing.announcement.children.linkBtn text="بیشتر" href="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" class="mr-auto rounded-custom text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </li>
        @break
    @case(2)
        <li class="flex flex-col w-60 lg:w-full flex-none overflow-hidden rounded-custom {{ $borderStyle }} bg-white ">
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
                <x-home_landing.announcement.children.linkBtn text="بیشتر" href="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" class="mx-auto lg:ml-0 rounded-custom text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
            </div>
        </li>
        @break
    @case(3) 
        <li class="flex flex-col sm:flex-row bg-white border-t first:border-t-0 py-4 first:pt-0 last:pb-0 border-dark-100">
            {{-- image --}}
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-custom">
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
                    <x-home_landing.announcement.children.linkBtn text="بیشتر" href="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" class="rounded-custom text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal" />
                </div>
            </div>
        </li>
        @break
    @case(4) 
        <li class="flex flex-col sm:flex-row bg-white border-t first:border-t-0 py-4 first:pt-0 last:pb-0 border-dark-100">
            {{-- image --}}
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-custom">
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
                    <a href="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" class="text-sm font-bold flex items-center px-6 gap-4 text-normal">
                        <span> ادامه </span>
                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16L9.41 14.59L3.83 9L16 9V7L3.83 7L9.41 1.41L8 0L0 8L8 16Z" fill="current"/>
                        </svg>
                    </a>
                </div>
            </div>
        </li>
        @break
    @default
        
@endswitch
