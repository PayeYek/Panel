<x-layout.landing.land :land="$land">

    <section class="mt-5 md:mt-16 px-5 xl:px-0">
        <header class="flex items-center justify-between">
            <h3 class="font-bold font-bakh me-10">{{ $category->title }}</h3>
            <div class="bg-gray-500/20 flex-1 h-0.5"></div>
        </header>
        <main class="mt-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($products as $product)
                <a href="{{ route('landing.product.show',['page'=> $land->slug, 'product'=> $product->slug]) }}"
                   class="c-item">
                    <img class="aspect-square rounded-md bg-white dark:bg-gray-950 p-10"
                         src="{{$product->image}}" alt="{{$product->name}}">
                    <h2>{{$product->name}}</h2>
                    <span>{{$product->model}} | {{$product->year}}</span>
                </a>
            @endforeach
        </main>
    </section>


</x-layout.landing.land>
