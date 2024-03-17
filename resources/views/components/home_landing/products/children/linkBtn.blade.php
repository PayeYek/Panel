{{-- {{ $attributes->merge(['class' => 'text-sm lg:text-base font-medium cursor-pointer w-40 h-11 flex_center text-normal' ])}} --}}
<Link {{ $attributes }}>
    {{ $slot }}
</Link>