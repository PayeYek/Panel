<x-splade-component is="dropdown" {{ $attributes->class(
//    'w-full min-h-[2.7rem] md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700'
    'group w-full lg:w-auto flex space-x-1 rtl:space-x-reverse items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700'
    ) }}>
    <x-slot:trigger>
        {{ $button }}
    </x-slot:trigger>

    <div class="text-gray-700 dark:text-gray-200 mt-2 min-w-max ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow dark:bg-gray-700">
        {{ $slot }}
    </div>
</x-splade-component>
