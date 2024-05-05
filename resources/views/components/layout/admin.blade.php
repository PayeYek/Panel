<x-layout.base>
    <x-layout.panel.navbar/>

    <x-layout.panel.sidebar/>

    {{--MAIN--}}
    <main class="p-4 md:ms-64 xl:mx-64 h-auto min-h-screen pt-20 text-gray-800 dark:text-white ">

    {{ $slot }}

    </main>

    <x-layout.panel.user-side/>
</x-layout.base>
