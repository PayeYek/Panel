@props(['radiusSize' => '4', 'gap' => '16', 'type' => '1'])
@php
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
    <x-announcement.children.announcement :type="$type" :radiusSize="$radiusSize" />
    <x-announcement.children.announcement :type="$type" :radiusSize="$radiusSize" />
    <x-announcement.children.announcement :type="$type" :radiusSize="$radiusSize" />
    <x-announcement.children.announcement :type="$type" :radiusSize="$radiusSize" />
</ul>