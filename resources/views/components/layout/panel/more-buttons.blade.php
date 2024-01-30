<x-splade-toggle>
    <div class="hs-dropdown relative inline-flex">
        <button @click.prevent="toggle" type="button"
                class="border border-gray-300 hover:border-gray-400 dark:border-current py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle transition-all text-sm dark:text-gray-400 dark:hover:text-white">
            <x-heroicon-o-x-mark v-if="toggled" class="flex-shrink-0 w-4 h-4"/>
            <x-iconsax-bol-flash v-else class="flex-shrink-0 w-4 h-4 rtl:rotate-180"/>
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
