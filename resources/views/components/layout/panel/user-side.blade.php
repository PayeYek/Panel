{{--USER SILDE--}}
<aside
    :class="navigation.profile ? '-translate-x-0' : 'ltr:translate-x-[100%] rtl:translate-x-[-100%]'"
    class="fixed top-0 ltr:right-0 rtl:left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-0 bg-white border-s border-gray-200 ltr:xl:translate-x-0 rtl:xl:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
>
    <div
        class="scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        @auth
            <div class="mt-2 flex flex-col items-center justify-center gap-2 text-gray-500 dark:text-gray-400">
                <div class="size-20 bg-gray-100 dark:bg-gray-700 rounded-full grid place-items-center">
                    <svg class="size-10 fill-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>

                <span class="text-lg font-bold text-gray-800 dark:text-white">{{ auth()->user()->fullName }}</span>
                <span class="text-base">عنوان شغلی</span>

            </div>

            <x-splade-link :href="route('auth.logout')"
                           method="POST"
                           class="mt-5 flex items-center justify-center gap-1 w-full py-1.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" class="size-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>{{ __('Logout') }}</span>
            </x-splade-link>

        @else
            <x-splade-link :href="route('auth.login')"
                           class="mt-5 flex items-center justify-center gap-1 w-full py-1.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>{{ __('Login') }}</span>
            </x-splade-link>
        @endauth


    </div>
</aside>
{{--Sidebar - Mobile Shadow--}}
<div v-if="navigation.profile" @click.prevent="navigation.profile = !navigation.profile"
     class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30"></div>
