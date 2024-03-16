@props([
    'type' => '1',
    'data' => '',
    'land' => '',
    'landSlug' => '/',
    'borderType' => '0',
    'evenOdd' => '0',
])
@php
    $gridCols = match ($type) {
        '1' => 'grid grid-cols-1 gap-4',
        '2' => 'flex gap-4 items-center overflow-auto p-4 scrollbar-none md:scrollbar-thin lg:grid lg:grid-cols-4 lg:p-0 lg:overflow-visible',
        '3' => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom',
        '4' => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom',
        default => null,
    };

    $borderStyle = match ($borderType) {
        '0' => '',
        '1' => 'drop-shadow-base',
        '2' => 'border border-dark-100',
        default => '',
    };

@endphp
@if ($type.'' !== '5')
    <ul class="mb-4 {{ $gridCols }} list-none sm:mb-0 w-full">
        @foreach ($data as $article)
            <x-home_landing.announcement.children.announcement :type="$type" :borderStyle="$borderStyle" :title="$article->title"
                :description="$article->description" :image="$article->image" :articleSlug="$article->slug" :landSlug="$landSlug" />
        @endforeach
    </ul>
@else
    <section class="w-full">
        <PdpMoreArticles slides="{!! $land->articles !!}" borderType="{{ $borderType }}" striped="{{ $evenOdd }}" landSlug="{{ $landSlug }}" />
    </section>
@endif
