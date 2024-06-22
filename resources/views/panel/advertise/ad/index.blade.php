@php use App\Enum\AdvertiseStateEnum; @endphp
<x-layout.admin>

    <x-splade-table
        :for="$items"
        title="Advertise"
        pagination-scroll="preserve"
        striped
        search-debounce="1000"
        :primaryLink="route('panel.advertise.ad.create')"
    >

        @cell('title', $item)
        <Link href="{{ route('panel.advertise.state', $item) }}" slideover>
        <strong>{{$item->title}}</strong>
        </Link>
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="advertise.ad" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="advertise.ad" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
