@props([
    'title' => 'آخرین بخش ها',
    'link' => '/',
    'showall' => 'نمایش همه',
])


<div class="relative mb-4">
    <h3 class="text-lg lg:text-2xl font-medium text-center text-stone-700"> {{ $title }} </h3>
    {{-- show all --}}
    <Link href="{{ $link }}" class="absolute left-0 top-1 text-base font-medium text-stone-700 hidden lg:inline-flex px-2 cursor-pointer flex-row gap-2">
        <span> {{ $showall }} </span>
        <svg width="20" height="20" class="stroke-current" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.70833 15.8337L3.26562 10.0003M3.26562 10.0003L8.70833 4.16699M3.26562 10.0003L16.3281 10.0003" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </Link>
</div>