<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.landing.video.create')"
                    :title="__('Video list')"
                    pagination-scroll="preserve"
    >

        @cell('video', $item)
        <Link
            slideover
            href="{{ route('panel.landing.video.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            @if($item->image)
                <img class="aspect-2 h-14 rounded shrink-0" src="{{$item->image}}"
                     alt="{{$item->alt}}">
            @endif

            <div class="flex flex-col">
                <span class="truncate max-w-60">{{$item->alt}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
{{--                    <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">--}}
{{--                        <x-iconsax-bul-mouse-square class="h-5 w-5 fill-current"/>--}}
{{--                        <span class="font-bold">{{$item->view}}</span>--}}
{{--                    </div>--}}
                    <svg class="h-3 w-3 fill-current opacity-50" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 33C28.9706 33 33 28.9706 33 24C33 19.0294 28.9706 15 24 15C19.0294 15 15 19.0294 15 24C15 28.9706 19.0294 33 24 33Z" fill="currentColor" stroke="currentColor" stroke-width="2"></path></svg>
                    <span class="text-xs">{{$item->land->title}}</span>
                    <svg class="h-3 w-3 fill-current opacity-50" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 33C28.9706 33 33 28.9706 33 24C33 19.0294 28.9706 15 24 15C19.0294 15 15 19.0294 15 24C15 28.9706 19.0294 33 24 33Z" fill="currentColor" stroke="currentColor" stroke-width="2"></path></svg>
                    <span class="text-xs">{{$item->product->name}}</span>

                </div>
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
                <x-layout.panel.list.edit table="landing.video" :item="$item" slideover/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.video" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
