<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.advertise.category.create')"
                    :title="__('Category list')"
                    pagination-scroll="preserve"
    >

        @cell('category', $item)

        <Link
            slideover
            href="{{ route('panel.advertise.category.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <div class="flex flex-col">
                <span class="truncate max-w-60 {{$item->parent_id ? '' : 'font-bold'}}">{{$item->title}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
                    @if($item->parent_id)
                        <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                      stroke-width="1.5" d="M9.57 5.93L3.5 12l6.07 6.07"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                      stroke-width="1.5" d="M20.5 12H3.67" opacity=".4"></path>
                            </svg>
                            <span class="text-xs">{{$item->parent->title}}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </Link>
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="advertise.category" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="advertise.category" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
