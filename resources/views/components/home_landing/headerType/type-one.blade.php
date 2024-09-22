@props([
    'title' => 'آخرین بخش ها',
    'link' => '/',
    'showall' => 'نمایش همه',
])

<div class="default_container">
    <h3 class="mb-2 text-base sm:text-lg font-medium text-center text-stone-700"> {{ $title }} </h3>
    <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
    {{-- show all --}}
    <div class="flex justify-end">
        <Link href="{{ $link }}" class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block px-2 cursor-pointer"> {{ $showall }} </Link>
    </div>
</div>