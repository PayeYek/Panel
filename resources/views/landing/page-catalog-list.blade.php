<x-layout.landing.land :land="$land">

    <div class="px-5 xl:px-0 flex flex-col lg:flex-row mt-10 gap-10">
        <div class="flex-1">
            <main class="leading-9">
                کاتالوگ ها
                {{--                {!! $land->body !!}--}}
            </main>
        </div>

        <div class="shrink-0 lg:pt-14 relative">
            <div class="lg:pt-10 sticky top-0 flex flex-col items-center">
                <img class="rounded-lg"
                     src="{{ asset('assets/images/test/jac 9 ton.png') }}"
                     alt="{{ '' }}">
            </div>

        </div>
    </div>
</x-layout.landing.land>
