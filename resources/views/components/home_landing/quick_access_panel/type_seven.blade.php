@props([
    'landSlug' => '',
])

<section class="*:h-20 grid grid-cols-1 md:grid-cols-3 gap-4 md:*:flex-1 rounded-custom *:bg-normal *:rounded-custom *:flex *:items-center text-xl lg:text-2xl font-normal text-white mb-4 md:mb-8 lg:mb-12 default_container *:px-4 md:*:px-6">
    <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="relative overflow-hidden">
        <p> محصولات </p>
        <svg width="358" height="80" class="absolute top-0 left-0" viewBox="0 0 358 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.15" d="M0 80L0 -2.74181e-06L357.443 -2.74181e-06C357.443 -2.74181e-06 215.334 36.2642 147.819 57.4648C80.3049 78.6654 0 80 0 80Z" fill="white"/>
        </svg>
    </Link>
    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}" class="relative overflow-hidden">
        <p> طرح های ویژه </p>
        <svg width="358" height="80" class="absolute top-0 left-0" viewBox="0 0 358 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.15" d="M0 80L0 -2.74181e-06L357.443 -2.74181e-06C357.443 -2.74181e-06 215.334 36.2642 147.819 57.4648C80.3049 78.6654 0 80 0 80Z" fill="white"/>
        </svg>
    </Link>
    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'news']) }}" class="relative overflow-hidden">
        <p> آخرین اخبار </p>
        <svg width="358" height="80" class="absolute top-0 left-0" viewBox="0 0 358 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.15" d="M0 80L0 -2.74181e-06L357.443 -2.74181e-06C357.443 -2.74181e-06 215.334 36.2642 147.819 57.4648C80.3049 78.6654 0 80 0 80Z" fill="white"/>
        </svg>
    </Link>
</section>