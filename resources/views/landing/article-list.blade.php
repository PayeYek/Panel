@props([
    'borderType' => '1',
])

@php
    // $gridCols = match($land->styles->article_type."") {
    $gridCols = match('4') {
        '1' => 'grid grid-cols-1 gap-4 default_container',
        '2' => 'gap-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 default_container',
        '3' => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom mx-4 lg:default_container',
        '4' => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom mx-4 lg:default_container',
        default => null
    };

    $borderStyle = match($borderType) {
        '1'  => 'drop-shadow-base',
        '2'  => 'border border-dark-100',
        default => 'drop-shadow-base'
    };
@endphp

<x-layout.default.main :land="$land">
    <main class="pt-4">
        {{-- <Articles gridStyle="{{ $gridCols }}" type="{{ $land->styles->article_type }}" landSlug="{{ $land->slug }}" data="{{ $land->articles }}" borderStyle="{{ $borderStyle }}" /> --}}
        <Articles gridStyle="{{ $gridCols }}" type="4" landSlug="{{ $land->slug }}" data="{{ $land->articles }}" borderStyle="{{ $borderStyle }}" />
    </main>

</x-layout.default.main>
