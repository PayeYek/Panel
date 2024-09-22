<x-layout.admin>

    <x-splade-table :for="$items" search-debounce="1000" striped
                    :primaryLink="route('panel.landing.sales-expert.create')"
                    :title="__('Sales Expert list')"
                    pagination-scroll="preserve"
    >
        <x-layout.panel.timestamps/>

        {{--EDIT--}}
        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.sales-expert" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.sales-expert" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell
    </x-splade-table>

</x-layout.admin>
