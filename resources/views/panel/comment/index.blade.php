<x-layout.admin>

    <x-splade-table :for="$items" search-debounce="1000" striped
{{--                    :primaryLink="route('panel.comment.create')"--}}
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
            href="{{ $item->approved == 0 ? route('panel.comment.publish', $item->id) : route('panel.comment.hidden', $item->id)}}"
            class="flex flex-col pe-10">
        <div class="flex gap-2">
            <img class="h-16 w-16 rounded" src="{{$item->commentable->thumbnail}}"
                 alt="{{$item->commentable->title}}">
            <div class="flex flex-col">
                <span>{{$item->commentable->title}}</span>
                <div class="flex gap-1 items-center mt-2 opacity-75 dark:opacity-50">
                    <svg class="size-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M18 18.86h-.76c-.8 0-1.56.31-2.12.87l-1.71 1.69c-.78.77-2.05.77-2.83 0l-1.71-1.69c-.56-.56-1.33-.87-2.12-.87H6c-1.66 0-3-1.33-3-2.97V4.98c0-1.64 1.34-2.97 3-2.97h12c1.66 0 3 1.33 3 2.97v10.91c0 1.63-1.34 2.97-3 2.97z" opacity=".4"></path>
                        <path d="M12 10.41a2.33 2.33 0 100-4.66 2.33 2.33 0 000 4.66zM14.68 15.06c.81 0 1.28-.9.83-1.57-.68-1.01-2-1.69-3.51-1.69-1.51 0-2.83.68-3.51 1.69-.45.67.02 1.57.83 1.57h5.36z"></path>
                    </svg>
                    <span class="text-xs">{{$item->user->fullName()}}</span>
                    <svg class="size-3 fill-current opacity-50" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 33C28.9706 33 33 28.9706 33 24C33 19.0294 28.9706 15 24 15C19.0294 15 15 19.0294 15 24C15 28.9706 19.0294 33 24 33Z" fill="currentColor" stroke="currentColor" stroke-width="2"></path></svg>
                    <div class="inline-flex items-center shrink-0">
                        @for($i = 1 ; $i <= 5 ; $i++)
                            <svg class="size-4 {{$i <= $item->star ? 'fill-amber-500' : 'fill-gray-500 opacity-50'}}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path>
                            </svg>
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
            <svg class="h-4 w-4 fill-amber-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path>
            </svg>
            <span>{{$item->star}}</span>
        </div>
        @endcell


        <x-layout.panel.timestamps/>


        {{--ACTION--}}
        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="comment" :item="$item"/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="comment" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell
    </x-splade-table>

</x-layout.admin>
