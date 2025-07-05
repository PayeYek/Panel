

@props([
    'text' => '',
])

<a {{ $attributes->merge(['class' => 'text-base font-medium flex_center h-11 w-[254px] cursor-pointer' ])}}> {{$text}} </a>