<x-layout.admin>

    <x-splade-table :for="$items" search-debounce="1000" striped
                    :primaryLink="route('panel.marketing.campaign.create')"
                    :title="__('Campaign list')"
                    slideover
                    pagination-scroll="preserve"
    >

        @cell('campaign', $item)
        <Link modal
              href="{{ route('panel.marketing.campaign.edit', $item->id) }}"
              class="flex flex-col pe-10">

        <div class="flex flex-col">
            <span>{{$item->title}}</span>
            <div class="flex gap-1 items-center text-xs mt-2">
                <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">
                    <x-iconsax-bul-percentage-circle class="h-5 w-5 fill-current"/>
                    <span class="font-bold">{{$item->percent}}</span>
                </div>

                <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>

                @if(\Carbon\Carbon::parse($item->expired_at)->isPast())
                    <span class="text-gray-600 dark:text-gray-500">{{ __('Expired') }}</span>
                @else
                    <span class="text-teal-600 dark:text-teal-500">{{ __('Valid for') . ' ' . $item->created_at->diffInDays($item->expired_at) . ' ' . __('Day')  }}</span>
                @endif
            </div>

            <div class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white mt-2">{!! $item->description !!}</div>
        </div>
        </Link>
        @endcell

        {{--CODE--}}
        @cell('code', $item)
        <span dir="ltr"
           class="selection:bg-amber-500 font-inter tracking-widest cursor-pointer border border-dashed hover:select-all border-gray-300 dark:border-current py-0.5 px-3 inline-flex justify-center items-center gap-1 rounded-sm text-gray-700 align-middle transition-all hover:text-black dark:text-gray-400 dark:hover:text-white">
           {{$item->code}}
        </span>
        @endcell

        {{--EXPIRED_AT--}}
        @cell('expired_at', $item)
        <span dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->expired_at) : $item->expired_at }}</span>
        @endcell


        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <Link {{--slideover--}}
                      href="{{ route('panel.marketing.campaign.edit', $item->id) }}"
                      class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
                <x-iconsax-lin-edit class="shrink-0 w-4 h-4"/>
                <span>{{ __('Edit') }}</span>
                </Link>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <Link method="delete" confirm
                      href="{{ route('panel.marketing.campaign.destroy', $item->id) }}"
                      class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <x-iconsax-lin-trash class="shrink-0 w-4 h-4"/>
                <span>{{ __('Delete') }}</span>
                </Link>

            </div>
        </x-layout.panel.more-buttons>
        @endcell

        <x-layout.panel.timestamps/>

    </x-splade-table>

</x-layout.admin>
