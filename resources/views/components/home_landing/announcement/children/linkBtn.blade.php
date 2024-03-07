@props([
    'text' => '',
])

<a {{ $attributes->merge(['class' => 'text-sm font-bold flex_center h-8 w-[6.5rem]' ])}}> {{ $text }} </a>