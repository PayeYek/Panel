<x-layout.base>
    <div class="py-10">
        <main class="bg-white dark:bg-white w-fit mx-auto rounded-xl">
            <div class="flex gap-5 items-center p-10">
                <SwitchStyle class="hidden"/>
                <Breakpoint class="shrink-0 {{app()->environment('production') ? 'hidden': ''}}" />
            </div>
            <main class="shrink-0 flex flex-col items-center gap-5">
                <img
                    src="{{asset('assets/landing/logo.png')}}" alt="Paye1">
                <div class="p-10">
                    <p class="text-justify leading-9 max-w-md text-gray-800">پایه یک، تنها مرجع تخصصی برای آشنایی با انواع خودروهای سنگین <strong class="text-red-700">بزودی در دسترس شما خواهد بود...</strong></p>

                    <ChatMessages/>
                </div>

            </main>


{{--            <div class="grid grid-cols-3 md:max-w-xl gap-5 p-5 mx-auto">--}}
{{--                @foreach($lands as $land)--}}
{{--                    <div class="relative">--}}
{{--                        <a href="#" class="absolute inset-0 z-10"></a>--}}
{{--                        <a href="{{ $land->products->count() && $land->articles->count() ? route('landing.page.show', ['page' => $land->slug]) : '#'}}"--}}
{{--                           class="flex flex-col items-center gap-3">--}}
{{--                            <img class="aspect-square h-24 shrink-0 rounded-md bg-gray-200 " src="{{$land->logo}}"--}}
{{--                                 alt="{{$land->title}}">--}}
{{--                            <div class="flex flex-col gap-5">--}}
{{--                                <span class="text-base text-gray-700">{{$land->title}}</span>--}}
{{--                                --}}{{--                        <div class="flex gap-5">--}}
{{--                                --}}{{--                            <span class="text-xs"> تعداد محصول: {{$land->products->count()}}</span>--}}
{{--                                --}}{{--                            <span class="text-xs"> تعداد مقاله: {{$land->articles->count()}}</span>--}}
{{--                                --}}{{--                        </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}


{{--                @endforeach--}}
{{--            </div>--}}
        </main>
    </div>

</x-layout.base>
