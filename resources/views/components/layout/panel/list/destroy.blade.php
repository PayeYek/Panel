@props(['table'=>null, 'item'=>null ])
<Link method="delete" confirm
      href="{{ is_null($table) || is_null($item) ? '#' : route('panel.' . $table . '.destroy', $item->id) }}"
      class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700 dark:hover:text-gray-300">
<x-iconsax-lin-trash class="shrink-0 w-4 h-4"/>
<span>{{ __('Delete') }}</span>
</Link>
