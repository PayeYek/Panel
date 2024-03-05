@php
    $radiusSize = match($land->styles->radius."") {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };
@endphp

<x-layout.default.main :land="$land">

    <main class="pt-4 relative">
        <section class="default_container mb-8 lg:flex lg:items-center lg:gap-4">
            <p class="mb-4 lg:mb-0 text-base font-bold text-gray-900 text-center"> محصولات </p>
            <select class="h-10 w-full max-w-96 mx-auto border-red-700 border text-red-700 lg:w-36 lg:mx-0 focus:ring-0 outline-none focus:border-red-700 {{ $radiusSize }}">
                <option value="1"> کامیون </option>
            </select>
        </section>
    
        {{-- products --}}
        <x-home_landing.products :showSectionTitle=false :landSlug="$land->slug" :data="$land->products" type="11" colorPalette="1" evenOdd="true" radius="{{ $land->styles->radius }}" />
    </main>













    {{-- <x-layout.landing.sidebar :land="$land"/> --}}

    {{--CATEGORIES | PRODUCTS--}}
    {{-- <x-layout.landing.products :land="$land" :data="$data" all/> --}}

</x-layout.landing.land>
