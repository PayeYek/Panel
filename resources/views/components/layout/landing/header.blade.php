@props(['land' => null ])
@if($land)
    <header class="pt-2 px-5 xl:px-0 flex flex-col md:flex-row items-center justify-between gap-5">

        <x-layout.landing.logo :land="$land"/>

        <div class="flex flex-1">
            <nav
                class="flex gap-y-2 flex-wrap text-sm font-medium bg-gray-200 dark:bg-gray-800 md:bg-transparent dark:md:bg-transparent rounded-md px-3 py-2.5 divide-x md:divide-none divide-gray-500/50 rtl:divide-x-reverse">
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Home')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Products')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Sales Agency')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100" href="#about">{{__('About us')}}</a>
            </nav>
        </div>

        <div class="flex items-center gap-2">
            <SwitchStyle/>
            <Breakpoint class="shrink-0"/>
            <a
                class="text-white text-center w-full max-w-48 md:w-fit font-medium text-sm bg-red-500 hover:bg-red-600 rounded-md px-3 py-2.5 transition-all duration-100"
                href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Terms of sale')}}</a>

        </div>

    </header>
@endif

