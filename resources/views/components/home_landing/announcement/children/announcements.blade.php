@props([
    'radius' => '8',
    'type' => '1',
    'data' => '',
    'landSlug' => '/',
    'borderType' => '1',
])

@php
    $radiusSize = match($radius) {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };

    $gridCols = match($type) {
        '1' => 'grid grid-cols-1 gap-4',
        '2' => 'flex gap-4 items-center overflow-auto p-4 scrollbar-none md:scrollbar-thin lg:grid lg:grid-cols-4 lg:p-0 lg:overflow-visible',
        '3' => 'grid grid-cols-1 border border-dark-100 p-4 ' . $radiusSize,
        '4' => 'grid grid-cols-1 border border-dark-100 p-4 ' . $radiusSize,
        default => null
    };

@endphp

<ul class="mb-4 {{ $gridCols }} list-none sm:mb-0">
    @foreach ($data->take(4) as $article)
        <x-home_landing.announcement.children.announcement
            :type="$type"
            :radiusSize="$radiusSize"
            :title="$article->title"
            :description="$article->description"
            :image="$article->image"
            :articleSlug="$article->slug"
            :landSlug="$landSlug"
        />
    @endforeach
</ul>