@php use App\Enum\GenderTypeEnum; @endphp
@php use App\Support\Help; @endphp
<x-layout.admin>

    <x-splade-table :for="$items"
                    :primaryLink="route('panel.user.create')"
                    title="Users"
                    pagination-scroll="preserve"
    >

        @cell('user', $item)
        <Link href="{{ route('panel.user.edit', $item) }}" slideover
              class="flex flex-col pe-10">
        <div class="flex gap-2">
            {{-- ICON --}}
            <div class="size-14 shrink-0 grid place-items-center">
                @if( $item->isAuthRequested())
                    <svg class="size-12 text-amber-600" xmlns="http://www.w3.org/2000/svg" width="1em"
                         height="1em"
                         viewBox="0 0 256 256">
                        <g fill="currentColor">
                            <path
                                d="M224 128a95.76 95.76 0 0 1-31.8 71.37A72 72 0 0 0 128 160a40 40 0 1 0-40-40a40 40 0 0 0 40 40a72 72 0 0 0-64.2 39.37A96 96 0 1 1 224 128"
                                opacity="0.2"/>
                            <path
                                d="m253.66 133.66l-24 24a8 8 0 0 1-11.32 0l-24-24a8 8 0 0 1 11.32-11.32L216 132.69V128A88 88 0 0 0 56.49 76.67a8 8 0 0 1-13-9.34A104 104 0 0 1 232 128v4.69l10.34-10.35a8 8 0 0 1 11.32 11.32m-41.18 55A104 104 0 0 1 24 128v-4.69l-10.34 10.35a8 8 0 0 1-11.32-11.32l24-24a8 8 0 0 1 11.32 0l24 24a8 8 0 0 1-11.32 11.32L40 123.31V128a87.62 87.62 0 0 0 22.24 58.41a79.66 79.66 0 0 1 36.06-28.75a48 48 0 1 1 59.4 0a79.6 79.6 0 0 1 36.08 28.78a90 90 0 0 0 5.71-7.11a8 8 0 0 1 13 9.34ZM128 152a32 32 0 1 0-32-32a32 32 0 0 0 32 32m0 64a88.2 88.2 0 0 0 53.92-18.49a64 64 0 0 0-107.84 0A87.57 87.57 0 0 0 128 216"/>
                        </g>
                    </svg>

                @else
                    <svg
                        class="size-12 {{ $item->isAuthenticated() ? 'text-green-700 dark:text-green-500' : 'dark:text-gray-400' }}"
                        xmlns="http://www.w3.org/2000/svg"
                        width="1em" height="1em" viewBox="0 0 256 256">
                        <g fill="currentColor">
                            <path
                                d="M224 128a95.76 95.76 0 0 1-31.8 71.37A72 72 0 0 0 128 160a40 40 0 1 0-40-40a40 40 0 0 0 40 40a72 72 0 0 0-64.2 39.37A96 96 0 1 1 224 128"
                                opacity="0.2"/>
                            <path
                                d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24M74.08 197.5a64 64 0 0 1 107.84 0a87.83 87.83 0 0 1-107.84 0M96 120a32 32 0 1 1 32 32a32 32 0 0 1-32-32m97.76 66.41a79.66 79.66 0 0 0-36.06-28.75a48 48 0 1 0-59.4 0a79.66 79.66 0 0 0-36.06 28.75a88 88 0 1 1 131.52 0"/>
                        </g>
                    </svg>
                @endif
            </div>
            {{-- INFO --}}
            <div class="flex flex-col justify-center py-1">
                <span
                    class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->displayName()}}</span>
            </div>
        </div>
        </Link>
        @endcell

        @cell('gender', $item)
        @if($item->gender == GenderTypeEnum::MALE)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-600/30 dark:text-blue-300">{{__('Male')}}</span>
        @elseif($item->gender == GenderTypeEnum::FEMALE)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-pink-100 text-pink-800 dark:bg-pink-600/30 dark:text-pink-300">{{__('Female')}}</span>
        @elseif($item->gender == GenderTypeEnum::OTHER)
            <span
                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-100 text-pink-800 dark:bg-yellow-600/30 dark:text-yellow-300">{{__('Other')}}</span>
        @endif
        @endcell

        @cell('roles.name', $item)
        <div class="flex items-center gap-1">
            @foreach($item->roles as $role)
                <span
                    class="cursor-default inline-flex items-center gap-x-1.5 py-1 px-3 rounded-full text-xs {{
                    ($role->name === 'super-admin' || $role->name === 'admin') ?
                     'text-white bg-blue-600 dark:bg-blue-500' : 'bg-gray-200 text-gray-800 dark:bg-white/10 dark:text-white'
                    }}">
            {{ __(Str::title(Str::of($role->name)->replace('-', ' '))) }}
            </span>
            @endforeach
        </div>
        @endcell

        {{--BIRTHDATE--}}
        @cell('birthdate', $item)
        <span
            dir="ltr">{{ Help::isRTL() ? jdate($item->birthdate)->format('Y-m-d') : $item->birthdate }}</span>
        @endcell

        {{--EMAIL_VERIFIED_AT--}}
        @cell('email_verified_at', $item)
        <span
            dir="ltr">{{ Help::isRTL() ? jdate($item->email_verified_at) : $item->email_verified_at }}</span>
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
