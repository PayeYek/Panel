@props(['land' => null ])
{{--SIDEBAR--}}
<aside
    :class="navigation.opened ? 'translate-x-0' : 'ltr:translate-x-[-100%] rtl:translate-x-[100%]'"
    class="fixed top-0 ltr:left-0 rtl:right-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full bg-white border-r border-gray-200 ltr:md:translate-x-0 rtl:md:translate-x-0 md:hidden dark:bg-gray-800 dark:border-gray-700"
>
    <div
        class="scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto pb-5 px-3 h-full bg-white dark:bg-gray-800">

        <ul class="space-y-2 w-full">
            <li class="flex"><a class="bg-gray-100 rounded-lg w-full py-1.5 px-4 hover:text-red-500 transition-all duration-100" href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Home')}}</a></li>
            <li class="flex"><a class="bg-gray-100 rounded-lg w-full py-1.5 px-4 hover:text-red-500 transition-all duration-100" href="{{ route('landing.product.list', ['page' => $land->slug]) }}">{{__('Products')}}</a></li>
            <li class="flex"><a class="bg-gray-100 rounded-lg w-full py-1.5 px-4 hover:text-red-500 transition-all duration-100" href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Sales Agency')}}</a></li>
            <li class="flex"><a class="bg-gray-100 rounded-lg w-full py-1.5 px-4 hover:text-red-500 transition-all duration-100" href="{{ route('landing.page.about', ['page'=>$land->slug]) }}">{{__('About us')}}</a></li>
        </ul>

        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <x-layout.landing.social/>
        </ul>

    </div>
</aside>
{{--Sidebar - Mobile Shadow--}}
<div v-if="navigation.opened" @click.prevent="navigation.opened = !navigation.opened"
     class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30 md:hidden"></div>
