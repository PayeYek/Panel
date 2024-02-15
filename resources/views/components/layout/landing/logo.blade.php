@props(['land'=>null, 'inFooter' => false])

@if($inFooter)
    <a href="{{ $land ? route('landing.page.show', ['page'=>$land->slug]) : '#' }}"
       class="flex flex-col items-center md:flex-row shrink-0 gap-2 group">
        @if($land->logo)
            <img
                class="h-32 w-32 md:h-20 md:w-20 rounded-md transition-all duration-200"
                src="{{$inFooter ? ($land->logo_origin ?: $land->logo) : $land->logo}}" alt="{{$land->title ?? ''}}">
        @endif

        @php
            $english = Str::title(str_replace('-', ' ', $land->slug));
        @endphp

        <div class="flex flex-col justify-center {{$inFooter? '': 'max-w-48'}}">
            <h1 class="font-bold font-bakh text-2xl md:text-lg text-center md:text-start {{$inFooter? '': 'truncate'}}">{{$land->title ?? ''}}</h1>
            <h2 class="-mt-0.5 text-base md:text-xs font-inter text-gray-400 dark:text-gray-500 text-center md:text-start {{$inFooter? '': 'truncate'}}">
                {{$english ?? ''}}
            </h2>
        </div>
    </a>

@else

    <a href="{{ $land ? route('landing.page.show', ['page'=>$land->slug]) : '#' }}"
       class="flex shrink-0 gap-2 group">
        @if($land->logo)
            <img
                class="h-20 w-20 rounded-md"
                src="{{$inFooter ? ($land->logo_origin ?: $land->logo) : $land->logo}}" alt="{{$land->title ?? ''}}">
        @endif

        @php
            $english = Str::title(str_replace('-', ' ', $land->slug));
        @endphp

        <div class="flex flex-col justify-center {{$inFooter? '': 'max-w-48'}}">
            <h1 class="font-bold font-bakh text-lg text-start">{{$land->title ?? ''}}</h1>
            <h2 class="-mt-0.5 text-xs font-inter text-gray-400 dark:text-gray-500 text-start">
                {{$english ?? ''}}
            </h2>
        </div>
    </a>
@endif




