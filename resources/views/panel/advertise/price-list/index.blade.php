<x-layout.admin>

    <x-splade-table
        :for="$items"
        title="Daily price"
        pagination-scroll="preserve"
        striped
        search-debounce="1000"
        :primaryLink="route('panel.priceList.create')"
    >

        @cell('product_name', $item)
            <Link href="{{ route('panel.priceList.edit', $item) }}" slideover>
                <strong>{{$item->product_name}}</strong>
            </Link>
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="priceList" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="priceList" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
