<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.landing.product.brand.create')"
                    :title="__('Brand list')"
                    pagination-scroll="preserve"
    >

        @cell('brand', $item)
        <Link
            slideover
            href="{{ route('panel.landing.product.brand.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <img class="h-14 rounded shrink-0" src="{{$item->image}}"
                 alt="{{$item->title}}">
            <div class="flex flex-col">
                <span class="truncate max-w-60">{{$item->title}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
                    {{--                    <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">--}}
                    {{--                        <x-iconsax-bul-mouse-square class="h-5 w-5 fill-current"/>--}}
                    {{--                        <span class="font-bold">{{$item->view}}</span>--}}
                    {{--                    </div>--}}
                    {{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}
                    <span class="text-xs">{{__($item->country)}}</span>
                    {{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}
                    {{--                    <span class="text-xs">{{$item->model}}</span>--}}
                </div>

                {{--                <span--}}
                {{--                    class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->land->title}}</span>--}}
            </div>
        </div>
        </Link>
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.product.brand" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.product.brand" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
