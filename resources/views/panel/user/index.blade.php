<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.user.create')"
                    :title="__('User list')"
                    pagination-scroll="preserve"
    >
        @cell('user', $item)
        <span class="text-black dark:text-white">{{$item->fullName}}</span>
        @endcell

        @cell('gender', $item)
        @if($item->gender == 1)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">{{__('Male')}}</span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-pink-100 text-pink-800 dark:bg-pink-800/30 dark:text-pink-500">{{__('Female')}}</span>
        @endif
        @endcell

        @cell('role', $item)
        @if($item->hasRole('admin'))
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-600 text-white dark:bg-blue-500">{{__('Admin')}}</span>
        @else
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-white/10 dark:text-white">{{__('Customer')}}</span>
        @endif
        @endcell

        {{--BIRTHDATE--}}
        @cell('birthdate', $item)
        <span
            dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->birthdate) : $item->birthdate }}</span>
        @endcell

        {{--EMAIL_VERIFIED_AT--}}
        @cell('email_verified_at', $item)
        <span
            dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->email_verified_at) : $item->email_verified_at }}</span>
        @endcell

        <x-layout.panel.timestamps/>

        @cell('action', $item)
        <x-layout.panel.more-buttons>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.edit table="user" :item="$item" slideover/>
            </div>
            <div class="py-2 first:pt-0 last:pb-0">
                <x-layout.panel.list.destroy table="user" :item="$item"/>
            </div>
        </x-layout.panel.more-buttons>
        @endcell

    </x-splade-table>
</x-layout.admin>
