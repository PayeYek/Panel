@props(['land'=>null])
{{--SLIDER--}}
@if($land->slides)
    <section class="main-carousel xl:rounded-md overflow-hidden"
             data-flickity='{ "pageDots": false, "prevNextButtons": false, "autoPlay": "500", "cellAlign": "left", "contain": true }'>
        @foreach($land->slides as $slide)
            <div class="carousel-cell">
                <img class="h-[220px] md:h-[400px] object-cover"
                     src="{{ $slide->image }}" alt="{{ $slide->alt }}"/>
            </div>
        @endforeach
    </section>
@endif
