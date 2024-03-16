@props([
    'type' => '1',
    'data' => '',
    'landSlug' => '/',
    'fontFamily' => '1',
    'colorPalette' => '1',
    'borderType' => '0',
    'evenOdd' => '0',
    'showSectionTitle' => true,
])

<section class="mb-4 lg:mb-16 relative {{ $type == 2 || $type == 5 ? 'lg:default_container' : 'default_container' }}">
    @if ($showSectionTitle)
        <h3  class="mb-2 text-base sm:text-lg font-bold text-center text-stone-700"> آخرین اخبار و اطلاعیه ها </h3>
        <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
        {{-- show all --}}
        <Link href="{{ route('landing.article.list', ['page' => $landSlug]) }}" class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block float-left px-2 cursor-pointer"> نمایش همه </Link>
    @endif

    <x-home_landing.announcement.children.announcements :landSlug="$landSlug" :data="$data" :type="$type" :evenOdd="$evenOdd" />
</section>