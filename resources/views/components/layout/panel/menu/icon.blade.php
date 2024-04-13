@props(['icon' => null ,'title'=>''])
@if(!empty($icon) && $icon !== 'null')
{{--    @svg($icon, 'w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white')--}}
@else
    <div
        class="w-6 h-6 grid place-items-center rounded-full font-inter text-sm font-medium text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white uppercase {{ !empty($title) && $icon !== 'null' ? 'bg-gray-500/20 ':'' }}">{{ !empty($title) && $icon !== 'null' ? $title[0] : '' }}</div>
@endif
