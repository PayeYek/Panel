<x-splade-component is="button-with-dropdown" dusk="columns-dropdown">
    <x-slot:button>

        <x-iconsax-bol-eye
            :class="{
                'text-gray-400': !table.columnsAreToggled,
                'text-primary-500': table.columnsAreToggled,
            }"
            class="w-5 h-5 text-gray-400 dark:text-gray-400 group-hover:text-primary-700 dark:group-hover:text-white"/>
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
