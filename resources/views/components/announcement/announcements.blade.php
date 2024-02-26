@props(['radius' => '0'])
@php
$radiusSize = null;
    switch ($radius) {
        case '0':
            $radiusSize = 'rounded-none';
            break;
        case '2':
            $radiusSize = 'rounded-sm';
            break;
        case '4':
            $radiusSize = 'rounded';
            break;
        case '6':
            $radiusSize = 'rounded-md';
            break;
        case '8':
            $radiusSize = 'rounded-lg';
            break;
        case '12':
            $radiusSize = 'rounded-xl';
            break;
        case '16':
            $radiusSize = 'rounded-2xl';
            break;
        
        default:
            # code...
            break;
    }
@endphp
<ul class="mb-4 list-none sm:mb-0">
    <li class="flex flex-col sm:flex-row {{ $radiusSize }} bg-white dark:bg-gray-700 drop-shadow-[0_4px_20px_rgba(0,0,0,0.15)] overflow-hidden">
        {{-- image --}}
        <div
            class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none">
            <img src="{{ asset('assets/images/test/jac.jpg') }}" alt="jax"
                class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
        </div>
        {{-- docs --}}
        <div class="px-6 pb-6 pt-2.5 md:pl-10 flex flex-col sm:justify-center">
            <h3 class="mb-4 text-lg font-bold text-gray-900 dark:text-white"> عنوان اطلاعیه </h3>
            <p
                class="text-sm text-justify line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-16 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-[#818284] dark:text-white">
                شرکت آرین دیزل که نماینده انحصاری شرکت خودروسازی جک موتورز در ایران است مسئولیت تولید و مونتاژ
                محصولات شرکت خودروسازی را بر عهده دارد و با بهره مندی از مهندسان با تجربه نسبت به محصولاتی
                مرغوب، قابل اطمینان اقدام نموده است و با توجه به اینکه محصولات خود را با مرغوب‌ترین قطعات تولید
                می‌کند توانسته به جایگاه ویژه ای در صنعت خودروسازی ایران دست پیدا کند.کامیونت جک ۸.۵ تن یکی از
                محصولاتی است که توسط این شرکت در ایران تولید می‌شود و با توجه به عملکرد خوبی که دارد قابلیت
                رقابت با خودروهای اروپایی را دارد و این امر آرین دیزل را در زمره ی بهترین شرکت‌های خودروسازی
                قرار داده است.
            </p>
            <a href="#"
                class="mx-auto sm:ml-0 text-sm font-bold text-white bg-red-700 {{ $radiusSize }} dark:bg-red-600 flex_center h-8 w-[6.5rem]"> بیشتر </a>
        </div>
    </li>
</ul>