<x-layout.admin>

    <x-splade-table :for="$items" search-debounce="1000" striped
                    :primaryLink="route('panel.marketing.card.create')"
                    :title="__('Card list')"
                    slideover
                    {{--:desc="__('test test test')"--}}
                    pagination-scroll="preserve"
    >
        @cell('card', $item)
        <Link
            slideover
            href="{{ route('panel.marketing.card.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <img class="h-14 rounded shrink-0 {{ $item->type ? 'aspect-2' : 'aspect-1' }}"
                 src="{{$item->type ? $item->image : $item->background}}"
                 alt="{{$item->title}}">
            <div class="flex flex-col">
                <span>{{$item->title}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
                    <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">
                        <x-iconsax-bul-mouse-square class="h-5 w-5 fill-current"/>
                        <span class="font-bold">{{$item->view}}</span>
                    </div>
                    {{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}
                    {{--                    <span class="text-xs">{{$item->title}}</span>--}}

                </div>

                <span
                    class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->description}}</span>
            </div>
        </div>
        </Link>

        @endcell

        @cell('type', $item)
        @if($item->type)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{__('Circle')}}</span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">{{__('Rectangle')}}</span>
        @endif
        @endcell


        @cell('status', $item)
        @if($item->status)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">{{__('Visible')}}</span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">{{__('Invisible')}}</span>
        @endif
        @endcell


        {{--LINK--}}
        @cell('link', $item)
        <a href="{{$item->link}}" dir="ltr" target="_blank"
           class="hover:bg-green-500 dark:hover:bg-green-500 border border-gray-300 hover:border-transparent dark:hover:border-transparent dark:border-current py-1.5 px-2.5 inline-flex justify-center items-center gap-1 rounded-lg text-gray-700 align-middle transition-all text-sm hover:text-white dark:text-gray-400 dark:hover:text-white">
            <x-heroicon-s-globe-alt class="flex-shrink-0 w-4 h-4"/>
            <span class="uppercase">{{__('Link')}}</span>
        </a>
        @endcell


        {{--PUBLISHED_AT--}}
        @cell('published_at', $item)
        <span dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->published_at) : $item->published_at }}</span>
        @endcell

        {{--EXPIRED_AT--}}
        @cell('expired_at', $item)
        <span dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->expired_at) : $item->expired_at }}</span>
        @endcell

        <x-layout.panel.timestamps/>


        {{--EDIT--}}
        @cell('action', $item)

        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                {{--<span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">{{__('Actions')}}</span>--}}
                <Link slideover
                      href="{{ route('panel.marketing.card.edit', $item) }}"
                      class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
                <x-iconsax-lin-edit class="shrink-0 w-4 h-4"/>
                <span>{{ __('Edit') }}</span>
                </Link>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <Link method="delete" confirm
                      href="{{ route('panel.marketing.card.destroy', $item) }}"
                      class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <x-iconsax-lin-trash class="shrink-0 w-4 h-4"/>
                <span>{{ __('Delete') }}</span>
                </Link>

            </div>
        </x-layout.panel.more-buttons>
        @endcell
    </x-splade-table>

</x-layout.admin>
