@php
    $radiusSize = match($land->styles->radius."") {
        '0' => 'rounded-b-none',
        '2' => 'rounded-b-sm',
        '4' => 'rounded-b',
        '6' => 'rounded-b-md',
        '8' => 'rounded-b-lg',
        '12' => 'rounded-b-xl',
        '16' => 'rounded-b-2xl',
        default => 'rounded-b-md'
    };

    $sliderPanelBgColor = match($land->styles->color."") {
        '1' => 'bg-red-700/75',
        '2' => 'bg-blue-700/75',
        '3' => 'bg-rose-700/75',
        '4' => 'bg-zinc-700/75',
        '5' => 'bg-cobalt-700/75',
        default => 'bg-red-700/75'
    };
@endphp

<x-layout.default.main :land="$land">

    {{-- <x-layout.landing.sidebar :land="$land" /> --}}

    <img src="{{ asset('assets/svg/pattern-1.svg') }}" alt="lines"
         class="absolute right-0 w-full top-[38rem]"/>
    <img src="{{ asset('assets/svg/pattern-2.svg') }}" alt="line-3"
         class="absolute right-0 w-full top-[76rem]"/>
    <img src="{{ asset('assets/svg/pattern-2.svg') }}" alt="line-2"
         class="absolute right-0 w-full bottom-48"/>

    {{-- default_container --}}
    <main class="">
        {{-- slider --}}
        @if($land->slides)
            <Slider :slides="{{$land->slides}}" radiusB="{{ $radiusSize }}" sliderPanelBgColor="{{ $sliderPanelBgColor }}" />
        @endif

        {{-- products --}}
        <x-home_landing.productCategories :landSlug="$land->slug" :data="$data" colorPalette="{{ $land->styles->color }}" radius="{{ $land->styles->radius }}" />

        {{-- favorites --}}
        <x-home_landing.products :landSlug="$land->slug" :data="$land->products" :type="$land->styles->product_type" colorPalette="{{ $land->styles->color }}" evenOdd="false" radius="{{ $land->styles->radius }}" />

        {{-- notifications --}}
        <x-home_landing.announcement :landSlug="$land->slug" :data="$land->articles" type="{{ $land->styles->article_type }}" fontFamily="1" colorPalette="{{ $land->styles->color }}" radius="{{ $land->styles->radius }}" />

        {{-- videos --}}
        <x-home_landing.videos colorPalette="{{ $land->styles->color }}" radius="{{ $land->styles->radius }}" :data="$land->videos" />

        {{-- terms of sale --}}
        <x-home_landing.termsOfSale colorPalette="{{ $land->styles->color }}" radius="{{ $land->styles->radius }}" />
    </main>


</x-layout.default.main>
