<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.advertise.tag.create')"
                    :title="__('Tag list')"
                    pagination-scroll="preserve"
                    slideover
    >

        @cell('tag', $item)
        <Link
            slideover
            href="{{ route('panel.advertise.tag.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <div class="flex flex-col">
                <span class="truncate max-w-60">{{$item->title}}</span>
            </div>
        </div>
        </Link>
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="advertise.tag" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="advertise.tag" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
