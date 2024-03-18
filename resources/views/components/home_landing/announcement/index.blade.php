@props([
    'type' => '1',
    'data' => '',
    'land' => null,
    'landSlug' => '/',
    'fontFamily' => '1',
    'colorPalette' => '1',
    'borderType' => '0',
    'evenOdd' => '0',
    'landType' => 1,
    // 'showSectionTitle' => true,
])

<section class="mb-4 lg:mb-16 relative {{ $type == 2 || $type == 5 ? 'lg:default_container' : 'default_container' }}">
    @switch($landType)
        @case(1)
            <h3 class="mb-2 text-base sm:text-lg font-medium text-center text-stone-700"> آخرین اخبار و اطلاعیه ها </h3>
            <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
            {{-- show all --}}
            <Link href="{{ route('landing.article.list', ['page' => $landSlug]) }}" class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block float-left px-2 cursor-pointer"> نمایش همه </Link>
        @case(2)
            <div class="flex items-center gap-4 mb-2 lg:mb-4">
                {{-- circle --}}
                <div class="size-3 rounded-full bg-normal"></div>
                <h3 class="mb-2 text-xl font-normal text-center text-stone-700"> آخرین اخبار و مقالات </h3>
                <Link href="{{ route('landing.article.list', ['page' => $landSlug]) }}" class="text-normal text-base font-medium hidden sm:block"> (مشاهده همه) </Link>
            </div>
        @break
    @default
        
@endswitch

    <x-home_landing.announcement.children.announcements :landSlug="$landSlug" :data="$data" :land="$land" :type="$type" :evenOdd="$evenOdd" />
</section>