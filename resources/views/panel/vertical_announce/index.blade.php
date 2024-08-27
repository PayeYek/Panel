<x-layout.admin>

    <x-splade-table :for="$items" search-debounce="1000" striped
                    :primaryLink="route('panel.vertical_announce.create')"
                    :title="__('Announce list')"
                    {{-- slideover--}}
                    pagination-scroll="preserve"
    >

        @cell('status', $item)
        @if($item->status)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">{{__('Active')}}</span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">{{__('Inactive')}}</span>
        @endif
        @endcell


        {{--LINK--}}
        @cell('link', $item)
        <a href="{{$item->link}}" target="_blank"
           class="hover:bg-green-500 dark:hover:bg-green-500 border border-gray-300 hover:border-transparent dark:hover:border-transparent dark:border-current py-1.5 px-2.5 inline-flex justify-center items-center gap-1 rounded-lg text-gray-700 align-middle transition-all text-sm hover:text-white dark:text-gray-400 dark:hover:text-white">
            <span class="uppercase">{{__('Link')}}</span>
        </a>
        @endcell

        <x-layout.panel.timestamps/>


        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="vertical_announce" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="vertical_announce" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell
    </x-splade-table>

</x-layout.admin>
