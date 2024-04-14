@props([
    'landSlug' => '',
])

<section class="flex flex-col sm:flex-row items-center gap-4 text-stone-700 mb-8 lg:mb-14 default_container">
    <section class="group w-full prespective drop-shadow-base">
        <section class="bg-white rounded-custom h-40 sm:h-36 lg:h-44 relative w-full prespective-3d group-hover:rotateY-180 duration-300">
            <div class="flex flex-col justify-center h-full gap-4 px-8 lg:px-10 rounded-custom border-r-4 lg:border-r-8 border-r-normal absolute top-0 right-0 w-full backface-hidden">
                <p class="text-lg font-medium lg:text-2xl"> دسته بندی محصولات </p>
                <p class="text-sm leading-6 font-normal lg:text-base line-clamp-2"> گارانتی ماشین های کاریزان گارانتی ماشین های کاریزان </p>
            </div>

            <div class="absolute top-0 right-0 w-full h-full rounded-custom drop-shadow-base bg-no-repeat bg-cover overflow-hidden bg-center bg-[url('https://paye1.com/storage/media/land/files/COzYlN8cuGnSowm5hVgg9XeiXGVbd2YQpbuWrVYv.png')] rotateY-180 backface-hidden">
                <div class="w-full h-full flex_center bg-gradient-to-t from-black/80 to-transparent">
                    <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="h-11 w-44 flex_center border border-white rounded-custom text-lg font-medium text-white bg-transparent hover:bg-black/20"> بیشتر بخوانید </Link>
                </div>
            </div>
        </section>
    </section>
    <section class="group w-full prespective drop-shadow-base">
        <section class="bg-white rounded-custom h-40 sm:h-36 lg:h-44 relative w-full prespective-3d group-hover:rotateY-180 duration-300">
            <div class="flex flex-col justify-center h-full gap-4 px-8 lg:px-10 rounded-custom border-r-4 lg:border-r-8 border-r-normal absolute top-0 right-0 w-full backface-hidden">
                <p class="text-lg font-medium lg:text-2xl"> شرایط فروش </p>
                <p class="text-sm leading-6 font-normal lg:text-base line-clamp-2"> گارانتی ماشین های کاریزان گارانتی ماشین های کاریزان </p>
            </div>

            <div class="absolute top-0 right-0 w-full h-full rounded-custom drop-shadow-base bg-no-repeat bg-cover overflow-hidden bg-center bg-[url('https://paye1.com/storage/media/land/files/bzLctE71e9mTL0hsv9YVqW8S7EzwuiNFVVSqrYoQ.png')] rotateY-180 backface-hidden">
                <div class="w-full h-full flex_center bg-gradient-to-t from-black/80 to-transparent">
                    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}" class="h-11 w-44 flex_center border border-white rounded-custom text-lg font-medium text-white bg-transparent hover:bg-black/20"> بیشتر بخوانید </Link>
                </div>
            </div>
        </section>
    </section>
    <section class="group w-full prespective drop-shadow-base">
        <section class="bg-white rounded-custom h-40 sm:h-36 lg:h-44 relative w-full prespective-3d group-hover:rotateY-180 duration-300">
            <div class="flex flex-col justify-center h-full gap-4 px-8 lg:px-10 rounded-custom border-r-4 lg:border-r-8 border-r-normal absolute top-0 right-0 w-full backface-hidden">
                <p class="text-lg font-medium lg:text-2xl"> اخبار و مقالات </p>
                <p class="text-sm leading-6 font-normal lg:text-base line-clamp-2"> گارانتی ماشین های کاریزان گارانتی ماشین های کاریزان </p>
            </div>

            <div class="absolute top-0 right-0 w-full h-full rounded-custom drop-shadow-base bg-no-repeat bg-cover overflow-hidden bg-center bg-[url('https://paye1.com/storage/media/land/files/QGAIVeIQZrUU3JFFaZ80fgMGHbfjojQfF5Si7Tqp.png')] rotateY-180 backface-hidden">
                <div class="w-full h-full flex_center bg-gradient-to-t from-black/80 to-transparent">
                    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'news']) }}" class="h-11 w-44 flex_center border border-white rounded-custom text-lg font-medium text-white bg-transparent hover:bg-black/20"> بیشتر بخوانید </Link>
                </div>
            </div>
        </section>
    </section>
</section>