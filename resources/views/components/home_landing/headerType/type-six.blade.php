@props([
    'title' => 'آخرین بخش ها',
    'link' => '/',
    'showall' => 'نمایش همه',
])


<div class="flex items-center justify-between gap-4 mb-2 lg:mb-4 default_container">
    <div class="hidden sm:flex items-center gap-4">
        {{-- circle --}}
        <div class="size-3 bg-normal"></div>
        <h3 class="mb-2 text-xl font-normal text-center text-stone-700"> {{ $title }} </h3>
    </div>
    <Link href="{{ $link }}" class="text-base font-medium">
        <span class="hidden sm:block text-normal"> {{ $showall }} </span>
        <span class="sm:hidden block text-stone-700"> {{ $title }} </span>
    </Link>
</div>