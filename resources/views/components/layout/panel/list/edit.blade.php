@props(['table'=>null, 'item'=>null, 'slideover'=> false, 'modal'=> false ])
<Link @if($modal) modal @endif @if($slideover) slideover @endif
      href="{{ is_null($table) || is_null($item) ? '#' : route('panel.' . $table . '.edit', $item->id) }}"
      class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
<x-iconsax-lin-edit class="shrink-0 w-4 h-4"/>
<span>{{ __('Edit') }}</span>
</Link>
