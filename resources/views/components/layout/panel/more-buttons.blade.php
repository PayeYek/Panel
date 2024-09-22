<x-splade-toggle>
    <div class="hs-dropdown relative inline-flex">
        <button @click.prevent="toggle" type="button"
                class="border border-gray-300 hover:border-gray-400 dark:border-current py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle transition-all text-sm dark:text-gray-400 dark:hover:text-white">
            {{-- CLOSE --}}
            <svg v-if="toggled" class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path></svg>
            {{-- OPEN --}}
            <svg v-else class="flex-shrink-0 w-4 h-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.32 13.281h3.09v7.2c0 1.06 1.32 1.56 2.02.76l7.57-8.6c.66-.75.13-1.92-.87-1.92h-3.09v-7.2c0-1.06-1.32-1.56-2.02-.76l-7.57 8.6c-.65.75-.12 1.92.87 1.92zM8.5 4.75h-7c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h7c.41 0 .75.34.75.75s-.34.75-.75.75zM7.5 20.75h-6c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h6c.41 0 .75.34.75.75s-.34.75-.75.75zM4.5 12.75h-3c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h3c.41 0 .75.34.75.75s-.34.75-.75.75z"></path></svg>
        </button>

        <x-splade-transition animation="opacity" show="toggled">
            <div
                @click.away="setToggle(false)"
                class="absolute end-10 divide-y divide-gray-200 min-w-[10rem] z-20 bg-white shadow-2xl rounded-lg p-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700 block">

                {{$slot}}

            </div>
        </x-splade-transition>
    </div>
</x-splade-toggle>
