<x-layout.admin>

    <x-splade-table :for="$products" search-debounce="1000" striped
                    :primaryLink="route('panel.application.product.create')"
                    :title="__('Product list')"
                    {{--:desc="__('test test test')"--}}
                    pagination-scroll="preserve"
    >
        {{--STATUS--}}
        @cell('status', $product)
        <x-layout.panel.badge
            :text="$product->status ? 'Active' : 'Inactive'"
            :green="$product->status === 1"
            :red="$product->status === 0"
        />
        @endcell

        {{--CREATED_AT--}}
        @cell('created_at', $product)
        <span>{{ \App\Support\Help::isRTL() ? jdate($product->created_at) : $product->created_at }}</span>
        @endcell

        {{--UPDATED_AT--}}
        @cell('updated_at', $product)
        <span>{{ \App\Support\Help::isRTL() ? jdate($product->updated_at) : $product->updated_at }}</span>
        @endcell

        {{--EDIT--}}
        @cell('action', $product)
            <Link
                href="{{ route('panel.application.product.edit', $product) }}"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                {{ __('Edit') }}
            </Link>
            <Link method="delete" confirm
                  href="{{ route('panel.application.product.destroy', $product) }}"
                class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">
                {{ __('Delete') }}
            </Link>

        @endcell
    </x-splade-table>

</x-layout.admin>
