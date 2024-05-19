<x-layout.admin>

    <x-splade-table :for="$specs"
                    :primaryLink="route('panel.ad.specification.create')"
                    :title="__('Specifications list')"
                    pagination-scroll="preserve"
    >

        <x-layout.panel.timestamps/>

        @cell('action', $spec)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="ad.specification" :item="$spec"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="ad.specification" :item="$spec"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
