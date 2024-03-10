@props([
    'type' => '1',
    'evenOdd' => 'false',
    'data' => '',
    'landSlug' => '',
    'showSectionTitle' => true,
])


<section class="mb-4 lg:mb-16 relative z-[1] default_container">
    @if ($showSectionTitle == true)
        <h3  class="mb-4 text-xl font-normal lg:text-2xl text-center text-gray-900 lg:text-right lg:px-4"> برگزیده ها </h3>
    @endif

    <x-home_landing.products.children.products :type="$type" :evenOdd="$evenOdd" :data="$data" :landSlug="$landSlug" />
</section>