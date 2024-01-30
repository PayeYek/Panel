@props(['primary' => 'Add New' , 'primaryLink' => null, 'title' => null, 'desc' => null, 'modal' => false, 'slideover' => false, ])
<SpladeTable {{ $attributes->except('class') }}
             :striped="@js($striped)"
             :columns="@js($table->columns())"
             :search-debounce="@js($searchDebounce)"
             :default-visible-toggleable-columns="@js($table->defaultVisibleToggleableColumns())"
             :items-on-this-page="@js($table->totalOnThisPage())"
             :items-on-all-pages="@js($table->totalOnAllPages())"
             :base-url="@js(request()->url())"
             :pagination-scroll="@js($paginationScroll)"
             :splade-id="@js($spladeId = $table->getSpladeId())"
>
    <template #default="{!! $scope !!}">
        <section {{ $attributes->only('class') }} :class="{ 'opacity-50': table.isLoading }" data-splade-id="{{ $spladeId }}"
                 class="-mx-4 md:mx-0 mb-2.5 bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            @if($hasControls())
                @include('splade::table.controls')
            @endif

            @foreach($table->searchInputs() as $searchInput)
                @includeUnless($searchInput->key === 'global', 'splade::table.search-row')
            @endforeach

            <x-splade-component is="table-wrapper">
                <table class="min-w-full w-full text-sm ltr:text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    @unless($headless)
                        @isset($head)
                            {{ $head }}
                        @elseif(count($table->resource))
                            @include('splade::table.head')
                        @endisset
                    @endunless

                    @isset($body)
                        {{ $body }}
                    @else
                        @include('splade::table.body')
                    @endisset
                </table>
            </x-splade-component>

            @if($showPaginator())
                {{ $table->resource->links($paginationView, ['table' => $table, 'hasPerPageOptions' => $hasPerPageOptions()]) }}
            @endif
        </section>
    </template>
</SpladeTable>
