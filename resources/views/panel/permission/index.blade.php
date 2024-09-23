<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.permission.create')"
                    slideover
                    :title="__('Permissions List')"
                    pagination-scroll="preserve"
    >
        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="permission" :item="$item" slideover/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="permission" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
