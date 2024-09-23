<x-layout.admin>

    <x-splade-table :for="$connections" search-debounce="1000" striped
                    :primaryLink="route('panel.application.connection.create')"
                    :title="__('Connection list')"
                    pagination-scroll="preserve"
    >

        {{--STATUS--}}
        {{--@cell('is_active', $connection)
        <x-layout.panel.badge
            :text="$connection->is_active ? 'Active' : 'Inactive'"
            :green="$connection->is_active === 1"
            :red="$connection->is_active === 0"
        />
        @endcell--}}

        {{--CREATED_AT--}}
        @cell('created_at', $connection)
        <span>{{ \App\Support\Help::isRTL() ? jdate($connection->created_at) : $connection->created_at }}</span>
        @endcell

        {{--UPDATED_AT--}}
        @cell('updated_at', $connection)
        <span>{{ \App\Support\Help::isRTL() ? jdate($connection->updated_at) : $connection->updated_at }}</span>
        @endcell

        {{--EDIT--}}
        @cell('action', $connection)
            <Link
                href="{{ route('panel.application.connection.edit', $connection) }}"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                {{ __('Edit') }}
            </Link>
            <Link method="delete" confirm
                  href="{{ route('panel.application.connection.destroy', $connection) }}"
                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">
                {{ __('Delete') }}
            </Link>

        @endcell
    </x-splade-table>

</x-layout.admin>
