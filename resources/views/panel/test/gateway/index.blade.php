<x-layout.admin>

    <x-splade-table :for="$gateways" search-debounce="1000" striped
                    :primaryLink="route('panel.application.gateway.create')"
                    :title="__('Gateway list')"
                    {{--:desc="__('test test test')"--}}
                    pagination-scroll="preserve"
    >
        {{--STATUS--}}
        @cell('status', $gateway)
        <x-layout.panel.badge
            :text="$gateway->status ? 'Active' : 'Inactive'"
            :green="$gateway->status === 1"
            :red="$gateway->status === 0"
        />
        @endcell

        {{--CREATED_AT--}}
        @cell('created_at', $gateway)
        <span>{{ \App\Support\Help::isRTL() ? jdate($gateway->created_at) : $gateway->created_at }}</span>
        @endcell

        {{--UPDATED_AT--}}
        @cell('updated_at', $gateway)
        <span>{{ \App\Support\Help::isRTL() ? jdate($gateway->updated_at) : $gateway->updated_at }}</span>
        @endcell

        {{--EDIT--}}
        @cell('action', $gateway)
            <Link
                href="{{ route('panel.application.gateway.edit', $gateway) }}"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                {{ __('Edit') }}
            </Link>
            <Link method="delete" confirm
                  href="{{ route('panel.application.gateway.destroy', $gateway) }}"
                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">
                {{ __('Delete') }}
            </Link>

        @endcell
    </x-splade-table>

</x-layout.admin>
