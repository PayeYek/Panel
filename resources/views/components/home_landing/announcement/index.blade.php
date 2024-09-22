@props([
    'type' => '1',
    'data' => '',
    'land' => null,
    'landSlug' => '/',
    'fontFamily' => '1',
    'colorPalette' => '1',
    'borderType' => '0',
    'evenOdd' => 1,
    'landType' => '1',
    'headerType' => 1,
    // 'showSectionTitle' => true,
])

@php
    
    // $bgStyle = match($type."") {
    //     '1', '3', '4', '6'  => 'default_container',
    //     '2', '5'  => 'lg:default_container',
    //     '7'  => '',
    //     default => ''
    // };

    $parentStyle = match($type."") {
        '6'  => 'default_container',
        '8', '7'  => 'bg-stone-200 py-4 sm:py-10 md:py-14 lg:pt-16 lg:pb-20 xl:pb-24',
        default => '',
    };

    $containerStyle = match($type."") {
        '6'  => 'lg:default_container',
        default => 'default_container',
    };

    $borderStyle = match($borderType) {
        '0'  => '',
        '1'  => 'border border-stone-400',
        '2'  => 'drop-shadow-base',
        default => ''
    };

@endphp

<section class="mb-4 lg:mb-16 relative {{ $parentStyle }}">

    <div class="{{ $containerStyle }}">
        @switch($headerType)
            @case(1)
                <x-home_landing.headerType.type-one title="آخرین اخبار و اطلاعیه ها" link="{{ route('landing.article.list', ['page' => $landSlug]) }}" showall="نمایش همه" />
                @break
            @case(2)
                <x-home_landing.headerType.type-two title="آخرین اخبار و مقالات" link="{{ route('landing.article.list', ['page' => $landSlug]) }}" showall="نمایش همه" />
                @break
            @case(3)
                <x-home_landing.headerType.type-three title="آخرین اخبار و اطلاعیه ها" link="{{ route('landing.article.list', ['page' => $landSlug]) }}" showall="آرشیو اخبار و مقالات" />
                @break
            @case(4)
                <x-home_landing.headerType.type-four title="آخرین اخبار و اطلاعیه ها" link="{{ route('landing.article.list', ['page' => $landSlug]) }}" showall="آرشیو" />
                @break
            @case(5)
                <x-home_landing.headerType.type-five title="اخبار و مقالات" />
                @break
            @case(6)
                <x-home_landing.headerType.type-six title="اخبار و مقالات" link="{{ route('landing.article.list', ['page' => $landSlug]) }}" showall="آرشیو اخبار و مقالات" />
                @break
            @default
        @endswitch
        
        <x-home_landing.announcement.children.announcements :landSlug="$landSlug" :data="$data" borderType="{{ $borderType }}" :land="$land" :type="$type" :evenOdd="$evenOdd" :landType="$landType" />
    </div>
</section>