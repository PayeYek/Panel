@php use App\Enum\LandFacilityStateEnum; @endphp
<x-layout.admin>

    <x-splade-table
        :for="$items"
        :title="__('Facility requests')"
        pagination-scroll="preserve"
    >

        @cell('comment', $item)
        @if($item->comment)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium">{{ __('Has it') }}
            </span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium">{{ __('Does not have') }}
            </span>
        @endif
        @endcell

        @cell('state', $item)
        @if($item->state)
            @if($item->state === LandFacilityStateEnum::PENDING)
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-white">{{ __($item->state->value) }}
                </span>
            @endif
            @if($item->state === LandFacilityStateEnum::REVIEWED)
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">{{ __($item->state->value) }}
                </span>
            @endif
            @if($item->state === LandFacilityStateEnum::CALLED)
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">{{ __($item->state->value) }}
                </span>
            @endif
            @if($item->state === LandFacilityStateEnum::RESTRICTED)
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{ __($item->state->value) }}
                </span>
            @endif
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
                <x-layout.panel.list.edit table="landing.facility" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.facility" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
