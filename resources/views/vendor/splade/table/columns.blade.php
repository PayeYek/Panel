<x-splade-component is="button-with-dropdown" dusk="columns-dropdown">
    <x-slot:button>
        {{--Eye--}}
        <svg :class="{
                'text-gray-400': !table.columnsAreToggled,
                'text-primary-500': table.columnsAreToggled,
            }"
             class="w-5 h-5 text-gray-400 dark:text-gray-400 group-hover:text-primary-700 dark:group-hover:text-white"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M21.25 9.15C18.94 5.52 15.56 3.43 12 3.43c-1.78 0-3.51.52-5.09 1.49-1.58.98-3 2.41-4.16 4.23-1 1.57-1 4.12 0 5.69 2.31 3.64 5.69 5.72 9.25 5.72 1.78 0 3.51-.52 5.09-1.49 1.58-.98 3-2.41 4.16-4.23 1-1.56 1-4.12 0-5.69zM12 16.04c-2.24 0-4.04-1.81-4.04-4.04S9.76 7.96 12 7.96s4.04 1.81 4.04 4.04-1.8 4.04-4.04 4.04z"></path>
            <path d="M11.998 9.14a2.855 2.855 0 000 5.71c1.57 0 2.86-1.28 2.86-2.85s-1.29-2.86-2.86-2.86z"></path>
        </svg>
        <span class="hidden sm:block">{{ __('Columns') }}</span>
    </x-slot:button>

    <div class="px-2">
        <ul class="divide-y divide-gray-100 dark:divide-gray-600">
            @foreach($table->columns() as $column)
                @if(!$column->canBeHidden)
                    @continue
                @endif

                <li class="py-2 flex items-center justify-between">
                    <p class="text-sm">
                        {{ $column->label }}
                    </p>

                    <button
                        type="button"
                        class="ms-4 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 focus:ring-offset-white dark:focus:ring-offset-gray-700"
                        :class="{
                            'bg-primary-500': table.columnIsVisible(@js($column->key)),
                            'bg-gray-200 dark:bg-gray-500': !table.columnIsVisible(@js($column->key)),
                        }"
                        :aria-pressed="table.columnIsVisible(@js($column->key))"
                        aria-labelledby="toggle-column-{{ $column->key }}"
                        aria-describedby="toggle-column-{{ $column->key }}"
                        @click.prevent="table.toggleColumn(@js($column->key))"
                        dusk="toggle-column-{{ $column->key }}"
                    >
                        <span class="sr-only">Column status</span>
                        <span
                            aria-hidden="true"
                            :class="{
                                'translate-x-5 rtl:-translate-x-5': table.columnIsVisible(@js($column->key)),
                                'translate-x-0': !table.columnIsVisible(@js($column->key)),
                            }"
                            class="inline-block h-5 w-5 rounded-full bg-white shadow transform ltr:ring-0 rtl:left-0 transition ease-in-out duration-300" />
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</x-splade-component>
