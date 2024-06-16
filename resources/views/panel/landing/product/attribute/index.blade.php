<x-layout.admin>
    <Link href="{{ route('panel.landing.product.attribute.priority.edit') }}" slideover
          class="group mb-4 flex items-center gap-3 md:max-w-fit px-6 py-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <svg class="size-12 text-gray-500 dark:text-gray-400 group-hover:text-primary-700 group-hover:dark:text-primary-600 group-hover:rotate-180 transition-all duration-500" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path
            d="M11.5757 1.42426C11.81 1.18995 12.1899 1.18995 12.4243 1.42426L22.5757 11.5757C22.81 11.81 22.8101 12.1899 22.5757 12.4243L12.4243 22.5757C12.19 22.81 11.8101 22.8101 11.5757 22.5757L1.42426 12.4243C1.18995 12.19 1.18995 11.8101 1.42426 11.5757L11.5757 1.42426Z"
            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M12 7L16 11M12 7L8 11.1667M12 7L12 16" stroke="currentColor" stroke-linecap="round"
              stroke-linejoin="round"></path>
    </svg>
    <div>
        <h5 class="mb-1 font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Sort attributes') }}</h5>
        <p class="font-normal text-sm text-gray-500 dark:text-gray-400">{{ __('Priority sort display') }}</p>
    </div>
    </Link>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.landing.product.attribute.create')"
                    :title="__('Attribute list')"
                    pagination-scroll="preserve"
    >

        @cell('attribute', $item)

        <Link
            slideover
            href="{{ route('panel.landing.product.attribute.edit', $item) }}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            {{--            <img class="aspect-2 h-14 rounded shrink-0" src="{{$item->thumbnail}}"--}}
            {{--                 alt="{{$item->title}}">--}}
            <div class="flex flex-col">
                <span class="truncate max-w-60 {{$item->parent_id ? '' : 'font-bold'}}">{{$item->name}}</span>
                <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
                    @if($item->parent_id)
                        <div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                      stroke-width="1.5" d="M9.57 5.93L3.5 12l6.07 6.07"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                      stroke-width="1.5" d="M20.5 12H3.67" opacity=".4"></path>
                            </svg>
                            <span class="text-xs">{{$item->parent->name}}</span>
                        </div>
                    @endif


                    {{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}

                    {{--                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>--}}
                    {{--                    <span class="text-xs">{{$item->model}}</span>--}}
                </div>

                {{--                <span--}}
                {{--                    class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->land->title}}</span>--}}
            </div>
        </div>
        </Link>
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.product.attribute" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.product.attribute" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>


</x-layout.admin>
