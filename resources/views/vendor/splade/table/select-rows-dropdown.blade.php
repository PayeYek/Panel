<x-splade-component is="dropdown" dusk="select-rows-dropdown" close-on-click>
    <x-slot:trigger>
        <input
            type="checkbox"
            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            :checked="table.allVisibleItemsAreSelected"
        />
    </x-slot:trigger>

    <div class="mt-3.5 min-w-max z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 block overflow-hidden">
        <div class="flex flex-col">
            <button
                class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white ltr:text-left rtl:text-right w-full px-4 py-3 text-sm font-normal"
                @click="table.setSelectedItems(@js($table->getPrimaryKeys()))"
                dusk="select-all-on-this-page">
                {{ __('Select all on this page') }} ({{ $table->totalOnThisPage() }})
            </button>

            @if($showPaginator())
                <button
                    class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white ltr:text-left rtl:text-right w-full px-4 py-3 text-sm font-normal"
                    @click="table.setSelectedItems(['*'])"
                    dusk="select-all-results">
                    {{ __('Select all results') }} ({{ $table->totalOnAllPages() }})
                </button>
            @endif

            <button
                v-if="table.hasSelectedItems"
                class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white ltr:text-left rtl:text-right w-full px-4 py-3 text-sm font-normal"
                @click="table.setSelectedItems([])"
                dusk="select-none">
                {{ __('Clear selection') }}
            </button>
        </div>
    </div>
</x-splade-component>
