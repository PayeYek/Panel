@props([
    'landSlug' => '',
])

<section class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 lg:mb-14 default_container">
    <section class="rounded-custom relative w-full aspect-video bg-no-repeat bg-cover bg-center bg-[url('https://paye1.com/storage/media/land/files/MwHxtT5HYWz6M2y6i9r3JKODUn3afBSt098ZxKRX.png')]">
        <div class="size-full flex_center rounded-custom bg-black/75">
            <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="h-11 w-52 flex_center border-x-2 border-[#FFD598] rounded-custom text-lg font-medium text-[#FFD598] bg-transparent hover:border-white hover:text-white"> دسته بندی محصولات </Link>
        </div>
    </section>
    <section class="rounded-custom relative w-full aspect-video bg-no-repeat bg-cover bg-center bg-[url('https://paye1.com/storage/media/land/files/V8Bmbyq7hQhrvNT2WGLQgwayvtVlLC9Hc5MXqNvo.png')]">
        <div class="size-full flex_center rounded-custom bg-black/75">
            <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}" class="h-11 w-52 flex_center border-x-2 border-[#FFD598] rounded-custom text-lg font-medium text-[#FFD598] bg-transparent hover:border-white hover:text-white"> شرایط فروش </Link>
        </div>
    </section>
    <section class="rounded-custom relative w-full aspect-video bg-no-repeat bg-cover bg-center bg-[url('https://paye1.com/storage/media/land/files/vzNKAVs3YxA6i2u3sLi8xJ0fLxvrRgrk95YxHXKi.png')]">
        <div class="size-full flex_center rounded-custom bg-black/75">
            <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'news']) }}" class="h-11 w-52 flex_center border-x-2 border-[#FFD598] rounded-custom text-lg font-medium text-[#FFD598] bg-transparent hover:border-white hover:text-white"> اخبار و مقالات </Link>
        </div>
    </section>
</section>