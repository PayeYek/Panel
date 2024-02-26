@props(['radius' => '4', 'gap' => '16', 'type' => '1'])

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
    $gapSize = null;
    switch ($gap) {
        case '0':
            $gapSize = 'gap-0';
            break;
        case '2':
            $gapSize = 'gap-0.5';
            break;
        case '4':
            $gapSize = 'gap-1';
            break;
        case '8':
            $gapSize = 'gap-2';
            break;
        case '12':
            $gapSize = 'gap-3';
            break;
        case '16':
            $gapSize = 'gap-4';
            break;
        
        default:
            # code...
            break;
    }
    $gridCols = null;
    switch ($type) {
        case '1':
            $gridCols = 'grid-cols-1';
            break;
        case '2':
            $gridCols = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';
            break;
        
        default:
            # code...
            break;
    }
@endphp

<ul class="mb-4 grid {{ $gridCols }} {{ $gapSize }} list-none sm:mb-0">
    <x-home_landing.announcement.children.announcement :type="$type" :radiusSize="$radiusSize" />
    <x-home_landing.announcement.children.announcement :type="$type" :radiusSize="$radiusSize" />
    <x-home_landing.announcement.children.announcement :type="$type" :radiusSize="$radiusSize" />
    <x-home_landing.announcement.children.announcement :type="$type" :radiusSize="$radiusSize" />
</ul>