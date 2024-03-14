@props([
    'type' => '1',
    'evenOdd' => '0',
    'data' => '',
    'borderType' => '0',
    'landSlug' => '',
    'companyName' => 'آرین دیزل',
    'showSectionTitle' => true,
])


<section class="mb-4 lg:mb-16 relative z-[1] default_container">
    @if ($showSectionTitle == true)
        <h3  class="mb-2 text-base sm:text-lg font-bold text-center text-stone-700"> محصولات شرکت {{ $companyName }} </h3>
        <hr class="w-60 sm:w-96 border-normal mb-6 lg:mb-0 mx-auto" />
        {{-- show all --}}
        <Link href="#" class="text-base font-normal text-normal mr-auto mb-3 hidden lg:inline-block float-left px-2 cursor-pointer"> نمایش همه </Link>
    @endif

    <x-home_landing.products.children.products :type="$type" :evenOdd="$evenOdd" :data="$data" :landSlug="$landSlug" :borderType="$borderType" />
</section>