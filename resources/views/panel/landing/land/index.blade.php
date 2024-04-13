<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.landing.land.create')"
                    :title="__('Landing list')"
                    pagination-scroll="preserve"
    >

        @cell('land', $item)
        <Link
            slideover
            href="{{ route('panel.landing.land.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <img class="aspect-2 h-14 rounded shrink-0" src="{{$item->logo}}"
                 alt="{{$item->title}}">
            <div class="flex flex-col">
                <span class="truncate max-w-60">{{$item->title}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
                    {{--                    <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">--}}
                    {{--                        <x-iconsax-bul-mouse-square class="h-5 w-5 fill-current"/>--}}
                    {{--                        <span class="font-bold">{{$item->view}}</span>--}}
                    {{--                    </div>--}}
                    {{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}
                    <span class="text-xs">{{Str::title(str_replace('-', ' ', $item->slug))}}</span>
                    {{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}
                    {{--                    <span class="text-xs">{{$item->model}}</span>--}}
                </div>

                {{--                <span--}}
                {{--                    class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->land->title}}</span>--}}
            </div>
        </div>
        </Link>
        @endcell

        @cell('style', $item)
        <Link href="{{ route('panel.landing.land.style.edit', $item->id) }}"
              class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-300 cursor-pointer">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.5 2.44L10 2l-.44 1.5L10 5l-1.5-.44L7 5l.44-1.5L7 2l1.5.44zM4.5 8.44L6 8l-.44 1.5L6 11l-1.5-.44L3 11l.44-1.5L3 8l1.5.44zM19.5 13.44L21 13l-.44 1.5L21 16l-1.5-.44L18 16l.44-1.5L18 13l1.5.44z"></path>
        </Link>
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.land" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.land" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
