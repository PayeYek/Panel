<x-splade-component is="button-with-dropdown" dusk="bulk-actions-exports-dropdown" v-bind:close-on-click="true">
    <x-slot:button>
            <x-iconsax-bol-flash-1 class="w-5 h-5 text-gray-400 dark:text-gray-400 group-hover:text-primary-700 dark:group-hover:text-white"/>
            <span class="hidden sm:block">{{ __('Actions') }}</span>
    </x-slot:button>

    <div class="min-w-max z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 block overflow-hidden">
        <div class="flex flex-col">
            <h3 v-if="table.hasSelectedItems" class="p-3 text-xs font-medium text-gray-900 dark:text-white uppercase tracking-wide">
                <span v-if="table.totalSelectedItems == 1">
                    <span v-text="table.totalSelectedItems" /> {{ __('Item selected') }}
                </span>

                <span v-if="table.totalSelectedItems > 1">
                    <span v-text="table.totalSelectedItems" /> {{ __('Items selected') }}
                </span>
            </h3>

            @foreach($table->getBulkActions() as $bulkAction)
                <button
                    v-if="table.hasSelectedItems"
                    class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white ltr:text-left rtl:text-right w-full px-4 py-3 text-sm font-normal"
                    @click.prevent="table.performBulkAction(
                        @js($bulkAction->getUrl()),
                        @js($bulkAction->confirm),
                        @js($bulkAction->confirmText),
                        @js($bulkAction->confirmButton),
                        @js($bulkAction->cancelButton),
                        @js($bulkAction->requirePassword)
                    )"
                    dusk="action.{{ $bulkAction->getSlug() }}">
                    {{ $bulkAction->label }}
                </button>
            @endforeach

            @if($table->hasExports() && $table->hasBulkActions())
                <div v-if="table.hasSelectedItems" class="my-1 w-full"></div>
            @endif

            @if($table->hasExports())
                <h3 class="p-3 text-xs font-medium text-gray-900 dark:text-white uppercase tracking-wide">
                    {{ __('Export results') }}
                </h3>
            @endif

            @foreach($table->getExports() as $export)
                <a
                    download
                    class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white ltr:text-left rtl:text-right w-full px-4 py-3 text-sm font-normal"
                    href="{{ $export->getUrl() }}"
                    dusk="action.{{ $export->getSlug() }}">
                    {{ $export->label }}
                </a>
            @endforeach
        </div>
    </div>
</x-splade-component>
