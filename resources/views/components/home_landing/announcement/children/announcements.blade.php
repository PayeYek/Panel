@props([
    'type' => '1',
    'data' => '',
    'landSlug' => '/',
    'borderType' => '0',
    'evenOdd' => '0',
])
@php
    $gridCols = match($type) {
        '1' => 'grid grid-cols-1 gap-4',
        '2' => 'flex gap-4 items-center overflow-auto p-4 scrollbar-none md:scrollbar-thin lg:grid lg:grid-cols-4 lg:p-0 lg:overflow-visible',
        '3' => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom',
        '4' => 'grid grid-cols-1 border border-dark-100 p-4 rounded-custom',
        default => null
    };

    $borderStyle = match($borderType) {
        '0'  => '',
        '1'  => 'drop-shadow-base',
        '2'  => 'border border-dark-100',
        default => ''
    };

@endphp

@if ($type."" !== '5')
    <ul class="mb-4 {{ $gridCols }} list-none sm:mb-0 w-full" >
        @foreach ($data as $article)
            <x-home_landing.announcement.children.announcement
                :type="$type"
                :borderStyle="$borderStyle"
                :title="$article->title"
                :description="$article->description"
                :image="$article->image"
                :articleSlug="$article->slug"
                :landSlug="$landSlug"
            />
        @endforeach
    </ul>
@else
    <div class="swiper articleSliderType5 w-full">
        <div class="swiper-wrapper mb-4">
            @foreach ($data as $article)
            <div :class="'swiper-slide flex flex-col flex-none overflow-hidden rounded-custom {{ $borderStyle }} ' + ({{ $evenOdd }} == '1' ? 'evenOdd_cards' : 'bg-white')">
                <div class="relative w-full pt-[62%]">
                    <img src="{{ $article->image }}" alt="{{ $article->title }}"
                        class="absolute top-0 left-0 w-full h-full object-cover" />
                </div>
                {{-- info --}}
                <div class="px-2 pt-3 pb-4">
                    <div class="flex_between gap-4 mb-1">
                        <h3 class="text-base sm:text-lg font-bold text-slate-700 line-clamp-1 leading-7"> {{ $article->title }} </h3>
                        <h4 class="text-sm sm:text-base font-bold text-normal flex-none leading-7"> بهمن 1402 </h4>
                    </div>
                    <p class="mb-2 text-sm font-normal leading-6 sm:leading-7 sm:h-20 sm:mb-3 text-justify text-slate-700 line-clamp-3 h-[72px]">
                        {{ $article->description }}
                    </p>
                    <x-home_landing.announcement.children.linkBtn text="بیشتر" href="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $article->slug]) }}" class="mx-auto text-white bg-slate-700" />
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next articleSliderType5-next"></div>
        <div class="swiper-button-prev articleSliderType5-prev"></div>
        <div class="swiper-pagination articleSliderType5-pagination"></div>
    </div>
@endif


@push('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script type="module">
        var swiper1 = new Swiper(".articleSliderType5", {
            slidesPerView: "auto",
            spaceBetween: 20,
            breakpoints: {
                320: {
                    slidesPerView: "auto",
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
            navigation: {
                nextEl: ".articleSliderType5-next",
                prevEl: ".articleSliderType5-prev",
            },
            pagination: {
                el: ".articleSliderType5-pagination",
            },
        });
    </script>
@endpush