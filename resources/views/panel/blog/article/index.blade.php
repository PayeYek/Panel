<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.blog.article.create')"
                    :title="__('Article list')"
                    pagination-scroll="preserve"
    >

        @cell('article', $item)
        <Link
            slideover
            href="{{ route('panel.blog.article.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <img class="aspect-2 h-14 rounded shrink-0" src="{{$item->image}}"
                 alt="{{$item->title}}">
            <div class="flex flex-col">
                <span class="truncate max-w-60">{{$item->title}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
                    {{--                    <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">--}}
                    {{--                        <x-iconsax-bul-mouse-square class="h-5 w-5 fill-current"/>--}}
                    {{--                        <span class="font-bold">{{$item->view}}</span>--}}
                    {{--                    </div>--}}
                    {{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}
                    {{--                    <span class="text-xs">{{$item->title}}</span>--}}

                </div>

                <span
                    class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->company->title}}</span>
            </div>
        </div>
        </Link>
        @endcell
        @cell('published_at', $item)
        @if(\Carbon\Carbon::parse($item->published_at)->isPast())
            <span>{{ __('Published') }}</span>
        @else
            <span dir="ltr">
        {{ \App\Support\Help::isRTL() ? jdate($item->published_at) : $item->published_at }}
            </span>
        @endif
        @endcell
        @cell('publish', $item)
        @if($item->publish === true)
            <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="green" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/>
            </svg>
        @else
            <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/>
            </svg>

        @endif
        @endcell

        @cell('pinned', $item)
        @if($item->pinned)
            <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="green" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/>
            </svg>
        @else
            <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/>
            </svg>

        @endif
        @endcell

        @cell('type', $item)
        @if($item->type == 'sell')
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{__('Sell')}}</span>
        @endif
        @if($item->type == 'news')
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-500 text-white">{{__('News')}}</span>
        @endif
        @if($item->type == 'blog')
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-500 text-white">{{__('Blog')}}</span>
        @endif
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="blog.article" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="blog.article" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
