@push('script')
{{-- <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script> --}}
<script type="text/javascript">
    // Initialize player
    // document.addEventListener('DOMContentLoaded', () => {
        // const player = new Plyr('#player');
    // });

</script>
@endpush

@push('styles')
    {{-- <link rel="stylesheet" href="path/to/plyr.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" /> --}}
@endpush

<x-layout.landing.land :land="$land">

    <x-layout.landing.sidebar :land="$land" />

    {{-- products --}}
    <section class="flex items-center justify-between gap-3 px-5 mb-16 lg:justify-start">
        <h3 class="text-lg font-bold text-gray-900"> محصولات </h3>
        <div class="flex items-center gap-5 p-4 overflow-auto text-base font-bold text-red-700">
            <a href="#"
                class="w-[140px] h-8 flex_center rounded drop-shadow-[0_2px_8px_rgba(185,28,28,0.3)] bg-white flex-none">
                کشنده </a>
            <a href="#"
                class="w-[140px] h-8 flex_center rounded drop-shadow-[0_2px_8px_rgba(185,28,28,0.3)] bg-white flex-none">
                کامیون </a>
            <a href="#"
                class="w-[140px] h-8 flex_center rounded drop-shadow-[0_2px_8px_rgba(185,28,28,0.3)] bg-white flex-none">
                کامییونت </a>
            <a href="#"
                class="w-[140px] h-8 flex_center rounded drop-shadow-[0_2px_8px_rgba(185,28,28,0.3)] bg-white flex-none">
                ون </a>
        </div>
    </section>

    {{-- favorites --}}
    <section class="px-5 mb-16 xl:px-0">
        <h3 class="mb-4 text-lg font-bold text-gray-900 lg:px-4"> برگزیده ها </h3>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
            <div
                class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded px-10 lg:px-5 xl:px-10 pb-5 items-center pt-3 bg-white flex flex-col">
                <div class="h-32 mb-1.5">
                    <img src="{{ asset('assets/images/test/jac 9 ton.png') }}" alt="mammut" class="h-full" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 line-clamp-1"> کامیون جک 8.5 تن </h3>
                <a href="#"
                    class="w-full mt-4 text-lg font-bold text-red-700 border border-red-700 rounded h-11 flex_center">
                    مشخصات </a>
                <a href="#"
                    class="w-full mt-4 text-lg font-bold text-red-700 border border-red-700 rounded h-11 flex_center">
                    مشخصات </a>
                <a href="#"
                    class="w-full mt-4 text-lg font-bold text-red-700 border border-red-700 rounded h-11 flex_center">
                    مشخصات </a>
            </div>
            <div
                class="drop-shadow-[0_2px_10px_rgba(0,0,0,0.15)] rounded px-10 lg:px-5 xl:px-10 pb-5 items-center pt-3 bg-white flex flex-col">
                <div class="h-32 mb-1.5">
                    <img src="{{ asset('assets/images/test/jac 9 ton.png') }}" alt="mammut" class="h-full" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 line-clamp-1"> کامیون جک 8.5 تن </h3>
                <a href="#"
                    class="w-full mt-4 text-lg font-bold text-red-700 border border-red-700 rounded h-11 flex_center">
                    مشخصات </a>
                <a href="#"
                    class="w-full mt-4 text-lg font-bold text-red-700 border border-red-700 rounded h-11 flex_center">
                    مشخصات </a>
                <a href="#"
                    class="w-full mt-4 text-lg font-bold text-red-700 border border-red-700 rounded h-11 flex_center">
                    مشخصات </a>
            </div>
        </div>
    </section>

    {{-- notifications --}}
    <section class="px-5 mb-32 xl:px-0">
        {{-- header --}}
        <div class="flex items-center justify-between mb-16 lg:px-4">
            <h3 class="text-lg font-bold text-gray-900"> برگزیده ها </h3>
            <a href="#" class="flex items-center gap-2 text-xs font-normal text-red-700">
                <span> نمایش همه </span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                        stroke="#B91C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <ul class="list-none">
            <li class="flex flex-col md:flex-row rounded-xl bg-white drop-shadow-[0_4px_20px_rgba(0,0,0,0.15)]">
                {{-- image --}}
                <div
                    class="h-48 overflow-hidden md:flex-none md:w-[22rem] md:h-56 md:rounded-tl-none md:rounded-br-xl rounded-t-xl">
                    <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="jax"
                        class="object-cover w-full h-full" />
                </div>
                {{-- docs --}}
                <div class="p-4">
                    <h3 class="mb-4 text-lg font-bold text-gray-900"> عنوان اطلاعیه </h3>
                    <p
                        class="text-base line-clamp-6 md:line-clamp-3 leading-7 lg:leading-8 mb-2 font-normal text-[#818284]">
                        شرکت آرین دیزل که نماینده انحصاری شرکت خودروسازی جک موتورز در ایران است مسئولیت تولید و مونتاژ
                        محصولات شرکت خودروسازی را بر عهده دارد و با بهره مندی از مهندسان با تجربه نسبت به محصولاتی
                        مرغوب، قابل اطمینان اقدام نموده است و با توجه به اینکه محصولات خود را با مرغوب‌ترین قطعات تولید
                        می‌کند توانسته به جایگاه ویژه ای در صنعت خودروسازی ایران دست پیدا کند.کامیونت جک ۸.۵ تن یکی از
                        محصولاتی است که توسط این شرکت در ایران تولید می‌شود و با توجه به عملکرد خوبی که دارد قابلیت
                        رقابت با خودروهای اروپایی را دارد و این امر آرین دیزل را در زمره ی بهترین شرکت‌های خودروسازی
                        قرار داده است.
                    </p>
                    <a href="#"
                        class="mr-auto text-sm font-bold text-white bg-red-700 rounded flex_center h-9 w-28"> بیشتر </a>
                </div>
            </li>
        </ul>
    </section>

    {{-- news --}}
    <section class="px-5 mb-20 xl:px-0">
        {{-- header --}}
        <div class="flex items-center justify-between mb-16 lg:px-4">
            <h3 class="text-lg font-bold text-gray-900"> اخبار و مقالات </h3>
            <a href="#" class="flex items-center gap-2 text-xs font-normal text-red-700">
                <span> نمایش همه </span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                        stroke="#B91C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <ul class="grid grid-cols-1 gap-4 list-none lg:grid-cols-4">
            <li class="flex flex-col border-2 rounded border-gray-900/50">
                <div class="relative w-full pt-[62%]">
                    <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="" class="absolute inset-0" />
                </div>
                {{-- info --}}
                <div class="px-5 pt-3 pb-5">
                    <h3 class="mb-2 text-lg font-bold text-gray-900 line-clamp-1"> معرفی شرکت تولید کننده جک ۸.۵ تن
                    </h3>
                    <p class="mb-2 text-sm font-normal leading-6 h-[72px] text-gray-900 line-clamp-3">
                        کامیونت جک 8.5 تن یکی از موفق‌ترین محصولات شرکت جک است که با ظرفیت حمل بار 8500 کیلوگرم از نظر
                        کیفی در سطح مطلوبی قرار دارد.شرکت جک (JAC) در کشور چین واقع شده
                    </p>
                    <a href="#"
                        class="mr-auto text-sm font-bold text-white bg-red-700 rounded flex_center h-9 w-28"> بیشتر </a>
                </div>
            </li>
            <li class="flex flex-col border-2 rounded border-gray-900/50">
                <div class="relative w-full pt-[62%]">
                    <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="" class="absolute inset-0" />
                </div>
                {{-- info --}}
                <div class="px-5 pt-3 pb-5">
                    <h3 class="mb-2 text-lg font-bold text-gray-900 line-clamp-1"> معرفی شرکت تولید کننده جک ۸.۵ تن
                    </h3>
                    <p class="mb-2 text-sm font-normal leading-6 h-[72px] text-gray-900 line-clamp-3">
                        کامیونت جک 8.5 تن یکی از موفق‌ترین محصولات شرکت جک است که با ظرفیت حمل بار 8500 کیلوگرم از نظر
                        کیفی در سطح مطلوبی قرار دارد.شرکت جک (JAC) در کشور چین واقع شده
                    </p>
                    <a href="#"
                        class="mr-auto text-sm font-bold text-white bg-red-700 rounded flex_center h-9 w-28"> بیشتر </a>
                </div>
            </li>
            <li class="flex flex-col border-2 rounded border-gray-900/50">
                <div class="relative w-full pt-[62%]">
                    <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="" class="absolute inset-0" />
                </div>
                {{-- info --}}
                <div class="px-5 pt-3 pb-5">
                    <h3 class="mb-2 text-lg font-bold text-gray-900 line-clamp-1"> معرفی شرکت تولید کننده جک ۸.۵ تن
                    </h3>
                    <p class="mb-2 text-sm font-normal leading-6 h-[72px] text-gray-900 line-clamp-3">
                        کامیونت جک 8.5 تن یکی از موفق‌ترین محصولات شرکت جک است که با ظرفیت حمل بار 8500 کیلوگرم از نظر
                        کیفی در سطح مطلوبی قرار دارد.شرکت جک (JAC) در کشور چین واقع شده
                    </p>
                    <a href="#"
                        class="mr-auto text-sm font-bold text-white bg-red-700 rounded flex_center h-9 w-28"> بیشتر
                    </a>
                </div>
            </li>
            <li class="flex flex-col border-2 rounded border-gray-900/50">
                <div class="relative w-full pt-[62%]">
                    <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="" class="absolute inset-0" />
                </div>
                {{-- info --}}
                <div class="px-5 pt-3 pb-5">
                    <h3 class="mb-2 text-lg font-bold text-gray-900 line-clamp-1"> معرفی شرکت تولید کننده جک ۸.۵ تن
                    </h3>
                    <p class="mb-2 text-sm font-normal leading-6 h-[72px] text-gray-900 line-clamp-3">
                        کامیونت جک 8.5 تن یکی از موفق‌ترین محصولات شرکت جک است که با ظرفیت حمل بار 8500 کیلوگرم از نظر
                        کیفی در سطح مطلوبی قرار دارد.شرکت جک (JAC) در کشور چین واقع شده
                    </p>
                    <a href="#"
                        class="mr-auto text-sm font-bold text-white bg-red-700 rounded flex_center h-9 w-28"> بیشتر
                    </a>
                </div>
            </li>
        </ul>
    </section>

    {{-- videos --}}
    <section class="px-5 mb-20 xl:px-0">
        {{-- header --}}
        <div class="flex items-center justify-between mb-16 lg:px-4">
            <h3 class="text-lg font-bold text-gray-900"> ویدیو ها </h3>
            <a href="#" class="flex items-center gap-2 text-xs font-normal text-red-700">
                <span> نمایش همه </span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.88759 15.8327L3.33203 9.99935M3.33203 9.99935L8.88759 4.16602M3.33203 9.99935L16.6654 9.99935"
                        stroke="#B91C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <ul class="grid grid-cols-1 gap-4 list-none lg:grid-cols-3">
            <li class="relative w-full pt-[66%]">
                <div class="absolute inset-0">
                    <video id="player1" playsinline controls
                        data-poster="{{ asset('assets/images/test/jac.jpg') }}">
                        {{-- <source src="/assets/images/test/movie.mp4" type="video/mp4" /> --}}
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" />
                    </video>
                </div>
            </li>
            <li class="relative w-full pt-[66%]">
                <div class="absolute inset-0">
                    <video id="player2" playsinline controls
                        data-poster="{{ asset('assets/images/test/jac 9 ton.png') }}">
                        {{-- <source src="/assets/images/test/movie.mp4" type="video/mp4" /> --}}
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" />
                    </video>
                </div>
            </li>
            <li class="relative w-full pt-[66%]">
                <div class="absolute inset-0">
                    <video id="player3" playsinline controls
                        data-poster="{{ asset('assets/images/test/jac.jpg') }}">
                        {{-- <source src="/assets/images/test/movie.mp4" type="video/mp4" /> --}}
                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" />
                    </video>
                </div>
            </li>
        </ul>
    </section>

    {{-- CATEGORIES | PRODUCTS --}}
    <x-layout.landing.products class="mt-5 md:mt-16" :land="$land" :data="$data" />

    {{-- VIDEOS --}}
    {{--
    @if ($land->videos)
        <section class="relative grid grid-cols-1 gap-5 px-5 mt-5 md:mt-16 xl:px-0 md:grid-cols-2 lg:grid-cols-4">
            <header
                class="sticky top-0 flex flex-row items-center bg-gray-100 md:min-h-60 md:min-w-fit rounded-xl p-7 md:flex-col group md:relative md:bg-gradient-to-t from-gray-100 to-gray-300">
                <span
                    class="text-lg font-bold md:mb-3 md:text-5xl lg:text-3xl grow md:grid md:place-items-center">{{ __('Videos') }}</span>
                <a href="#"
                   class="px-5 py-1 text-xs font-bold text-red-800 transition-all duration-200 border-2 border-red-800 rounded-full md:order-4 group-hover:border-red-700 group-hover:text-white group-hover:bg-red-700 md:text-sm">{{ __('Show all') }}</a>
            </header>

            @foreach ($land->videos->take(3) as $video)
                --}}{{--                <a href="{{ route('landing.video.show', ['page'=> $land->slug , 'video'=> $video->slug]) }}" --}}{{--
                <div
                    class="group hover:scale-105 transform transition duration-200 bg-gray-100 rounded-xl px-3.5 pt-3.5 pb-2 flex flex-col">
                    <div class="w-full overflow-hidden bg-gray-300 rounded-lg dark:bg-gray-950 shrink-0">
                        {!! $video->link !!}
                    </div>
                    <h2 class="grid mt-2 mb-1 text-sm font-bold text-center text-gray-900 grow place-items-center">{{$video->alt}}</h2>
                </div>
                --}}{{--                </a> --}}{{--
            @endforeach
        </section>
    @endif
    --}}

    {{-- ARTICLES --}}
    <x-layout.landing.articles :land="$land" class="mt-5 md:mt-16" />

    {{-- CATEGORIES | PRODUCTS --}}
    {{--
    @if ($data)
        @foreach ($data as $item)
            @if ($item['products']->count())
                <section class="px-5 mt-5 md:mt-16 xl:px-0">
                    <header class="flex items-center justify-between">
                        <h3 class="font-bold font-bakh me-10">{{ $item['category']->title }}</h3>
                        <div class="bg-gray-500/20 flex-1 h-0.5"></div>
                        @if ($item['products']->count() > 4)
                            <a href="#"
                               class="font-medium bg-gray-500/20 hover:bg-gray-500/40 px-5 py-1.5 text-xs rounded-full transition-all duration-200">{{ __('Show all') }}</a>
                        @endif
                    </header>
                    <main class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($item['products']->take(4) as $product)
                            <a href="{{ route('landing.product.show',['page'=> $land->slug, 'product'=> $product->slug]) }}"
                               class="c-item">
                                <img class="p-10 bg-white rounded-md aspect-square dark:bg-gray-950"
                                     src="{{$product->image}}" alt="{{$product->name}}">
                                <h2>{{$product->name}}</h2>
                                <span>{{$product->model}} | {{$product->year}}</span>
                            </a>
                        @endforeach
                    </main>
                </section>
            @endif
        @endforeach
    @endif
    --}}

    {{-- ARTICLES --}}
    {{--
    @if ($newsArticles || $blogArticles)
        <section class="grid grid-cols-1 gap-10 px-5 mt-5 md:mt-16 xl:px-0 md:grid-cols-2">
            <x-layout.landing.article-group :title="__('News and notifications')"
                                            link="#"
                                            :contents="$newsArticles"/>

            <x-layout.landing.article-group :title="__('Latest blog content')"
                                            link="#"
                                            :contents="$blogArticles"/>
        </section>
    @endif
    --}}


</x-layout.landing.land>
