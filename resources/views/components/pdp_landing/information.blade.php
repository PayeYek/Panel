@props([
    'productName' => '',
    'product' => '',
    'landId' => '',
    'infoType' => '',
    'landSlug' => '',
])

@php
    $boxStyle = match($infoType) {
        1  => 'bg-[#F2F2F2]',
        3  => 'relative before:absolute before:content-[""] before:bottom-0 before:inset-x-6 before:h-px before:bg-normal/30 last:before:bg-transparent',
        4  => 'bg-[#F2F2F2] border-r-4 border-r-normal',
        5  => 'border border-r-4 border-stone-400',
        default => 'bg-[#F2F2F2]'
    };
@endphp
{{-- @dd($landSlug) --}}
<section class="flex flex-col-reverse gap-4 lg:pt-6 lg:flex-col lg:col-span-4">
    <h1 class="hidden lg:block text-2xl lg:text-[32px] font-medium text-normal mb-8 lg:mb-11 line-clamp-1"> {{ $productName }} </h1>
    {{-- boxes --}}
    <div class="grid grid-cols-1 gap-2 text-sm lg:mb-16">
        @if ($product->usage)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> نوع کاربری </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->usage }} </p>
            </div>
        @endif
        @if ($product->cabin)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> نوع کابین </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3">  {{ $product->cabin == 0 ? 'بدون خواب' : 'خواب دار' }} </p>
            </div>
        @endif
        @if ($product->tonnage)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> تناژ </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->tonnage }} </p>
            </div>
        @endif
        @if ($product->axle)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> تعداد محور چرخ‌ها </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->axle == 1 ? 'تک محوره' : ($product->axle == 2 ? 'جفت محوره' : 'سه محوره') }} </p>
            </div>
        @endif
        @if ($product->year)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> سال </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->year }} </p>
            </div>
        @endif
        @if ($product->model)
            <div class="h-12 grid grid-cols-2 lg:grid-cols-5 content-center px-3 lg:px-4 gap-1 rounded-custom {{ $boxStyle }}">
                <p class="font-medium text-normal line-clamp-1 lg:col-span-2"> مدل </p>
                <p class="font-normal text-stone-700 line-clamp-1 lg:col-span-3"> {{ $product->model }} </p>
            </div>
        @endif
    </div>

    {{-- guide btns --}}
    {{-- <x-splade-data default="{ toggleModal: false }"> --}}
        <div class="flex_center flex-col gap-2 md:flex-row lg:gap-4">
            {{-- <buttton class="text-lg font-medium text-white cursor-pointer rounded-custom bg-stone-700 hover:bg-stone-800 flex_center h-11 w-52" @click="data.toggleModal = true"> مشاوره و خرید </buttton> --}}
            <Link href="{{ route('landing.page.calculator', ['page' => $landSlug]) }}" class="text-lg font-medium text-white cursor-pointer rounded-custom bg-stone-700 hover:bg-stone-800 flex_center h-11 w-52" @click="data.toggleModal = true"> مشاوره و خرید </Link>
            <Link href="{{ $product->catalog }}" class="text-lg font-medium bg-white border cursor-pointer rounded-custom text-stone-700 border-stone-700 hover:text-stone-800 hover:border-stone-800 flex_center h-11 w-52"> دانلود کاتالوگ </Link>
        </div>
        {{-- modal layer
        <div class="fixed inset-0 bg-black/60 z-[5]" v-show="data.toggleModal" @click="data.toggleModal = false"></div>
        modal content
        <section class="flex flex-col bg-white sm:rounded-custom fixed top-0 right-0 w-full h-full sm:h-auto sm:max-w-[36rem] md:max-w-[40rem] lg:max-w-[44rem] sm:top-1/2 sm:right-1/2 sm:translate-x-1/2 sm:-translate-y-1/2 z-[6] overflow-hidden" v-show="data.toggleModal">
            title
            <div
                class="w-full h-20 text-xl font-black text-white lg:text-2xl bg-stone-700 drop-shadow-base flex_center relative">
                <p> ارتباط با کارشناسان فروش </p>
                close btn
                <svg @click="data.toggleModal = false" class="size-6 absolute top-4 left-4 cursor-pointer" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="#eaeaea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <form action="#" method="#" class="flex flex-col items-center px-5 pt-6 pb-10">
                <p class="mb-6 text-base font-normal leading-7 text-center text-stone-700"> جهت ارتباط و اطلاع از
                    شرایط فروش شماره خود را وارد کنید. </p>
                <input name="phone" type="tel"
                    class="bg-white mb-5 max-w-64 h-11 border border-[#CFD1D4] focus:border-[#CFD1D4] focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#acacac] text-base font-normal px-3 text-stone-700 tracking-widest"
                    placeholder="09" />
                <button type="submit"
                    class="w-full text-base font-medium text-white rounded-custom flex_center max-w-64 h-11 bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                    ثبت درخواست </button>
            </form>
        </section> --}}
    {{-- </x-splade-data> --}}
</section>