@props([
    'title' => null,
    'desc' => null,
])

<section
    class="-m-4 md:m-0 shadow-md group-[.is-modal]/modal:shadow-none group-[.is-modal]/modal:space-y-2 group-[.is-modal]/modal:-m-6 sm:rounded-lg bg-white dark:bg-gray-800 relative scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto"
>
        <x-layout.panel.form.header :title="$title" :desc="$desc"/>

        <div {{ $attributes->merge(['class' => 'overflow-hidden p-4 transition-all duration-500 grid gap-5 group-[.is-modal]/modal:!grid-cols-1 grid-cols-1 lg:grid-cols-2']) }}>
            {{ $slot }}
        </div>

  {{--  <button type="button" v-if="modal" @click="modal.close"
            class="m-6 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
    >Cancel
    </button>--}}
</section>
