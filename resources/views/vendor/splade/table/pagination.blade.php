<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between px-4 py-3">
    <div class="flex justify-between flex-1 md:hidden">
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->previousPageUrl()), true)" dusk="pagination-simple-previous" href="{{ $paginationUrl }}"
               class="relative inline-flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition ease-in-out duration-150"
            >
                {!! __('pagination.previous') !!}
            </a>
        @endif

        @includeWhen($hasPerPageOptions ?? true, 'splade::table.per-page-selector')

        @if ($paginator->hasMorePages())
            <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->nextPageUrl()), true)" dusk="pagination-simple-next" href="{{ $paginationUrl }}" class="relative inline-flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition ease-in-out duration-150">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </div>

    <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
        <div class="flex items-center">
            @includeWhen($hasPerPageOptions ?? true, 'splade::table.per-page-selector')

            <div class="hidden lg:block @if($hasPerPageOptions ?? true) ms-3 @endif">
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    @if ($paginator->firstItem())
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>

        <div>
            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span class="flex items-center justify-center h-full py-2 px-3 ms-0 text-gray-500 bg-white rounded-s-lg border border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" aria-hidden="true">
                            <svg class="w-5 h-5  rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @else
                    <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->previousPageUrl()), true)" dusk="pagination-previous" href="{{ $paginationUrl }}" rel="prev" class="flex items-center justify-center h-full py-2 px-3 ms-0 text-gray-500 bg-white rounded-s-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                        <svg class="w-5 h-5 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span class="h-full cursor-default flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">{{ $element }}</span>
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span class="h-full cursor-default flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
                                </span>
                            @else
                                <a @click.exact.prevent="table.navigate(@js($url), true)" dusk="pagination-{{ $page }}" href="{{ $url }}" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a @click.exact.prevent="table.navigate(@js($paginationUrl = $paginator->nextPageUrl()), true)" dusk="pagination-next" href="{{ $paginationUrl }}" rel="next" class="flex items-center justify-center h-full py-2 px-3 me-0 text-gray-500 bg-white rounded-e-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                        <svg class="w-5 h-5 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span class="flex items-center justify-center h-full py-2 px-3 me-0 text-gray-500 bg-white rounded-e-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" aria-hidden="true">
                            <svg class="w-5 h-5 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @endif
            </span>
        </div>
    </div>
</nav>
