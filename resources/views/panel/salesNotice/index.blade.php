<x-layout.admin>
    <x-splade-table :for="$items"
                    :primaryLink="route('panel.noticeOfSale.list.create')"
                    :title="__('Notice List')"
                    pagination-scroll="preserve"
    >

        @cell('salesNotice', $item)
            <Link
                    slideover
                    href="{{ route('panel.noticeOfSale.list.edit', $item) }}"
                    class="flex flex-col pe-10">
            <div class="flex gap-2">
                <div class="flex flex-col">
                    <span class="truncate max-w-60">{{$item->title}}</span>

                    <span
                            class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->company->title}}</span>
                </div>
            </div>
            </Link>
        @endcell


        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="noticeOfSale.list" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="noticeOfSale.list" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
