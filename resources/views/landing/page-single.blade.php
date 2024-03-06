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
@endphp

<x-layout.default.main :land="$land">

    <img src="{{ asset('assets/svg/pattern-1.svg') }}" alt="lines"
         class="absolute right-0 w-full top-[38rem]"/>
    <img src="{{ asset('assets/svg/pattern-2.svg') }}" alt="line-3"
         class="absolute right-0 w-full top-[76rem]"/>
    <img src="{{ asset('assets/svg/pattern-2.svg') }}" alt="line-2"
         class="absolute right-0 w-full bottom-48"/>

    <main class="">
        {{-- slider --}}
        @if($land->slides)
            <Slider :slides="{{$land->slides}}" radiusB="{{ $radiusSize }}" />
        @endif

        {{-- products category --}}
        <x-home_landing.productCategories :landSlug="$land->slug" :data="$data" radius="{{ $land->styles->radius }}" />

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
