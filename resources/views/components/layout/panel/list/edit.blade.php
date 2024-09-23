@props(['table'=>null, 'item'=>null, 'slideover'=> false, 'modal'=> false ])
<Link @if($modal) modal @endif @if($slideover) slideover @endif
      href="{{ is_null($table) || is_null($item) ? '#' : route('panel.' . $table . '.edit', $item->id) }}"
      class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
<svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 2H9C4 2 2 4 2 9v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M16.04 3.02L8.16 10.9c-.3.3-.6.89-.66 1.32l-.43 3.01c-.16 1.09.61 1.85 1.7 1.7l3.01-.43c.42-.06 1.01-.36 1.32-.66l7.88-7.88c1.36-1.36 2-2.94 0-4.94-2-2-3.58-1.36-4.94 0zM14.91 4.15a7.144 7.144 0 004.94 4.94"></path></svg>
<span>{{ __('Edit') }}</span>
</Link>
