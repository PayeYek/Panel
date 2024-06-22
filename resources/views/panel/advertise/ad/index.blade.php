@php use App\Enum\AdvertiseStateEnum; @endphp
<x-layout.admin>

    <x-splade-table
        :for="$items"
        title="Advertise"
        pagination-scroll="preserve"
        striped
        search-debounce="1000"
        :primaryLink="route('panel.advertise.ad.create')"
    >

        @cell('advertise', $item)
        <Link href="{{ route('panel.advertise.state', $item) }}" slideover
              class="flex flex-col pe-10">
        <div class="flex gap-4">
            <img class="size-14 object-cover rounded shrink-0" src="{{$item->image}}"
                 alt="{{$item->title}}">
            <div class="flex flex-col py-1">
                <span class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->title}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500 divide-x divide-x-reverse ">
                    @if($item->agreement)
                        <span class="text-xs">{{__('Agreement')}}</span>
{{--                        <svg class="h-3 w-3 fill-current opacity-50" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 33C28.9706 33 33 28.9706 33 24C33 19.0294 28.9706 15 24 15C19.0294 15 15 19.0294 15 24C15 28.9706 19.0294 33 24 33Z" fill="currentColor" stroke="currentColor" stroke-width="2"></path></svg>--}}
                    @endif
                    @if($item->exchange)
                        <span class="text-xs">{{__('Exchange')}}</span>
{{--                        <svg class="h-3 w-3 fill-current opacity-50" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 33C28.9706 33 33 28.9706 33 24C33 19.0294 28.9706 15 24 15C19.0294 15 15 19.0294 15 24C15 28.9706 19.0294 33 24 33Z" fill="currentColor" stroke="currentColor" stroke-width="2"></path></svg>--}}
                    @endif
                </div>
            </div>
        </div>
        </Link>
        @endcell

        @cell('title', $item)
        <Link href="{{ route('panel.advertise.state', $item) }}" slideover>
        <strong>{{$item->title}}</strong>
        </Link>
        @endcell


        @cell('category.title', $item)
        <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 cursor-default">{{$item->category->title}}</span>
        @endcell

        @cell('state', $item)
        <Link href="{{ route('panel.advertise.state', $item) }}" slideover>
            @if(AdvertiseStateEnum::PENDING === $item->state)
                <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{__('Pending')}}</span>
            @elseif(AdvertiseStateEnum::APPROVED === $item->state)
                <span class="bg-green-100 text-green-800 text-xs px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{__('Approved')}}</span>
            @elseif(AdvertiseStateEnum::EXPIRED === $item->state)
                <span class="bg-gray-100 text-gray-800 text-xs px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{__('Expired')}}</span>
            @elseif(AdvertiseStateEnum::REJECTED === $item->state)
                <span class="bg-red-100 text-red-800 text-xs px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{__('Rejected')}}</span>
            @endif
        </Link>
        @endcell

        {{--UPDATED_AT--}}
        @cell('published_at', $item)
        <span dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->published_at) : $item->published_at }}</span>
        @endcell

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
