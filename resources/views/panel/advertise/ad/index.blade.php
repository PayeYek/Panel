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
                <div class="flex items-center mt-2 text-gray-600 dark:text-gray-500 divide-x divide-gray-600 dark:divide-gray-500 !divide-opacity-50 rtl:divide-x-reverse *:px-2 first:*:ps-0 last:*:pe-0 ">
                    <span class="text-xs font-bold bg-gray-100 dark:bg-gray-700 dark:text-gray-300 !px-2.5 me-2 py-0.5 rounded-md">{{$item->tracking_code}}</span>
                    <span class="text-xs">0{{$item->mobile}}</span>
                    @if($item->agreement)
                        <span class="text-xs">{{__('Agreement')}}</span>
                    @endif
                    @if($item->exchange)
                        <span class="text-xs">{{__('Exchange')}}</span>
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

        @cell('price', $item)
        <div class="text-left">
            <span>{{\App\Support\Help::price($item->price)}}</span>
        </div>
        @endcell


        @cell('category.title', $item)
        @if($item->category)
            <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 cursor-default">{{$item->category->title}}</span>
        @else
            <span class="inline-flex gap-0.5 items-center bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-pink-400 cursor-default">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4.47 21h15.06c1.54 0 2.5-1.67 1.73-3L13.73 4.99c-.77-1.33-2.69-1.33-3.46 0L2.74 18c-.77 1.33.19 3 1.73 3zM12 14c-.55 0-1-.45-1-1v-2c0-.55.45-1 1-1s1 .45 1 1v2c0 .55-.45 1-1 1zm1 4h-2v-2h2v2z"></path></svg>
                {{__('Other')}}
            </span>
        @endif

        @endcell
{{--        @cell('province.title', $item)--}}
{{--        @if($item->category)--}}
{{--            <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 cursor-default">{{$item->category->title}}</span>--}}
{{--        @else--}}
{{--            <span class="inline-flex gap-0.5 items-center bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-pink-400 cursor-default">--}}
{{--                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4.47 21h15.06c1.54 0 2.5-1.67 1.73-3L13.73 4.99c-.77-1.33-2.69-1.33-3.46 0L2.74 18c-.77 1.33.19 3 1.73 3zM12 14c-.55 0-1-.45-1-1v-2c0-.55.45-1 1-1s1 .45 1 1v2c0 .55-.45 1-1 1zm1 4h-2v-2h2v2z"></path></svg>--}}
{{--                {{__('Other')}}--}}
{{--            </span>--}}
{{--        @endif--}}
{{--        @endcell--}}

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
