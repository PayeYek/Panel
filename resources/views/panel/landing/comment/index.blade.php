<x-layout.admin>

    <x-splade-table :for="$items" search-debounce="1000" striped
                    :primaryLink="route('panel.landing.comment.create')"
                    :title="__('Comment list')"
                    slideover
                    pagination-scroll="preserve"
    >
        @cell('approved', $item)
        <Link
            confirm="{{__('Publish confirmation')}}"
            confirm-text="{{$item->comment}}"
            confirm-button="{{$item->approved == 0 ? __('I approve its publication.') : __('Hide user comments from the others.')}}"
            cancel-button="{{__('No')}}"
            method="POST"
            href="{{ $item->approved == 0 ? route('panel.landing.comment.publish', $item->id) : route('panel.landing.comment.hidden', $item->id)}}"
            class="flex flex-col pe-10">
                @if($item->approved)
                    <span
                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white">{{__('Published')}}</span>
                @else
                    <span
                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{__('Unconfirmed')}}</span>
                @endif
        </Link>
        @endcell


        <x-layout.panel.timestamps/>


        {{--EDIT--}}
        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="landing.comment" :item="$item" slideover/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="landing.comment" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell
    </x-splade-table>

</x-layout.admin>
