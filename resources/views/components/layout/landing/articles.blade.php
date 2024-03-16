@props(['land'=>null, 'all'=>false ])
@isset($land)
    @if($land->articles->count())
        <section {{ $attributes->merge(['class'=> "px-5 xl:px-0 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 relative"]) }}>
            <header
                class="z-10 md:min-h-60 md:min-w-fit rounded-xl p-7 flex flex-row md:flex-col items-center group sticky top-[4.5rem] md:top-0 md:relative bg-gray-200 dark:bg-gray-800 md:bg-gradient-to-t from-gray-100 to-gray-300 dark:from-gray-800 dark:to-gray-600">
                <span
                    class="md:mb-3 text-lg md:text-5xl lg:text-3xl font-medium grow md:grid md:place-items-center">{{ __('Information') }}</span>
                <a href="{{ route('landing.article.list', ['page' => $land->slug]) }}"
                   class="px-5 py-1 border-2 rounded-full md:order-4 border-red-800 dark:border-red-600 text-red-800 dark:text-red-600 group-hover:border-red-700 group-hover:text-white group-hover:bg-red-700 text-xs md:text-sm font-medium transition-all duration-200">{{ __('Show all') }}</a>
            </header>

            @php
                $list = $all ?  $land->articles : $land->articles->take(3);
            @endphp

            @foreach($list as $article)
                <a href="{{ route('landing.article.show', ['page'=> $article->land->slug , 'article'=> $article->slug]) }}"
                   class="md:hover:scale-105 transform transition duration-200 bg-gray-100 dark:bg-gray-700 rounded-xl px-3.5 pt-3.5 pb-2 flex flex-col">
                    <img
                        class="w-full rounded-lg shrink-0"
                        src="{{$article->image}}" alt="{{$article->title}}">
                    <h2 class="mt-2 mb-1 text-sm font-medium text-gray-900 dark:text-white text-center grow grid place-items-center">{{$article->title}}</h2>
                </a>
            @endforeach
        </section>
    @endif
@endisset

