<div class="relative">
    <input
      class="block w-full sm:ps-9 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      placeholder="{{ $table->searchInputs('global')->label }}"
      value="{{ $table->searchInputs('global')->value }}"
      type="text"
      name="searchInput-global"
      v-bind:class="{ 'opacity-50': table.isLoading }"
      v-bind:disabled="table.isLoading"
      @input="table.debounceUpdateQuery('filter[global]', $event.target.value, $event.target)"
    >
    <div class="absolute inset-y-0 ltr:left-0 rtl:right-0 ps-3 hidden sm:flex items-center pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
        </svg>
    </div>
</div>
