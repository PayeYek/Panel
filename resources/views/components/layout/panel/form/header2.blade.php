@props(['title' => null, 'desc' => null, 'header'=> true, 'small'=> false])
@if($title || $desc)
    <div {{ $attributes->class(['space-y-1','-mb-2 lg:mb-0'=> $header]) }}>
        @if($title)
            <h5 class="@if($small) text-sm sm:text-base @else text-xl sm:text-2xl @endif font-medium tracking-tight text-gray-900 dark:text-white rtl:font-bakh">{{__($title)}}</h5>
        @endif
        @if($desc)
            <p class="@if($small) text-xs sm:text-sm @else text-sm sm:text-base @endif font-normal text-gray-700 dark:text-gray-400">{{__($desc)}}</p>
        @endif
    </div>
@endif
