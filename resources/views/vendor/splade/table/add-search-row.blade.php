<x-splade-component is="button-with-dropdown" dusk="add-search-row-dropdown">
    <x-slot:button>
        <x-iconsax-bol-search-normal-1
            class="w-5 h-5 text-gray-400 dark:text-gray-400 group-hover:text-primary-700 dark:group-hover:text-white"/>
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
