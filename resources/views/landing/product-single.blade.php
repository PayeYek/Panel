<x-layout.landing.land :land="$land">

    <div class="px-10">
        <img
            class="aspect-square w-full rounded-lg p-4 shrink-0"
            src="{{$product->image}}" alt="{{$product->name}}">
    </div>

    <div class="flex flex-col items-center">
        <h2 class="w-fit rounded-t-xl bg-gray-200 dark:bg-gray-800 px-7 py-1.5 text-sm font-bold text-red-800 dark:text-red-600 font-inter shrink-0 text-center">{{$product->model}}</h2>
        <h1 class="w-full bg-gray-200 dark:bg-gray-800 px-10 pt-3 pb-5 text-base font-bold text-gray-900 dark:text-white text-center">{{$product->name}}</h1>
    </div>

    <main class="leading-9 mt-10 text-justify px-10">
        {!! $product->body !!}
    </main>

    <section class="px-10 mt-10 space-y-2.5 relative">
        @foreach($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs)
            <x-splade-toggle>
                <header @click.prevent="toggle" class="sticky  top-[4.5rem] flex items-center justify-between transform py-4 px-5 -mx-5 select-none cursor-pointer bg-gray-200 dark:bg-gray-800 rounded-xl font-black text-base">
                    <h1 class="" >{{\App\Models\LandAttribute::whereId($key)->first()->name}}</h1>
                    <x-iconsax-bol-arrow-down class="h-5 opacity-50" v-bind:class="{ 'rotate-180 ': toggled }"/>
                </header>

                <div v-show="toggled">
                    @foreach($attrs as $attr)
                        <div class="flex flex-col gap-5 ">
                            <span class="font-bold">{{ $attr->name }}:</span>
                            <span>{{ $attr->pivot->value->value }}</span>
                        </div>
                    @endforeach
                </div>
            </x-splade-toggle>

        @endforeach
    </section>


    <div class="px-5 xl:px-0 flex flex-col lg:flex-row gap-10">
        <div class="mt-10 md:mt-0 flex-1 space-y-5">

{{--            <main class="flex flex-col md:flex-row gap-x-10">--}}
{{--                <img class="rounded-lg mb-10 bg-gray-200 dark:bg-gray-700 p-10 md:w-1/3"--}}
{{--                     src="{{$product->image}}" alt="{{$product->title}}">--}}
{{--                <div>--}}
{{--                    <h1 class="text-3xl font-bold font-bakh text-center md:text-start">{{$product->name}}</h1>--}}
{{--                    <div class="max-w-xs space-y-2">--}}
{{--                        <div class="flex items-center gap-2">--}}
{{--                            <h2 class="font-bakh">نوع:</h2>--}}
{{--                            <h3 class="font-bold font-bakh">{{$product->category->title}}</h3>--}}
{{--                        </div>--}}
{{--                        @if($product->tonnage)--}}
{{--                            <div class="flex items-center gap-2">--}}
{{--                                <h2 class="font-bakh">تناژ:</h2>--}}
{{--                                <h3 class="font-bold font-bakh">{{$product->tonnage}}</h3>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <div class="flex items-center gap-2">--}}
{{--                            <h2 class="font-bakh">برند:</h2>--}}
{{--                            <h3 class="font-bold font-bakh">{{$product->brand->title}}</h3>--}}
{{--                        </div>--}}
{{--                        <div class="flex items-center gap-2">--}}
{{--                            <h2 class="font-bakh">کشور سازنده:</h2>--}}
{{--                            <h3 class="font-bold font-bakh">{{$product->brand->country}}</h3>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </main>--}}

{{--            <div class="flex flex-col gap-10">--}}
{{--                @foreach($product->videos as $video)--}}
{{--                    {!! $video->link !!}--}}
{{--                    <span>{{$video->alt}}</span>--}}
{{--                @endforeach--}}
{{--            </div>--}}

        </div>

        <div class="shrink-0 lg:pt-14 relative flex flex-col gap-10">
            <div class="lg:pt-10 sticky top-0 flex flex-col items-center">
                <img class="rounded-lg"
                     src="{{ asset('assets/images/test/jac 9 ton.png') }}"
                     alt="{{''}}">
            </div>

        </div>
    </div>


</x-layout.landing.land>
