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

@push('script')
    <script>
        const selectFilter = document.getElementById("selectFilter")
        console.log(selctFilter);
    </script>
@endpush

<x-layout.default.main :land="$land">

    <main class="pt-4 relative">
        <section class="default_container mb-8 lg:flex lg:items-center lg:gap-4">
            <p class="mb-4 lg:mb-0 text-base font-bold text-gray-900 text-center"> محصولات </p>
            <div class="h-10 w-full max-w-96 mx-auto lg:w-36 lg:mx-0 before:absolute before:content-[''] before:w-2 before:h-2 before:border-r-2 before:border-b-2 before:border-normal before:top-1/2 before:left-4 before:-translate-y-1/2 before:rotate-45 relative">
                <select id="selectFilter" class="w-full h-full border focus:ring-0 outline-none !bg-none text-normal border-normal focus:border-focus {{ $radiusSize }}">
                    <option value="1"> کامیون </option>
                </select>
            </div>
        </section>
    
        {{-- products --}}
        <x-home_landing.products :showSectionTitle=false :landSlug="$land->slug" :data="$land->products" type="11" evenOdd="true" radius="{{ $land->styles->radius }}" />
    </main>













    {{-- <x-layout.landing.sidebar :land="$land"/> --}}

    {{--CATEGORIES | PRODUCTS--}}
    {{-- <x-layout.landing.products :land="$land" :data="$data" all/> --}}

</x-layout.landing.land>
