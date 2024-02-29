@props([
    'type' => '1',
    'radius' => '8',
    'evenOdd' => 'false',
    'colorPalette' => '1',
    'data' => '',
    'landSlug' => '',
])


<section class="mb-4 lg:mb-16 relative z-[1] default_container">
    <h3 class="mb-4 text-lg font-bold text-center text-gray-900 lg:text-right lg:px-4"> برگزیده
        ها </h3>

    <x-home_landing.products.children.products :type="$type" :evenOdd="$evenOdd" :radius="$radius" :data="$data" :landSlug="$landSlug" :colorPalette="$colorPalette" />
</section>