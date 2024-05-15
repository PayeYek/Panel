@php use App\Enum\AdvertiseStateEnum; @endphp
<x-layout.admin>

    <x-splade-table
        :for="$items"
        title="Advertise"
        pagination-scroll="preserve"
        striped
        :primaryLink="route('panel.advertise.create')"
    >

        @cell('state', $item)
        @if($item->state === AdvertiseStateEnum::PENDING)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-white">{{ __('Pending') }}
                </span>
        @elseif($item->state === AdvertiseStateEnum::APPROVED)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">{{ __('Approved') }}
                </span>

        @elseif($item->state === AdvertiseStateEnum::EXPIRED)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{ __('Expired') }}
                </span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{ __('Unknown status') }}
            </span>
        @endif
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="advertise" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="advertise" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
