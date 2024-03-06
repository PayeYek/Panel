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

    $selectBeforeStyle = match($land->styles->color."") {
        '1' => 'before:border-red-700',
        '2' => 'before:border-blue-700',
        '3' => 'before:border-rose-700',
        '4' => 'before:border-zinc-700',
        '5' => 'before:border-cobalt-700',
        default => 'before:border-red-700'
    };

    $selectStyle = match($land->styles->color."") {
        '1' => 'text-red-700 border-red-700 focus:border-red-700',
        '2' => 'text-blue-700 border-blue-700 focus:border-blue-700',
        '3' => 'text-rose-700 border-rose-700 focus:border-rose-700',
        '4' => 'text-zinc-700 border-zinc-700 focus:border-zinc-700',
        '5' => 'text-cobalt-700 border-cobalt-700 focus:border-cobalt-700',
        default => 'text-red-700 border-red-700 focus:border-red-700'
    };
@endphp

<x-layout.default.main :land="$land">

    <main class="pt-4 relative">
        <section class="default_container mb-8 lg:flex lg:items-center lg:gap-4">
            <p class="mb-4 lg:mb-0 text-base font-bold text-gray-900 text-center"> محصولات </p>
            <div class="h-10 w-full max-w-96 mx-auto lg:w-36 lg:mx-0 before:absolute before:content-[''] before:w-2 before:h-2 before:border-r-2 before:border-b-2 {{ $selectBeforeStyle }} before:top-1/2 before:left-4 before:-translate-y-1/2 before:rotate-45 relative">
                <select class="w-full h-full border focus:ring-0 outline-none !bg-none {{ $selectStyle }} {{ $radiusSize }}">
                    <option value="1"> کامیون </option>
                </select>
            </div>
        </section>
    
        {{-- products --}}
        <x-home_landing.products :showSectionTitle=false :landSlug="$land->slug" :data="$land->products" type="11" colorPalette="{{ $land->styles->color }}" evenOdd="true" radius="{{ $land->styles->radius }}" />
    </main>













    {{-- <x-layout.landing.sidebar :land="$land"/> --}}

    {{--CATEGORIES | PRODUCTS--}}
    {{-- <x-layout.landing.products :land="$land" :data="$data" all/> --}}

</x-layout.landing.land>
