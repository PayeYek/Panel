@props([
    'productName' => '',
    'product' => '',
])

<section class="lg:pt-12 flex flex-col-reverse lg:flex-col gap-4 lg:col-span-4">
    <h1 class="hidden lg:block text-2xl lg:text-[32px] font-medium text-normal mb-8 lg:mb-11 line-clamp-1"> {{ $productName }} </h1>
    {{-- boxes --}}
    <div class="grid grid-cols-1 gap-2 text-sm lg:mb-16">
        <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> نوع کاربری </p>
            <p class="text-stone-700 line-clamp-1 font-normal lg:col-span-3"> {{ $product->usage }} </p>
        </div>
        <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> نوع کابین </p>
            <p class="text-stone-700 line-clamp-1 font-normal lg:col-span-3">  {{ $product->cabin == 0 ? 'بدون خواب' : 'خواب دار' }} </p>
        </div>
        <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> تناژ </p>
            <p class="text-stone-700 line-clamp-1 font-normal lg:col-span-3"> {{ $product->tonnage }} </p>
        </div>
        <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> تعداد محور چرخ‌ها </p>
            <p class="text-stone-700 line-clamp-1 font-normal lg:col-span-3"> {{ $product->axle == 1 ? 'تک محوره' : ($product->axle == 2 ? 'جفت محوره' : 'سه محوره') }} </p>
        </div>
        <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> سال </p>
            <p class="text-stone-700 line-clamp-1 font-normal lg:col-span-3"> {{ $product->year }} </p>
        </div>
        <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
            <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> مدل </p>
            <p class="text-stone-700 line-clamp-1 font-normal lg:col-span-3"> {{ $product->model }} </p>
        </div>
    </div>

    {{-- guide btns --}}
    <div class="flex_center flex-col gap-2 md:max-w-[524px] md:flex-row lg:gap-4">
        <Link class="rounded-custom text-white bg-stone-700 flex_center text-lg font-bold h-11 cursor-pointer w-52"> مشاوره و خرید </Link>
        <Link class="rounded-custom text-stone-700 bg-white border border-stone-700 flex_center text-lg font-bold h-11 cursor-pointer w-52"> دانلود کاتالوگ </Link>
    </div>
</section>