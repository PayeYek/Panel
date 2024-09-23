@php use App\Enum\AdvertiseStateEnum; @endphp
<x-layout.admin>

    <x-splade-table
        :for="$items"
        title="Advertise"
        pagination-scroll="preserve"
        striped
        :primaryLink="route('panel.ad.create')"
    >

        @cell('state', $item)

        @if($item->state === AdvertiseStateEnum::PENDING)
            <Link
                confirm="{{__('Change state')}}"
                confirm-text="{{__('Change advertise state')}}"
                confirm-button="{{__('Approve the advertise')}}"
                cancel-button="{{__('No')}}"
                method="POST"
                href="{{ route('api.ad.approveAdvertise', $item->id) }}"
                class="flex flex-col pe-10">

            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-white">{{ __('Pending') }}
            </span>
            </Link>
        @elseif($item->state === AdvertiseStateEnum::APPROVED)
            <Link
                confirm="{{__('Change state')}}"
                confirm-text="{{__('Change advertise state')}}"
                confirm-button="{{__('Reject the advertise')}}"
                cancel-button="{{__('No')}}"
                method="POST"
                href="{{ route('api.ad.rejectAdvertise', $item->id) }}"
                class="flex flex-col pe-10">

            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">{{ __('Approved') }}
                </span>
             </Link>
        @elseif($item->state === AdvertiseStateEnum::REJECTED)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{ __('Rejected') }}
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
                <x-layout.panel.list.edit table="ad" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="ad" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
