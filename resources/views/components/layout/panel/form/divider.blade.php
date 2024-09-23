@props(['text'=> null, 'center'=>false])
@if($text)
    @if($center)
        <div class="col-span-full py-3 flex items-center text-sm text-gray-800 before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:before:border-gray-600 dark:after:border-gray-600">{{__($text)}}</div>
    @else
        <div class="col-span-full py-3 flex items-center text-sm text-gray-800 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:after:border-gray-600">{{__($text)}}</div>
    @endif
@else
    <hr class="col-span-full border-gray-200 dark:border-gray-600 ">
@endif
