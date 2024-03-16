@props([
    'productName' => '',
    'product' => '',
])

<section class="flex flex-col-reverse gap-4 lg:pt-6 lg:flex-col lg:col-span-4">
    <h1 class="hidden lg:block text-2xl lg:text-[32px] font-medium text-normal mb-8 lg:mb-11 line-clamp-1"> {{ $productName }} </h1>
    {{-- boxes --}}
    <div class="grid grid-cols-1 gap-2 text-sm lg:mb-16">
        @if ($product->usage)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> نوع کاربری </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->usage }} </p>
            </div>
        @endif
        @if ($product->cabin)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> نوع کابین </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3">  {{ $product->cabin == 0 ? 'بدون خواب' : 'خواب دار' }} </p>
            </div>
        @endif
        @if ($product->tonnage)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> تناژ </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->tonnage }} </p>
            </div>
        @endif
        @if ($product->axle)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> تعداد محور چرخ‌ها </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->axle == 1 ? 'تک محوره' : ($product->axle == 2 ? 'جفت محوره' : 'سه محوره') }} </p>
            </div>
        @endif
        @if ($product->year)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> سال </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->year }} </p>
            </div>
        @endif
        @if ($product->model)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 bg-[#F2F2F2] gap-1 rounded-custom">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> مدل </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->model }} </p>
            </div>
        @endif
    </div>

    {{-- guide btns --}}
    <div class="flex_center flex-col gap-2 md:max-w-[524px] md:flex-row lg:gap-4">
        <Link class="text-lg font-bold text-white cursor-pointer rounded-custom bg-stone-700 flex_center h-11 w-52"> مشاوره و خرید </Link>
        <Link href="{{ $product->catalog }}" class="text-lg font-bold bg-white border cursor-pointer rounded-custom text-stone-700 border-stone-700 flex_center h-11 w-52"> دانلود کاتالوگ </Link>
    </div>
</section>