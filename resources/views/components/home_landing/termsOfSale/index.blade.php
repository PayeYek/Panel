@props(['radius' => '8'])

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
@endphp

<div class="relative z-[1] default_container">
    <a href="#"
        class="w-full mx-auto text-base font-bold text-white bg-red-700 {{ $radiusSize }} dark:bg-red-600 sm:w-80 h-11 flex_center">
        شرایط
        فروش </a>
</div>