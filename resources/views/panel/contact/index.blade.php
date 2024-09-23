<x-layout.admin>

    <x-splade-table :for="$items" search-debounce="1000" striped
                    :title="__('Call request list')"
                    pagination-scroll="preserve"
    >
        @cell('request', $item)
        <Link modal
              href="{{ route('panel.interaction.contact.edit', $item->id) }}"
            class="flex flex-col pe-10">

            <div class="flex flex-col">
                <div class="flex gap-1 items-center opacity-75 dark:opacity-50">
                    <x-iconsax-bul-user-tag class="h-5 w-5 fill-current"/>
                    <span class="text-xs">{{$item->name}}</span>
                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>
                    <span dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->created_at)->ago() : $item->created_at->diffForHumans() }}</span>
                </div>

                <span class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white mt-2">{{$item->text}}</span>
            </div>
        </Link>
        @endcell

        @cell('tel', $item)
        <a href="tel:{{$item->tel}}" dir="ltr"
                class="hover:bg-green-500 dark:hover:bg-green-500 border border-gray-300 hover:border-transparent dark:hover:border-transparent dark:border-current py-1.5 px-2.5 inline-flex justify-center items-center gap-1 rounded-lg text-gray-700 align-middle transition-all text-sm hover:text-white dark:text-gray-400 dark:hover:text-white">
            <x-heroicon-s-phone class="flex-shrink-0 w-4 h-4"/>
            <span>{{$item->tel}}</span>
        </a>
        @endcell


        @cell('status', $item)
        @if($item->status->value === \App\Enums\ContactUsStatus::Done->value)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">{{__('Done')}}</span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{__('Waiting')}}</span>
        @endif
        @endcell


        @cell('action', $item)

        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <Link slideover
                      href="{{ route('panel.interaction.contact.edit', $item->id) }}"
                      class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
                <x-iconsax-lin-edit class="shrink-0 w-4 h-4"/>
                <span>{{ __('Edit') }}</span>
                </Link>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <Link method="delete" confirm
                      href="{{ route('panel.interaction.contact.destroy', $item) }}"
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
