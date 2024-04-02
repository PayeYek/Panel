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
    
    $bgStyle = match($type."") {
        '1', '3', '4', '6'  => 'default_container',
        '2', '5'  => 'lg:default_container',
        '7'  => 'bg-stone-200 py-4 sm:py-10 md:py-14 lg:pt-16 lg:pb-20 xl:pb-24',
        default => ''
    };

    $borderStyle = match($borderType) {
        '0'  => '',
        '1'  => 'border border-stone-400',
        '2'  => 'drop-shadow-base',
        default => ''
    };

@endphp

{{-- @push('script')
    <script>
        console.log("$data => ", <?=json_encode($data)?>);
    </script>
@endpush --}}

<section class="mb-4 lg:mb-16 relative {{ $bgStyle }}">

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
    <x-home_landing.announcement.children.announcements :landSlug="$landSlug" :data="$data" borderType="{{ $borderType }}" :land="$land" :type="$type" :evenOdd="$evenOdd" />
</section>