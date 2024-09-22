@props([
    'landSlug' => '',
])

<section class="*:h-20 sm:*:h-32 flex flex-col md:flex-row items-center md:*:flex-1 *:justify-center rounded-custom bg-stone-200 *:flex *:items-center text-xl md:text-2xl font-normal lg:font-medium text-stone-700 mb-4 md:mb-8 lg:mb-12 default_container">
    <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="relative before:bottom-0 before:left-1/2 before:w-32 before:-translate-x-1/2 before:h-px before:bg-stone-400 before:absolute before:content-[''] md:before:left-0 md:before:bottom-1/2 md:before:w-px md:before:h-14 md:before:translate-x-0 md:before:translate-y-1/2">
        <p> دسته بندی محصولات </p>
    </Link>
    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}" class="relative before:bottom-0 before:left-1/2 before:w-32 before:-translate-x-1/2 before:h-px before:bg-stone-400 before:absolute before:content-[''] md:before:left-0 md:before:bottom-1/2 md:before:w-px md:before:h-14 md:before:translate-x-0 md:before:translate-y-1/2">
        <p> طرح های ویژه </p>
    </Link>
    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'news']) }}" class="">
        <p> آخرین اخبار </p>
    </Link>
</section>