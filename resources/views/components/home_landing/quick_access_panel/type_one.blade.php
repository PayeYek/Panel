@props([
    'landSlug' => '',
])

<section
    class="grid default_container grid-cols-1 sm:grid-cols-2 mb-12 gap-4 lg:gap-5 lg:rounded-none lg:*:rounded-custom *:rounded-custom sm:*:rounded-none sm:rounded-custom sm:overflow-hidden sm:gap-0 *:bg-[#f5f5f5] *:flex_center *:flex-col *:text-stone-700">
    {{-- branches --}}
    <Link href="{{ route('landing.sales', ['page' => $landSlug]) }}" class="h-40">
        <svg class="size-8 stroke-normal mb-3" viewBox="0 0 32 32" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M16 17.334C18.2091 17.334 20 15.5431 20 13.334C20 11.1248 18.2091 9.33398 16 9.33398C13.7909 9.33398 12 11.1248 12 13.334C12 15.5431 13.7909 17.334 16 17.334Z"
                stroke="current" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M15.9987 2.66699C13.1697 2.66699 10.4566 3.7908 8.45623 5.79119C6.45584 7.79157 5.33203 10.5047 5.33203 13.3337C5.33203 15.8563 5.86803 17.507 7.33203 19.3337L15.9987 29.3337L24.6654 19.3337C26.1294 17.507 26.6654 15.8563 26.6654 13.3337C26.6654 10.5047 25.5416 7.79157 23.5412 5.79119C21.5408 3.7908 18.8277 2.66699 15.9987 2.66699Z"
                stroke="current" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p class="text-center text-lg font-medium mb-0.5"> لیست نمایندگی ها </p>
        <p class="text-center text-sm font-normal"> نمایش لیست نماینده ها </p>
    </Link>
    {{-- terms of sale --}}
    <Link href="{{ route('landing.article.list', ['page' => $landSlug]) }}" class="h-40">
        <svg class="size-8 fill-normal mb-3" viewBox="0 0 32 32" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M2.5 3C1.66875 3 1 3.66875 1 4.5V7.5C1 8.33125 1.66875 9 2.5 9H5.5C6.33125 9 7 8.33125 7 7.5V4.5C7 3.66875 6.33125 3 5.5 3H2.5ZM12 4C10.8938 4 10 4.89375 10 6C10 7.10625 10.8938 8 12 8H30C31.1063 8 32 7.10625 32 6C32 4.89375 31.1063 4 30 4H12ZM12 14C10.8938 14 10 14.8938 10 16C10 17.1062 10.8938 18 12 18H30C31.1063 18 32 17.1062 32 16C32 14.8938 31.1063 14 30 14H12ZM12 24C10.8938 24 10 24.8937 10 26C10 27.1063 10.8938 28 12 28H30C31.1063 28 32 27.1063 32 26C32 24.8937 31.1063 24 30 24H12ZM1 14.5V17.5C1 18.3313 1.66875 19 2.5 19H5.5C6.33125 19 7 18.3313 7 17.5V14.5C7 13.6687 6.33125 13 5.5 13H2.5C1.66875 13 1 13.6687 1 14.5ZM2.5 23C1.66875 23 1 23.6688 1 24.5V27.5C1 28.3312 1.66875 29 2.5 29H5.5C6.33125 29 7 28.3312 7 27.5V24.5C7 23.6688 6.33125 23 5.5 23H2.5Z"
                fill="current" />
        </svg>
        <p class="text-center text-lg font-medium mb-0.5"> شرایط فروش </p>
        <p class="text-center text-sm font-normal"> نمایش آخرین شرایط فروش آرین دیزل </p>
    </Link>
</section>