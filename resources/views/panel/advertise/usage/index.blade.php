<x-layout.admin>

    <x-splade-table
        :for="$usages"
        :primaryLink="route('panel.ad.usage.create')"
        :title="__('Usage list')"
        pagination-scroll="preserve"
    >

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="ad.usage" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="ad.usage" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
