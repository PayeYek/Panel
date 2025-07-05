@props(['land'=>null, 'inFooter' => false])

@if($inFooter)
    <a href="{{ $land ? route('landing.page.show', ['page'=>$land->slug]) : '#' }}"
       class="flex flex-col items-center gap-2 md:flex-row shrink-0 group">
        @if($land->logo)
            <img
                class="w-32 h-32 transition-all duration-200 rounded-md md:h-20 md:w-20"
                src="{{$inFooter ? ($land->logo_origin ?: $land->logo) : $land->logo}}" alt="{{$land->title ?? ''}}">
        @endif

        @php
            $english = Str::title(str_replace('-', ' ', $land->slug));
        @endphp

        <div class="flex flex-col justify-center {{$inFooter? '': 'max-w-48'}}">
            <h1 class="font-bold font-iran text-2xl md:text-lg text-center md:text-start {{$inFooter? '': 'truncate'}}">{{$land->title ?? ''}}</h1>
            <h2 class="-mt-0.5 text-base md:text-xs font-inter text-gray-400 text-center md:text-start {{$inFooter? '': 'truncate'}}">
                {{$english ?? ''}}
            </h2>
        </div>
    </a>

@else

    <a href="{{ $land ? route('landing.page.show', ['page'=>$land->slug]) : '#' }}"
       class="flex items-center gap-2 shrink-0">
        @if($land->logo)
            <img
                class="object-contain h-14 sm:h-[72px]"
                src="{{$inFooter ? ($land->logo_origin ?: $land->logo) : $land->logo}}" alt="{{$land->title ?? ''}}">
        @endif

        @php
            $english = Str::title(str_replace('-', ' ', $land->slug));
        @endphp

        <div class="hidden sm:flex flex-col {{$inFooter? '': ' justify-center max-w-48'}}">
            <h1 class="text-sm lg:text-base font-bold font-iran">{{$land->title ?? ''}}</h1>
            <h2 class="text-[10px] lg:text-xs text-gray-400 font-inter text-start">
                {{$english ?? ''}}
            </h2>
        </div>
    </a>
@endif




