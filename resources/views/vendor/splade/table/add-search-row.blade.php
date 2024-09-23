<x-splade-component is="button-with-dropdown" dusk="add-search-row-dropdown">
    <x-slot:button>
        <svg class="w-5 h-5 text-gray-400 dark:text-gray-400 group-hover:text-primary-700 dark:group-hover:text-white"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M11.5 21a9.5 9.5 0 100-19 9.5 9.5 0 000 19zM21.3 21.999c-.18 0-.36-.07-.49-.2l-1.86-1.86a.706.706 0 010-.99c.27-.27.71-.27.99 0l1.86 1.86c.27.27.27.71 0 .99-.14.13-.32.2-.5.2z"></path>
        </svg>
        <span class="hidden sm:block">{{__('Search')}}</span>
    </x-slot:button>

    @foreach($table->searchInputs() as $searchInput)
        @if($searchInput->key === 'global')
            @continue
        @endif

        <button
            class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white ltr:text-left rtl:text-right w-full px-4 py-3 text-sm font-normal"
            @click.prevent="table.showSearchInput(@js($searchInput->key)); dropdown.hide()"
            dusk="add-search-row-{{ $searchInput->key }}">
            {{ $searchInput->label }}
        </button>
    @endforeach
</x-splade-component>
