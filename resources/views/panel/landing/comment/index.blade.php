<x-layout.admin>

    <x-splade-table :for="$items" search-debounce="1000" striped
                    :primaryLink="route('panel.landing.comment.create')"
                    :title="__('Comment list')"
                    slideover
                    {{--:desc="__('test test test')"--}}
                    pagination-scroll="preserve"
    >
        @cell('view', $item)

        <Link
            confirm="{{$item->user->fullname() . ' (' . $item->commentable->title.')'}}"
            confirm-text="{{$item->comment}}"
            confirm-button="{{$item->approved == 0 ? __('I approve its publication.') : __('Hide user comments from the others.')}}"
            cancel-button="{{__('No')}}"
            method="POST"
            href="{{ $item->approved == 0 ? route('panel.landing.comment.publish', $item->id) : route('panel.interaction.comment.hidden', $item->id)}}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <img class="h-16 w-16 rounded" src="{{$item->commentable->thumbnail}}"
                 alt="{{$item->commentable->title}}">
            <div class="flex flex-col">
                <span>{{$item->commentable->title}}</span>
                <div class="flex gap-1 items-center mt-2 opacity-75 dark:opacity-50">
                    <x-iconsax-bul-user-tag class="h-5 w-5 fill-current"/>
                    <span class="text-xs">{{$item->user->fullname()}}</span>
                    <x-iconpark-dot-o class="h-3 w-3 fill-current opacity-50"/>
                    <div class="inline-flex items-center shrink-0">
                        @for($i = 1 ; $i <= 5 ; $i++)
                            <x-heroicon-s-star
                                class="h-4 w-4 {{$i <= $item->star ? 'fill-amber-500' : 'fill-gray-500 opacity-50'  }}"/>
                        @endfor
                    </div>
                </div>

                <span class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->comment}}</span>
            </div>
        </div>
        </Link>

        @endcell

        @cell('approved', $item)
        @if($item->approved)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">{{__('Published')}}</span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{__('Unconfirmed')}}</span>
        @endif
        @endcell

        @cell('star', $item)
        <div class="inline-flex items-center shrink-0 gap-1">
            <x-heroicon-s-star class="h-4 w-4 fill-amber-500"/>
            <span>{{$item->star}}</span>
        </div>
        @endcell


        <x-layout.panel.timestamps/>


        {{--EDIT--}}
        @cell('action', $item)

        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                {{--<span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">{{__('Actions')}}</span>--}}
                <Link slideover
                      href="{{ route('panel.landing.comment.edit', $item) }}"
                      class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
                <x-iconsax-lin-edit class="shrink-0 w-4 h-4"/>
                <span>{{ __('Edit') }}</span>
                </Link>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <Link method="delete" confirm
                      href="{{ route('panel.landing.comment.destroy', $item) }}"
                      class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <x-iconsax-lin-trash class="shrink-0 w-4 h-4"/>
                <span>{{ __('Delete') }}</span>
                </Link>

            </div>
        </x-layout.panel.more-buttons>
        @endcell
    </x-splade-table>

</x-layout.admin>
