@props(['land' => null ])
<x-splade-data store="navigation" default="{ opened: false }"/>
@if($land)
    <header class="z-50 sticky top-0 bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700 px-5 xl:px-0 flex items-center justify-between gap-5">
        <x-layout.landing.logo :land="$land"/>

        <div class="flex flex-1">
            <nav
                class="hidden lg:flex text-sm font-medium px-3 py-2.5">
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Home')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.product.list', ['page' => $land->slug]) }}">{{__('Products')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Sales Agency')}}</a>
                <a class="hover:text-red-500 px-3 transition-all duration-100"
                   href="{{ route('landing.page.about', ['page'=>$land->slug]) }}">{{__('About us')}}</a>
            </nav>
        </div>

        <div class="flex items-center gap-2">
            <SwitchStyle/>
            <Breakpoint class="shrink-0"/>
            <a
                class="text-white text-center w-full max-w-48 md:w-fit font-medium text-sm bg-red-600 hover:bg-red-800 rounded-full px-3 py-2.5 transition-all duration-100"
                href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Terms of sale')}}</a>
            <button @click.prevent="navigation.opened = !navigation.opened"
                    class="p-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >
                <svg
                    aria-hidden="true"
                    :class="{'hidden': navigation.opened}"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                <svg
                    aria-hidden="true"
                    :class="{'hidden': !navigation.opened}"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
            </button>
        </div>
    </header>

@endif

