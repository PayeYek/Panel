@props(['title' => '', 'route' => null, 'active' => false, 'icon' => '', 'badge' => null])
@php
    $link = null;

    if ($route) {
        if (!Str::contains($route, '*')) {
            $link = route($route);
        }
        $active = request()->routeIs($route, Str::before($route, '.index') . '.*');
    }
@endphp
<li>
{{--    @can( __($title) )--}}
        <x-splade-data :default="['submenu_opened'=> $active]">
            <x-layout.panel.menu.link :link="$link" :submenu="$slot->isNotEmpty()" :active="$active">
                <x-layout.panel.menu.icon
                    {{--                :icon="$icon" --}}
                    :title="$title"/>

                <span
                    class="flex-1 ltr:ml-3 rtl:mr-3 ltr:text-left rtl:text-right truncate rtl:font-bakh">{{ __($title) }}</span>

                @if($badge)
                    <span
                        class="inline-flex justify-center items-center w-6 h-6 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800">{{$badge}}</span>
                @endif

                @if($slot->isNotEmpty())
                    <svg
                        aria-hidden="true"
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                @endif

            </x-layout.panel.menu.link>

            @if($slot->isNotEmpty())
                <ul v-if="data.submenu_opened" class="py-2 space-y-2 ps-2.5">
                    {{ $slot }}
                </ul>
            @endif
        </x-splade-data>
{{--    @endcan--}}
</li>
