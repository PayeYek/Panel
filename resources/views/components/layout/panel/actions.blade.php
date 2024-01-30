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
