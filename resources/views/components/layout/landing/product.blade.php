@props(['href'=> '#', 'image' => null, 'name'=> '' , 'model'=> '' ])
<a @if($href !== '#')  href="{{ $href }}" @endif
    {{ $attributes->merge(['class'=>'transform transition duration-200 bg-gray-100 dark:bg-gray-700 rounded-xl px-3.5 pt-3.5 pb-2 flex flex-col']) }}>
    @if($image)
        <img
            class="aspect-square w-full rounded-lg bg-gray-300 dark:bg-gray-950 p-4 shrink-0"
            src="{{$image}}" alt="{{$name}}">
    @endif
    @if($name)
        <h2 class="mt-2 mb-1 text-sm font-bold text-gray-900 dark:text-white text-center grow grid place-items-center">{{$name}}</h2>
    @endif
    @if($model)
        <h5 class="text-sm font-bold text-red-800 dark:text-red-600 font-inter shrink-0 text-center">{{$model}}</h5>
    @endif
</a>

