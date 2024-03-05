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

    $textStyle = match($land->styles->color."") {
        '1' => 'text-red-700',
        '2' => 'text-blue-700',
        '3' => 'text-rose-700',
        '4' => 'text-zinc-700',
        '5' => 'text-cobalt-700',
        default => null
    };
@endphp

<x-layout.default.main :land="$land">
<main class="pt-4 relative">
    {{-- titles --}}
    <section class="default_container">
        <p class="text-[10px] font-normal mb-6 text-gray-900"> نمایندگی فروش </p>
        <h1 class="text-center px-8 text-2xl font-normal mb-5 text-red-700"> نمایندگی 2111 آرین دیزل </h1>
        <h3 class="text-xl font-normal mb-6 text-gray-900"> آرین دیزل </h3>
        <p class="text-justify text-sm font-normal leading-6">
            
        </p>
    </section>
</main>
</x-layout.default.main>