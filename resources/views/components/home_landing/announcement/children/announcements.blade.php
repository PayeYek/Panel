@props(['radius' => '8', 'type' => '1', 'data' => '', 'colorPalette' => '', 'landSlug' => '/'])

@php
    $radiusSize = null;
    switch ($radius) {
        case '0':
            $radiusSize = 'rounded-none';
            break;
        case '2':
            $radiusSize = 'rounded-sm';
            break;
        case '4':
            $radiusSize = 'rounded';
            break;
        case '6':
            $radiusSize = 'rounded-md';
            break;
        case '8':
            $radiusSize = 'rounded-lg';
            break;
        case '12':
            $radiusSize = 'rounded-xl';
            break;
        case '16':
            $radiusSize = 'rounded-2xl';
            break;
        
        default:
            # code...
            break;
    }
    $gridCols = null;
    switch ($type) {
        case '1':
            $gridCols = 'grid-cols-1 gap-4';
            break;
        case '2':
            $gridCols = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';
            break;
        
        default:
            # code...
            break;
    }
@endphp
{{-- @dd($data); --}}

<ul class="mb-4 grid {{ $gridCols }} list-none sm:mb-0">
    @foreach ($data as $article)
        <x-home_landing.announcement.children.announcement
            :type="$type"
            :radiusSize="$radiusSize"
            :colorPalette="$colorPalette"
            :title="$article->title"
            :description="$article->description"
            :image="$article->image"
            :articleSlug="$article->slug"
            :landSlug="$landSlug"
            />
    @endforeach
</ul>