@props(['title'=>'', 'link'=> null, 'contents' ])
<main>
    <header class="flex items-center justify-between">
        <h3 class="font-bold font-bakh me-10">{{ $title }}</h3>
        <div class="bg-gray-500/20 flex-1 h-0.5"></div>
        @if($link && $contents->count() > 2)
            <a href="{{$link}}"
               class="font-medium bg-gray-500/20 hover:bg-gray-500/40 px-5 py-1.5 text-xs rounded-full transition-all duration-200">{{ __('Show all') }}</a>
        @endif
    </header>
    <ul class="mt-5 flex flex-col gap-5">
        @foreach($contents->take(3) as $article)
            <li>
                <a href="{{ route('landing.article.show', ['page'=> $article->land->slug , 'article'=> $article->slug]) }}" class="flex items-center gap-5 group">
                    <img class="h-24 rounded-md" src="{{$article->image}}"
                         alt="{{$article->title}}">
                    <div class="flex flex-col flex-1">
                        <h5>{{$article->title}}</h5>
                        <span
                            class="mt-2 w-fit font-medium bg-gray-500/20 group-hover:bg-gray-500/40 px-5 py-1.5 text-xs rounded-full transition-all duration-200">
                                        {{__('Read more')}}
                        </span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</main>
