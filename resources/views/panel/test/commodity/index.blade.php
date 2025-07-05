<x-layout.admin>

    <x-splade-table :for="$commodities" search-debounce="1000" striped
                    :primaryLink="route('panel.application.commodity.create')"
                    :title="__('Commodity list')"
                    pagination-scroll="preserve"
    >
        {{--PUBLIC--}}
        @cell('is_visible', $commodity)
        <x-layout.panel.badge
            :text="$commodity->is_visible ? 'Active' : 'Inactive'"
            :green="$commodity->is_visible === 1"
            :red="$commodity->is_visible === 0"
        />
        @endcell

        {{--STATUS--}}
        @cell('is_active', $commodity)
        <x-layout.panel.badge
            :text="$commodity->is_active ? 'Active' : 'Inactive'"
            :green="$commodity->is_active === 1"
            :red="$commodity->is_active === 0"
        />
        @endcell

        {{--CREATED_AT--}}
        @cell('created_at', $commodity)
        <span>{{ \App\Support\Help::isRTL() ? jdate($commodity->created_at) : $commodity->created_at }}</span>
        @endcell

        {{--UPDATED_AT--}}
        @cell('updated_at', $commodity)
        <span>{{ \App\Support\Help::isRTL() ? jdate($commodity->updated_at) : $commodity->updated_at }}</span>
        @endcell

        {{--EDIT--}}
        @cell('action', $commodity)
            <Link
                href="{{ route('panel.application.commodity.edit', $commodity) }}"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                {{ __('Edit') }}
            </Link>
            <Link method="delete" confirm
                  href="{{ route('panel.application.commodity.destroy', $commodity) }}"
                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">
                {{ __('Delete') }}
            </Link>

        @endcell
    </x-splade-table>

</x-layout.admin>
