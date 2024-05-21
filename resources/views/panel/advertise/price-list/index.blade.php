<x-layout.admin>

    <x-splade-table
        :for="$priceLists"
        title="Price List"
        pagination-scroll="preserve"
        striped
        :primaryLink="route('panel.ad.priceList.create')"
    >

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="ad.priceList" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="ad.priceList" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
