@props([
    'productName' => '',
    'product' => '',
])

<section class="lg:pt-24 flex flex-col-reverse gap-4">
    <h1 class="hidden md:block text-2xl lg:text-[32px] font-medium text-normal mb-8 lg:mb-11 line-clamp-1"> {{ $productName }} </h1>
    {{-- boxes --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-3 text-sm 2xl:text-[15px] md:max-w-[524px]">
        <div class="md:aspect-square h-12 grid grid-cols-2 content-center px-3 bg-dark-50 gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1"> نوع کاربری </p>
            <p class="text-stone-700 line-clamp-1 font-normal"> {{ $product->usage }} </p>
        </div>
        <div class="md:aspect-square h-12 grid grid-cols-2 content-center p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1"> نوع کابین </p>
            <p class="text-stone-700 line-clamp-1 font-normal">  {{ $product->cabin == 0 ? 'بدون خواب' : 'خواب دار' }} </p>
        </div>
        <div class="md:aspect-square h-12 grid grid-cols-2 content-center p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1"> تناژ </p>
            <p class="text-stone-700 line-clamp-1 font-normal"> {{ $product->tonnage }} </p>
        </div>
        <div class="md:aspect-square h-12 grid grid-cols-2 content-center p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1"> تعداد محور چرخ‌ها </p>
            <p class="text-stone-700 line-clamp-1 font-normal"> {{ $product->axle == 1 ? 'تک محوره' : ($product->axle == 2 ? 'جفت محوره' : 'سه محوره') }} </p>
        </div>
        <div class="md:aspect-square h-12 grid grid-cols-2 content-center p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1"> سال </p>
            <p class="text-stone-700 line-clamp-1 font-normal"> {{ $product->year }} </p>
        </div>
        <div class="md:aspect-square h-12 grid grid-cols-2 content-center p-1 bg-dark-50 gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1"> مدل </p>
            <p class="text-stone-700 line-clamp-1 font-normal"> {{ $product->model }} </p>
        </div>
    </div>

    {{-- guide btns --}}
    <div class="flex_center flex-col gap-2 md:max-w-[524px] md:flex-row lg:gap-4">
        <Link class="rounded-custom text-white bg-stone-700 flex_center text-lg font-bold h-11 cursor-pointer w-52"> مشاوره و خرید </Link>
        <Link class="rounded-custom text-stone-700 bg-white border border-stone-700 flex_center text-lg font-bold h-11 cursor-pointer w-52"> دانلود کاتالوگ </Link>
    </div>
</section>