@props([
    'title' => null,
    'desc' => null,
    'state' => 'true',
])

<section
    class="-m-4 md:m-0 shadow-md group-[.is-modal]/modal:shadow-none group-[.is-modal]/modal:space-y-2 group-[.is-modal]/modal:-m-6 sm:rounded-lg bg-white dark:bg-gray-800 relative scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto"
>
    <x-splade-data default="{ isOpen: {{ $state }} }">
        <div class="flex items-start justify-between p-4">
            <x-layout.panel.form.header2 :title="$title" :desc="$desc"/>

            <div class="p-1 cursor-pointer" @click="data.isOpen = !data.isOpen">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" :class="'size-6 stroke-stone-700 transition-transform duration-700 ' + (data.isOpen ? '' : 'rotate-180')">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
        </div>

        <div :class="data.isOpen ? 'max-h-[32rem] py-4' : 'max-h-0'" {{ $attributes->merge(['class' => 'overflow-hidden px-4 transition-all duration-700 grid gap-5 group-[.is-modal]/modal:!grid-cols-1 grid-cols-1 lg:grid-cols-2']) }}>
            {{ $slot }}
        </div>
    </x-splade-data>

  {{--  <button type="button" v-if="modal" @click="modal.close"
            class="m-6 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
    >Cancel
    </button>--}}
</section>
