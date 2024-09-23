<x-layout.landing>

<div class="py-3.5">
    <span class="pt-10 pb-2">digikala</span>
    <img
        class="h-[268px] md:h-[400px] object-cover"
        src="{{asset('assets/images/test/guide.jpg')}}" alt=""/>
</div>


    <span class="pt-10 pb-2">test</span>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 px-5">
        @foreach($lands as $land)
            <a href="l/{{ $land->slug}}" class="text-center">
                <img src="{{$land->logo}}" alt="{{$land->title}}">
                <div>{{$land->title}}</div>
            </a>
        @endforeach
    </div>

</x-layout.landing>
