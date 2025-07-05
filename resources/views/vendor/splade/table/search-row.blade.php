<div
    v-show="@js($searchInput->value !== null) || table.isForcedVisible(@js($searchInput->key))"
    class="px-4"
>
    <div class="flex rounded-md shadow-sm relative mb-3">
        <label
            for="{{ $searchInput->key }}"
            class="inline-flex items-center space-x-2 rtl:space-x-reverse px-4 ltr:rounded-l-md rtl:rounded-r-md border ltr:border-r-0 rtl:border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm dark:bg-gray-700 dark:text-white dark:border-gray-600"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>

            <span class="text-xs uppercase font-medium">{{ $searchInput->label }}</span>
        </label>

        <input
            name="searchInput-{{ $searchInput->key }}"
            value="{{ $searchInput->value }}"
            type="text"
            class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none ltr:rounded-r-md rtl:rounded-l-md focus:ring-primary-500 focus:border-primary-500 text-sm border-gray-300  dark:bg-gray-700 dark:border-l-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            v-bind:class="{ 'opacity-50': table.isLoading }"
            v-bind:disabled="table.isLoading"
            @input="table.debounceUpdateQuery('filter[{{ $searchInput->key }}]', $event.target.value, $event.target)"
        />

        <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center" >
            <button
                class="rounded-md text-gray-300 hover:text-gray-400 dark:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                @click.prevent="table.disableSearchInput(@js($searchInput->key))"
                dusk="remove-search-row-{{ $searchInput->key }}"
            >
                <span class="sr-only">{{ __('Remove search') }}</span>

                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
</div>
