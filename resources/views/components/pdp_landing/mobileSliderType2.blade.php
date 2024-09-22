@props([
    'slides' => null,
])

@push('script')
    <script>
        var swiper = new Swiper('.arian_disel_slider', {
            // Optional parameters
            loop: true,
            slidePerView: 1,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
@endpush

{{-- @dd($slides) --}}

<section class="swiper">
    <div class="swiper-wrapper">
        @foreach ($slides as $slide)
            <div class="w-full relative pt-[100%]">
                <img src="{{ $slide }}" alt="/" class="absolute top-0 left-0 w-full h-full" />
            </div>
        @endforeach
    </div>
</section>