{{--<div {{$attributes->merge(['class' => 'antialiased bg-gray-50 dark:bg-gray-900 font-inter rtl:font-iran rtl:number-fa min-h-screen'])}}>
    {{ $slot }}
</div>--}}
<div {{$attributes->merge(['class' => 'antialiased bg-gray-50 dark:bg-gray-900 font-inter rtl:font-iran rtl:number-fa h-screen overflow-auto scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-800 dark:scrollbar-track-gray-900'])}}>
    {{ $slot }}
</div>
