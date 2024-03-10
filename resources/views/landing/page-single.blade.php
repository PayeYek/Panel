<x-layout.default.main :land="$land">

    <main class="pt-16 sm:pt-20">
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
