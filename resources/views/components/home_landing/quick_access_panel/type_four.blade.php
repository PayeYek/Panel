@props([
    'landSlug' => '',
])

<section class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 lg:mb-14">
    <section class="rounded-custom relative w-full aspect-video bg-no-repeat bg-cover bg-center bg-[url('http://127.0.0.1:8000/storage/media/land/files/gdMNe1E4LN9GVUBwFbBP5cLH3DjkPyMbv7noYJwr.png')]">
        <div class="size-full flex_center rounded-custom bg-black/75">
            <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="h-11 w-52 flex_center border-x-2 border-[#FFD598] rounded-custom text-lg font-medium text-[#FFD598] bg-transparent hover:border-white hover:text-white"> دسته بندی محصولات </Link>
        </div>
    </section>
    <section class="rounded-custom relative w-full aspect-video bg-no-repeat bg-cover bg-center bg-[url('http://127.0.0.1:8000/storage/media/land/files/czCb0Y4FAN8htxZSkHSFlm3njv7wQhlRN7vju5SW.png')]">
        <div class="size-full flex_center rounded-custom bg-black/75">
            <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}" class="h-11 w-52 flex_center border-x-2 border-[#FFD598] rounded-custom text-lg font-medium text-[#FFD598] bg-transparent hover:border-white hover:text-white"> شرایط فروش </Link>
        </div>
    </section>
    <section class="rounded-custom relative w-full aspect-video bg-no-repeat bg-cover bg-center bg-[url('http://127.0.0.1:8000/storage/media/land/files/a3UXEaZuQUAe6yAYV1THlipV4NjZpCGXW4OunMET.png')]">
        <div class="size-full flex_center rounded-custom bg-black/75">
            <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'news']) }}" class="h-11 w-52 flex_center border-x-2 border-[#FFD598] rounded-custom text-lg font-medium text-[#FFD598] bg-transparent hover:border-white hover:text-white"> اخبار و مقالات </Link>
        </div>
    </section>
</section>