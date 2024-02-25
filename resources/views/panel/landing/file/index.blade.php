<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.landing.file.create')"
                    :title="__('File list')"
                    pagination-scroll="preserve"
    >

        @cell('file', $item)
        <Link
            slideover
            href="{{ route('panel.landing.file.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            @if(in_array(strtolower($item->type), ['png', 'jpg', 'jpeg', 'gif']))
                <img class="aspect-2 h-14 rounded shrink-0" src="{{$item->path}}"
                     alt="{{$item->name}}">
            @endif
            <div class="flex flex-col">
                <span class="truncate max-w-60">{{$item->name}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
                    <span class="text-xs uppercase">{{$item->type}}</span>
                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>
                    <span class="text-xs">{{\App\Support\Help::formatSizeUnits($item->size)}}</span>
                </div>
            </div>
        </div>
        </Link>
        @endcell


        @cell('copy', $item)
        <div>
            <CopyText>{{$item->path}}</CopyText>
        </div>
        @endcell


        <x-layout.panel.timestamps/>


        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.file" :item="$item" slideover/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.file" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
