@props([
    'text' => '',
    ])

<a {{ $attributes->merge(['class' => 'text-sm lg:text-base font-bold cursor-pointer w-40 h-11 flex_center text-normal' ])}}> {{ $text }} </a>