@php use App\Enum\ContactUsStateEnum; @endphp
<x-layout.admin>

    <x-splade-table
        :for="$items"
        :title="__('Contact Us')"
        pagination-scroll="preserve"
    >

        @cell('message', $item)
        @if($item->message)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium">{{ __('Has it') }}
            </span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium">{{ __('Does not have') }}
            </span>
        @endif
        @endcell

        @cell('note', $item)
        @if($item->note)
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
            @if($item->state === ContactUsStateEnum::PENDING)
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-white">{{ __($item->state->value) }}
                </span>
            @endif
            @if($item->state === ContactUsStateEnum::REVIEWED)
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">{{ __($item->state->value) }}
                </span>
            @endif
            @if($item->state === ContactUsStateEnum::CALLED)
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">{{ __($item->state->value) }}
                </span>
            @endif
            @if($item->state === ContactUsStateEnum::RESTRICTED)
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
                <x-layout.panel.list.edit table="landing.contact" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.contact" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
