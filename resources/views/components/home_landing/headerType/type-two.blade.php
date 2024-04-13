@props([
    'title' => 'آخرین بخش ها',
    'link' => '/',
    'showall' => 'نمایش همه',
])

<div class="flex items-center gap-4 mb-2 lg:mb-4">
    {{-- circle --}}
    <div class="size-3 rounded-full bg-normal"></div>
    <h3 class="text-xl font-normal text-center text-stone-700"> {{ $title }} </h3>
    <Link href="{{ $link }}" class="text-normal text-base font-medium hidden sm:block"> ({{ $showall }}) </Link>
</div>