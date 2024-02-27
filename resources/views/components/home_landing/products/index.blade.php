@props([
    'type' => '1',
    'radius' => '8',
    'titleColor' => 'title_color_type_1',
    'defaultButtonColor' => 'button_color_type_warning_default',
    'actionButtonColor' => 'button_color_type_warning',
    'gapX' => '4',
    'gapY' => '4',
    'evenOdd' => 'false',
    'colorPalette' => '1',
    'data' => '',
    'landSlug' => '',
])

<section class="mb-4 lg:mb-16 relative z-[1] default_container">
    <h3 class="mb-4 text-lg font-bold text-center text-gray-900 lg:text-right dark:text-white lg:px-4"> برگزیده
        ها </h3>

    <x-home_landing.products.children.products :type="$type" :evenOdd="$evenOdd" :radius="$radius" :gapX="$gapX" :gapY="$gapY"
            :titleColor="$titleColor" :defaultButtonColor="$defaultButtonColor"
            :actionButtonColor="$actionButtonColor" :data="$data" :landSlug="$landSlug" />
</section>