<div class="antialiased bg-gray-50 dark:bg-gray-900 font-inter rtl:font-iran rtl:number-fa">
    <x-layout.panel.navbar/>

    <x-layout.panel.sidebar/>

    {{--MAIN--}}
    <main class="p-4 md:ms-64 h-auto min-h-screen pt-20 text-gray-800 dark:text-white ">

        {{ $slot }}

    </main>
</div>
