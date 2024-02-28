@props(['radius' => '8', 'type' => '1', 'data' => '', 'colorPalette' => '1', 'landSlug' => '/'])

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
            $gridCols = 'grid grid-cols-1 gap-4';
            break;
        case '2':
            $gridCols = 'flex gap-4 items-center overflow-auto p-4 scrollbar-none md:scrollbar-thin lg:grid lg:grid-cols-4 lg:p-0 lg:overflow-visible';
            break;
        
        case '3':
            $gridCols = 'grid grid-cols-1 border border-dark-100 p-4 ' . $radiusSize;
            break;
        
        default:
            # code...
            break;
    }
@endphp
{{-- @dd($data); --}}

<ul class="mb-4 {{ $gridCols }} list-none sm:mb-0">
    @foreach ($data->take(4) as $article)
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