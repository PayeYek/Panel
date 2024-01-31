<x-layout.landing.land :land="$land">

    <div class="px-5 xl:px-0 flex flex-col lg:flex-row  gap-10">
        <div class="flex-1">
            <div class="mt-10 mb-5 flex items-center justify-between">
                <h1 class="text-3xl font-bold font-bakh">{{$article->title}}</h1>
                <span class="text-sm">{{jdate($article->created_at)->format('%A, %d %B %y')}}</span>
            </div>

            <img class="rounded-lg mb-10"
                 src="{{$article->image}}" alt="{{$article->title}}">

            <main class="leading-9">
                {!! $article->body !!}
            </main>
        </div>

        <div class="shrink-0 lg:pt-14 relative">
            <div class="lg:pt-10 sticky top-0 flex flex-col items-center">
                <img class="rounded-lg"
                     src="https://kalleh.com/book/wp-content/uploads/sites/2/2023/11/side-bar.jpg.webp"
                     alt="{{$article->title}}">
            </div>

        </div>
    </div>


</x-layout.landing.land>
