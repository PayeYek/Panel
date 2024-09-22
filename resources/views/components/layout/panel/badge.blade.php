@props(['text' => '', 'dark' => false, 'red' => false, 'green' => false, 'yellow' => false, 'indigo' => false, 'purple' => false, 'pink' => false,])
<span {{ $attributes->class([
    'text-xs font-medium px-2.5 py-0.5 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
    'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300'=> $dark,
    'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300'=> $red,
    'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'=> $green,
    'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'=> $yellow,
    'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300'=> $indigo,
    'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300'=> $purple,
    'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-300'=> $pink,
    ]) }}>{{__($text)}}</span>
