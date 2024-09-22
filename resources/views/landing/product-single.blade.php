<x-layout.landing.land :land="$land">
    <div class="md:px-5 xl:px-0 grid grid-cols-1 md:grid-cols-3 gap-5">
  {{--      <div class="mt-10 md:mt-0 flex-1 space-y-5">
        </div>--}}
        <section class="hidden shrink-0 relative md:flex flex-col gap-5">

            <main class="sticky top-24 flex flex-col items-center">
                <x-layout.landing.product
                    :image="$product->image"
                    :name="$product->name"
                    :model="$product->model"
                />
            </main>
        </section>

        <main class="px-5 md:col-span-2 flex flex-col gap-10">
            {{-- IMAGE & TITLE - MODEL --}}
            <div class="flex md:hidden flex-col items-center -mx-5">
                <img
                    class="aspect-square w-full rounded-lg p-4 shrink-0"
                    src="{{$product->image}}" alt="{{$product->name}}">
                <h2 class="w-fit rounded-t-xl bg-gray-200 dark:bg-gray-800 px-7 py-1.5 text-sm font-medium text-red-800 dark:text-red-600 font-inter shrink-0 text-center">{{$product->model}}</h2>
                <h1 class="w-full bg-gray-200 dark:bg-gray-800 px-10 pt-3 pb-5 text-base font-medium text-gray-900 dark:text-white text-center">{{$product->name}}</h1>
            </div>

            {{-- SLIDER --}}
{{--            @if(count($product->pictures))
                <section class="main-carousel xl:rounded-lg overflow-hidden"
                         data-flickity='{  "contain": true }'>
                    @foreach($product->pictures as $slide)
                        <div class="carousel-cell">
                            <img class=""
                                 src="{{ $slide }}" alt="{{ $product->name }}"/>
                        </div>
                    @endforeach
                </section>
            @endif--}}

            {{-- DESCRIPTION --}}
            <main class="leading-9 text-justify">
                {!! $product->body !!}
            </main>

            {{-- VIDEOS --}}
            <div class="flex flex-col gap-10 mt-10">
                @foreach($product->videos as $video)
                    <div
                        class="md:hover:scale-105 transform transition duration-200 bg-gray-100 dark:bg-gray-700 rounded-xl px-3.5 pt-3.5 pb-2 flex flex-col">
                        <div class="w-full rounded-lg bg-gray-300 dark:bg-gray-950 shrink-0 overflow-hidden h-fit">
                            {!! $video->link !!}
                        </div>
                        <span
                            class="mt-2 mb-1 text-sm font-medium text-gray-900 dark:text-white text-center grow grid place-items-center">{{$video->alt}}</span>
                    </div>
                @endforeach
            </div>

            {{-- ATTRIBUTES --}}
            <section class="space-y-2.5 relative">
                @foreach($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs)
                    <x-splade-toggle :data="$loop->iteration == 1">
                        <header @click.prevent="toggle"
                                class="sticky top-[4.5rem] flex items-center justify-between transform py-4 px-5 select-none cursor-pointer bg-gray-300 dark:bg-gray-800 rounded-xl font-medium text-base">
                            <h1 class="">{{\App\Models\LandAttribute::whereId($key)->first()->name}}</h1>
                            <x-iconsax-bol-arrow-down class="h-5 opacity-50" v-bind:class="{ 'rotate-180 ': toggled }"/>
                        </header>

                        <div v-show="toggled" class="flex flex-col px-2">
                            @foreach($attrs as $attr)
                                <div class="flex flex-col lg:flex-row lg:gap-2.5 mb-5 ">
                                    <span class="bg-gray-100 dark:bg-gray-700 rounded-t-xl lg:rounded-xl px-5 py-3 min-w-48">{{ $attr->name }}</span>
                                    <p class="w-full text-justify leading-9 font-medium bg-gray-200 dark:bg-gray-800 rounded-b-xl lg:rounded-xl px-5 py-3">{{ $attr->pivot->value->value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </x-splade-toggle>

                @endforeach
            </section>

        </main>


    </div>


</x-layout.landing.land>
