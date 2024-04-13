<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.landing.slide.create')"
                    :title="__('Slide list')"
                    pagination-scroll="preserve"
    >
        {{--'land_id',
                        'image',
                        'alt',
                        'link',
                        'view',
                        'status',
                        'published_at',
                        'expired_at',--}}

        @cell('slide', $item)
        <Link
            slideover
            href="{{ route('panel.landing.slide.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <img class="aspect-2 h-14 rounded shrink-0" src="{{$item->image}}"
                 alt="{{$item->alt}}">
            <div class="flex flex-col">
                <span class="truncate max-w-60">{{$item->alt}}</span>
{{--                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">--}}
{{--                    <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">--}}
{{--                        <x-iconsax-bul-mouse-square class="h-5 w-5 fill-current"/>--}}
{{--                        <span class="font-bold">{{$item->view}}</span>--}}
{{--                    </div>--}}
{{--                    --}}{{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}
{{--                    --}}{{--                    <span class="text-xs">{{$item->title}}</span>--}}

{{--                </div>--}}

                <span
                    class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->land->title}}</span>
            </div>
        </div>
        </Link>
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

        @cell('status', $item)
        @if($item->status)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">{{__('Visible')}}</span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">{{__('Invisible')}}</span>
        @endif
        @endcell

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.slide" :item="$item" slideover/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.slide" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
