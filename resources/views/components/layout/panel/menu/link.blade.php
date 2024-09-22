@props(['link' => null , 'submenu' => false, 'active' => false])
@if($submenu || is_null($link))
    <button
        type="button" @click="data.submenu_opened = !data.submenu_opened" :class="{'bg-gray-100 dark:bg-gray-700':@js($active)}"
        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
        {{$slot}}
    </button>
@else
    <Link
        href="{{$link}}" :class="{'bg-primary-500/30':@js($active)}"
        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
    >
        {{$slot}}
    </Link>
@endif

