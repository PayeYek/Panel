@props([
    'landSlug' => '',
])

<section class="default_container grid grid-cols-1 sm:grid-cols-3 gap-4 *:h-20 sm:*:h-32 sm:*:flex-col sm:*:justify-center sm:*:gap-4 md:*:h-36 lg:*:h-40 *:w-full *:rounded-custom *:bg-stone-200 *:flex *:items-center *:gap-5 *:px-4 text-sm lg:text-base font-medium text-stone-700 mb-4 md:mb-8 lg:mb-12">
    <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="w-full">
        <img src="https://paye1.com/storage/media/land/files/WrOudpppgfjwGAW15Xomv1MxvrFKRHvpCIciGodK.png" alt="دسته بندی محصولات" class="w-24 object-cover h-16" />
        <p> دسته بندی محصولات </p>
    </Link>
    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'news']) }}" class="w-full">
        <img src="https://paye1.com/storage/media/land/files/TDyZRfLWmO6QQHBoXTmH2nQV8rrqaMGc98NuCTTI.png" alt="آخرین اخبار" class="w-24 object-cover h-16" />
        <p> آخرین اخبار </p>
    </Link>
    <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}" class="w-full">
        <img src="https://paye1.com/storage/media/land/files/AzFbYA9pwsk1JXCuNit48gIxfdJL9GNEURuTX3H9.png" alt="شرایط فروش" class="w-24 object-cover h-16" />
        <p> شرایط فروش </p>
    </Link>
</section>