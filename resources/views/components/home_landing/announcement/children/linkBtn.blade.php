@props([
    'text' => '',
])

<Link {{ $attributes->merge(['class' => 'text-lg font-medium flex_center h-10 w-32 rounded-custom' ])}}> {{ $text }} </Link>