@props(['type' => '1', 'radiusSize' => '4'])

@switch($type)
    @case(1)
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
        @break
    @case(2)
        <li class="flex flex-col overflow-hidden {{ $radiusSize }} drop-shadow-[0_4px_20px_rgba(0,0,0,0.15)] bg-white dark:bg-gray-700">
            <div class="relative w-full pt-[62%]">
                <img src="{{ asset('assets/images/test/jac.jpg') }}" alt=""
                    class="absolute top-0 left-0 w-full h-full object-cover" />
            </div>
            {{-- info --}}
            <div class="px-5 pt-4 pb-6">
                <h3 class="mb-2 text-lg font-bold text-gray-900 dark:text-white line-clamp-1"> معرفی شرکت تولید
                    کننده جک ۸.۵ تن
                </h3>
                <p
                    class="mb-2 text-sm font-normal sm:h-[72px] leading-6 h-[72px] text-justify text-gray-900 dark:text-white line-clamp-3">
                    کامیونت جک 8.5 تن یکی از موفق‌ترین محصولات شرکت جک است که با ظرفیت حمل بار 8500 کیلوگرم از
                    نظر
                    کیفی در سطح مطلوبی قرار دارد.شرکت جک (JAC) در کشور چین واقع شده
                </p>
                <a href="#"
                    class="mr-auto text-sm font-bold text-white bg-red-700 {{ $radiusSize }} dark:bg-red-600 flex_center h-8 w-28">
                    بیشتر </a>
            </div>
        </li>
        @break
    @default
        
@endswitch
