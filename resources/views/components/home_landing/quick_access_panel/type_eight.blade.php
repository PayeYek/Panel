@props([
    'landSlug' => '',
])

<section class="grid grid-cols-1 md:grid-cols-3 gap-4 md:*:flex-1 rounded-custom *:rounded-custom *:flex *:items-center text-xl lg:text-2xl xl:text-3xl font-medium text-white mb-4 md:mb-8 lg:mb-12 default_container">
    <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="relative w-full pt-[38%] md:pt-[128%] bg-center bg-no-repeat bg-cover hover:drop-shadow-[0_4px_4px_rgba(0,0,0,0.2)] lg:hover:drop-shadow-[0_4px_4px_rgba(0,0,0,0.25)] hover:bottom-0.5 lg:hover:bottom-1.5 transition-all bottom-0 lg:duration-300 duration-200" style="background-image: url(https://paye1.com/storage/media/land/files/Tag2VJCn8tSvfvrUGlTYAMmgznoF3hNsWbeWhWTI.jpg)">
        <div class="absolute top-0 left-0 w-full h-full flex items-center">
            <div class="flex_center max-h-28 lg:max-h-32 h-full bg-gradient-to-l from-normal to-black/50 w-full"> محصولات </div>
        </div>
    </Link>
    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}" class="relative w-full pt-[38%] md:pt-[128%] bg-center bg-no-repeat bg-cover hover:drop-shadow-[0_4px_4px_rgba(0,0,0,0.2)] lg:hover:drop-shadow-[0_4px_4px_rgba(0,0,0,0.25)] hover:bottom-0.5 lg:hover:bottom-1.5 transition-all bottom-0 lg:duration-300 duration-200" style="background-image: url(https://paye1.com/storage/media/land/files/lSOanE10cYJn9sbRYKH1PyiqbWZl3fN78fj1rnmU.jpg)">
        <div class="absolute top-0 left-0 w-full h-full flex items-center">
            <div class="flex_center max-h-28 lg:max-h-32 h-full bg-gradient-to-l from-normal to-black/50 w-full"> طرح های ویژه </div>
        </div>
    </Link>
    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'news']) }}" class="relative w-full pt-[38%] md:pt-[128%] bg-center bg-no-repeat bg-cover hover:drop-shadow-[0_4px_4px_rgba(0,0,0,0.2)] lg:hover:drop-shadow-[0_4px_4px_rgba(0,0,0,0.25)] hover:bottom-0.5 lg:hover:bottom-1.5 transition-all bottom-0 lg:duration-300 duration-200" style="background-image: url(https://paye1.com/storage/media/land/files/IaIyNKHc1nh1CD8wKpCUZYwx3wjC05C98NqFj3MX.jpg)">
        <div class="absolute top-0 left-0 w-full h-full flex items-center">
            <div class="flex_center max-h-28 lg:max-h-32 h-full bg-gradient-to-l from-normal to-black/50 w-full"> آخرین اخبار </div>
        </div>
    </Link>
</section>