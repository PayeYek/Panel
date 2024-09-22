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
        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.97 2h-2c-5 0-7 2-7 7v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2" opacity=".4"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.88 3.56c-1.23 3.07-4.32 7.25-6.9 9.32l-1.58 1.26c-.2.15-.4.27-.63.36 0-.15-.01-.3-.03-.46-.09-.67-.39-1.3-.93-1.83-.55-.55-1.21-.86-1.89-.95-.16-.01-.32-.02-.48-.01.09-.25.22-.48.39-.67L11.09 9c2.07-2.58 6.26-5.69 9.32-6.92.47-.18.93-.04 1.22.25.3.3.44.76.25 1.23z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12.78 14.49c0 .88-.34 1.72-.97 2.36-.49.49-1.15.83-1.94.93l-1.97.21a1.7 1.7 0 01-1.87-1.88l.21-1.97c.19-1.75 1.65-2.87 3.21-2.9.16-.01.32 0 .48.01.68.09 1.34.4 1.89.95.54.54.84 1.16.93 1.83.02.16.03.32.03.46z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.82 11.98c0-2.09-1.69-3.79-3.79-3.79" opacity=".4"></path>
        </svg>

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
