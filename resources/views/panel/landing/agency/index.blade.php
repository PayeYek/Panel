<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.landing.agency.create')"
                    :title="__('Agency list')"
                    pagination-scroll="preserve"
    >

        @cell('type', $item)
        @if($item->type == 'sell')
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{__('Sell')}}</span>
        @endif
        @if($item->type == 'news')
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">{{__('News')}}</span>
        @endif
        @if($item->type == 'blog')
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">{{__('Blog')}}</span>
        @endif
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.agency" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.agency" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
