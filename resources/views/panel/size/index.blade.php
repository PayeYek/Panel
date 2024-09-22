<x-layout.admin>

    <x-splade-table :for="$sizes" search-debounce="1000" striped
                    :primaryLink="route('panel.product.variety.size.create')"
                    :title="__('Size list')"
                    slideover
                    {{--:desc="__('test test test')"--}}
                    pagination-scroll="preserve"
    >

        {{--EDIT--}}
        @cell('action', $size)
        <Link slideover
            href="{{ route('panel.product.variety.size.edit', $size) }}"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
            {{ __('Edit') }}
        </Link>
        <Link method="delete" confirm
              href="{{ route('panel.product.variety.size.destroy', $size) }}"
              class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">
            {{ __('Delete') }}
        </Link>

        @endcell
    </x-splade-table>

</x-layout.admin>
