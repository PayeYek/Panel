<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.blog.company.create')"
                    :title="__('Company list')"
                    pagination-scroll="preserve"
    >

        @cell('company', $item)
        <Link
            slideover
            href="{{ route('panel.blog.company.edit', $item) }}"
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

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="blog.company" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="blog.company" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
