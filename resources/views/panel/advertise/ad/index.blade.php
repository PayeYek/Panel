@php use App\Enum\AdvertiseStateEnum; @endphp
<x-layout.admin>

    <x-splade-table
        :for="$items"
        title="Advertise"
        pagination-scroll="preserve"
        striped
        :primaryLink="route('panel.advertise.ad.create')"
    >

  {{--      @cell('state', $item)

        @if($item->state == false)
            <Link
                confirm="{{__('Are you sure to change the advertise state?')}}"
--}}{{--                confirm-text="{{__('Change advertise state')}}"--}}{{--
                confirm-button="{{__('Approve the advertise')}}"
                cancel-button="{{__('No')}}"
                method="POST"
                href="{{ route('api.ad.approveAdvertise', $item->id) }}"
                class="flex flex-col pe-10">
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-white">تایید نشده
            </span>
            </Link>
        @elseif($item->state == true)
            <Link
                confirm="{{__('Are you sure to change the advertise state?')}}"
--}}{{--                confirm-text="{{__('Change advertise state')}}"--}}{{--
                confirm-button="{{__('Reject the advertise')}}"
                cancel-button="{{__('No')}}"
                method="POST"
                href="{{ route('api.ad.rejectAdvertise', $item->id) }}"
                class="flex flex-col pe-10">

            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">{{ __('Approved') }}
                </span>
            </Link>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{ __('Unknown status') }}
            </span>
        @endif
        @endcell--}}

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
