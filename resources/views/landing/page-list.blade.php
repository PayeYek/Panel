<x-layout.landing>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 px-5">
        @foreach($lands as $land)

            <Link href="{{route('landing.page.show', ['page' => $land->slug])}}"
               class="flex items-center gap-3">
                <img class="aspect-square h-24 shrink-0 rounded-md bg-gray-200 dark:bg-gray-800" src="{{$land->logo}}"
                     alt="{{$land->title}}">
                <div class="flex flex-col gap-5">
                    <span class="text-base">{{$land->title}}</span>
                    <div class="flex gap-5">
                        <span class="text-xs"> تعداد محصول: {{$land->products->count()}}</span>
                        <span class="text-xs"> تعداد مقاله: {{$land->articles->count()}}</span>
                    </div>
                </div>
            </Link>

        @endforeach
    </div>


</x-layout.landing>
