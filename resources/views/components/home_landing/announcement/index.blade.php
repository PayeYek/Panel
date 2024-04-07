@props([
    'type' => '1',
    'data' => '',
    'land' => null,
    'landSlug' => '/',
    'fontFamily' => '1',
    'colorPalette' => '1',
    'borderType' => '0',
    'evenOdd' => '0',
    'landType' => '1',
    // 'showSectionTitle' => true,
])

@php
    
    // $bgStyle = match($type."") {
    //     '1', '3', '4', '6'  => 'default_container',
    //     '2', '5'  => 'lg:default_container',
    //     '7'  => '',
    //     default => ''
    // };

    $containerStyle = match($landType."") {
        '1'  => 'default_container',
        '2'  => 'lg:default_container',
        '4'  => 'default_container',
        '6', '7'  => 'bg-stone-200 py-4 sm:py-10 md:py-14 lg:pt-16 lg:pb-20 xl:pb-24',
        default => ''
    };

    $borderStyle = match($borderType) {
        '0'  => '',
        '1'  => 'border border-stone-400',
        '2'  => 'drop-shadow-base',
        default => ''
    };

@endphp

<section class="mb-4 lg:mb-16 relative {{ $containerStyle }}">

    @switch($landType)
        @case(1)
            <h3 class="mb-2 text-base sm:text-lg font-medium text-center text-stone-700"> آخرین اخبار و اطلاعیه ها </h3>
            <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
            {{-- show all --}}
            <Link href="{{ route('landing.article.list', ['page' => $landSlug]) }}" class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block float-left px-2 cursor-pointer"> نمایش همه </Link>
            @break
        @case(2)
            <div class="flex items-center gap-4 mb-2 lg:mb-4">
                {{-- circle --}}
                <div class="size-3 rounded-full bg-normal"></div>
                <h3 class="mb-2 text-xl font-normal text-center text-stone-700"> آخرین اخبار و مقالات </h3>
                <Link href="{{ route('landing.article.list', ['page' => $landSlug]) }}" class="text-normal text-base font-medium hidden sm:block"> (مشاهده همه) </Link>
            </div>
            @break
        @case(4)
            <div class="relative mb-4">
                <h3 class="text-lg lg:text-2xl font-medium text-center text-stone-700"> آخرین اخبار و اطلاعیه ها </h3>
                {{-- show all --}}
                <Link href="{{ route('landing.article.list', ['page' => $landSlug]) }}" class="absolute left-0 top-1 text-base font-medium text-stone-700 hidden lg:inline-flex px-2 cursor-pointer flex-row gap-2">
                    <span> آرشیو اخبار و مقالات </span>
                    <svg width="20" height="20" class="stroke-current" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.70833 15.8337L3.26562 10.0003M3.26562 10.0003L8.70833 4.16699M3.26562 10.0003L16.3281 10.0003" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </Link>
            </div>
            @break
        @case(6)
            <h3 class="mb-6 text-lg lg:text-2xl font-medium text-center text-stone-700"> اخبار و مقالات </h3>
            @break
        @case(7)
            <div class="flex items-center justify-between gap-4 mb-2 lg:mb-4 default_container">
                <div class="hidden sm:flex items-center gap-4">
                    {{-- circle --}}
                    <div class="size-3 bg-normal"></div>
                    <h3 class="mb-2 text-xl font-normal text-center text-stone-700"> اخبار و مقالات </h3>
                </div>
                <Link href="{{ route('landing.article.list', ['page' => $landSlug]) }}" class="text-base font-medium">
                    <span class="hidden sm:block text-normal"> آرشیو اخبار و مقالات </span>
                    <span class="sm:hidden block text-stone-700"> اخبار و مقالات </span>
                </Link>
            </div>
            @break
        @default
    @endswitch
    {{-- <HomeArticles :landSlug="$landSlug" data="{!! $data !!}" borderStyle="{{ $borderStyle }}" :land="$land" type="{{ $type }}" :evenOdd="$evenOdd" /> --}}
    <x-home_landing.announcement.children.announcements :landSlug="$landSlug" :data="$data" borderType="{{ $borderType }}" :land="$land" :type="$type" :evenOdd="$evenOdd" :landType="$landType" />
</section>