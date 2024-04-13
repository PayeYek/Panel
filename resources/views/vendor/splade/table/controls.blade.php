<x-layout.panel.form.header :title="$title" :desc="$desc"/>

<div
    class="flex flex-col lg:flex-row items-center justify-between space-y-3 lg:space-y-0 lg:space-x-4 rtl:space-x-reverse p-4">
    @if($table->searchInputs('global'))
        <div class="w-full lg:w-1/4">
            @include('splade::table.global-search')
        </div>
    @endif
    <div class="flex-1 flex items-center space-x-3 rtl:space-x-reverse w-full lg:w-auto">
        {{--ACTIONS--}}
        @if($table->hasExports() || $table->hasBulkActions())
            <div v-if="table.hasSelectedItems || @js($table->hasExports())">
                @include('splade::table.bulk-actions-exports')
            </div>
        @endif
        {{--COLUMNS--}}
        @if($table->hasToggleableColumns())
            @include('splade::table.columns')
        @endif
        {{--SEARCH--}}
        @if($table->hasToggleableSearchInputs())
            @include('splade::table.add-search-row')
        @endif
        {{--FILTERS--}}
        @if($table->hasFilters())
            @include('splade::table.filters')
        @endif

        <button type="button"
                v-show="@js($canResetTable()) || table.columnsAreToggled || table.hasForcedVisibleSearchInputs"
                @click.prevent="table.reset"
                dusk="reset-table"
                class="group w-full lg:w-auto flex space-x-1 rtl:space-x-reverse items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            <svg class="w-5 h-5 text-gray-400 dark:text-gray-400 group-hover:text-primary-700 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm3.36 12.3c.29.29.29.77 0 1.06-.15.15-.34.22-.53.22s-.38-.07-.53-.22l-2.3-2.3-2.3 2.3c-.15.15-.34.22-.53.22s-.38-.07-.53-.22a.754.754 0 010-1.06l2.3-2.3-2.3-2.3a.754.754 0 010-1.06c.29-.29.77-.29 1.06 0l2.3 2.3 2.3-2.3c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06l-2.3 2.3 2.3 2.3z"></path>
            </svg>
            <span>{{ __('Reset') }}</span>
        </button>
    </div>
    @if($primaryLink)
        <Link href="{{ $primaryLink }}" @if($modal) modal @endif @if($slideover) slideover @endif
              class="order-first lg:order-none !mb-3 lg:!mb-0 flex w-full lg:w-auto lg:min-w-fit items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        <svg class="h-3.5 w-3.5 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
             aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd"
                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"></path>
        </svg>
        <span>{{__($primary)}}</span>
        </Link>
    @endif
</div>


