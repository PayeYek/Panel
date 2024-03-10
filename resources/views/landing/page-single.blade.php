@php
    // $radiusSize = match($land->styles->radius."") {
    //     '0' => 'rounded-b-none',
    //     '2' => 'rounded-b-sm',
    //     '4' => 'rounded-b',
    //     '6' => 'rounded-b-md',
    //     '8' => 'rounded-b-lg',
    //     '12' => 'rounded-b-xl',
    //     '16' => 'rounded-b-2xl',
    //     default => 'rounded-b-md'
    // };
@endphp

<x-layout.default.main :land="$land">

    <main>
        {{-- slider --}}
        @if($land->slides)
            <Slider :slides="{{$land->slides}}" />
        @endif

        {{-- products category --}}
        <x-home_landing.productCategories :landSlug="$land->slug" :data="$data" />

        {{-- favorites --}}
        <x-home_landing.products :landSlug="$land->slug" :data="$land->products" :type="$land->styles->product_type" evenOdd="false" />

        {{-- notifications --}}
        <x-home_landing.announcement :landSlug="$land->slug" :data="$land->articles" type="{{ $land->styles->article_type }}" />

        {{-- videos --}}
        <x-home_landing.videos :data="$land->videos" />

        {{-- terms of sale --}}
        <x-home_landing.termsOfSale />
    </main>


</x-layout.default.main>
