@props([
    'landSlug' => '/',
    'classnames' => '',
])

<section class="default_container {{ $classnames }}">
    <h3  class="mb-2 text-base sm:text-lg font-medium text-center text-stone-700"> دسترسی سریع </h3>
    <hr class="w-60 sm:w-96 border-normal mb-6 mx-auto" />

    <section class="grid grid-cols-1 md:grid-cols-5 gap-4">
        {{-- products --}}
        <Link href="{{ route('landing.product.list', ['page' => $landSlug]) }}" class="h-[72px] bg-[#1A1B1D] relative group rounded-custom px-5 flex items-center md:flex-col md:h-auto md:pt-10 lg:pt-14 overflow-hidden lg:pb-16 md:pb-12 md:px-2 sm:h-20 text-white gap-4 sm:gap-6 md:gap-8 lg:gap-12">
            {{-- image --}}
            <div class="flex_center size-12 sm:size-14 md:size-12 lg:size-16 xl:size-20 rounded-full group-hover:animate-jump-around bg-white relative z-[1]">
                <svg class="h-6 sm:h-8 md:h-6 stroke-normal lg:h-8 xl:h-10" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7587 17.9443H16.7125M16.7125 17.9443V6.94434C16.7125 6.4139 16.5034 5.9052 16.1312 5.53012C15.7591 5.15505 15.2543 4.94434 14.7279 4.94434H4.80491C4.27856 4.94434 3.77377 5.15505 3.40159 5.53012C3.0294 5.9052 2.82031 6.4139 2.82031 6.94434V16.9443C2.82031 17.2096 2.92486 17.4639 3.11095 17.6514C3.29704 17.839 3.54944 17.9443 3.81261 17.9443H4.80491M16.7125 17.9443V8.94434H18.6971C19.7498 8.94434 20.7594 9.36576 21.5038 10.1159C22.2481 10.8661 22.6663 11.8835 22.6663 12.9443V16.9443C22.6663 17.2096 22.5618 17.4639 22.3757 17.6514C22.1896 17.839 21.9372 17.9443 21.674 17.9443M16.7125 17.9443H21.674M21.674 17.9443C21.674 18.74 21.3604 19.503 20.8021 20.0657C20.2438 20.6283 19.4866 20.9443 18.6971 20.9443C17.9076 20.9443 17.1504 20.6283 16.5921 20.0657C16.0338 19.503 15.7202 18.74 15.7202 17.9443H21.674ZM22.6663 14.9443H20.6817" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.78159 20.9443C9.42568 20.9443 10.7585 19.6012 10.7585 17.9443C10.7585 16.2875 9.42568 14.9443 7.78159 14.9443C6.13749 14.9443 4.80469 16.2875 4.80469 17.9443C4.80469 19.6012 6.13749 20.9443 7.78159 20.9443Z" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            {{-- titles --}}
            <div class="relative z-[1]">
                <p class="hidden md:block mb-1 font-medium text-base md:text-sm lg:font-normal lg:text-xl xl:text-2xl text-center"> Products </p>
                <p class="text-sm lg:text-base font-normal text-center"> محصولات </p>
            </div>

            {{-- layer --}}
            <x-home_landing.quickaccess.layer
                classNames='absolute top-0 -left-64 group-hover:left-0 transition-all group-hover:animate-pulse-custom w-auto h-full hidden md:block' />
        </Link>
        {{-- terms of sale --}}
        <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}" class="h-[72px] bg-[#1A1B1D] group relative rounded-custom px-5 flex items-center md:flex-col md:h-auto md:pt-10 lg:pt-14 overflow-hidden lg:pb-16 md:pb-12 md:px-2 sm:h-20 text-white text-sm font-normal sm:text-base md:text-sm lg:text-xl xl:text-2xl gap-4 sm:gap-6 md:gap-8 lg:gap-12">
            {{-- image --}}
            <div class="flex_center size-12 sm:size-14 md:size-12 lg:size-16 xl:size-20 group-hover:animate-jump-around rounded-full bg-white relative z-[1]">
                <svg class="h-6 sm:h-8 md:h-6 fill-normal lg:h-8 xl:h-10" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 4.99993V2.99993C3.00001 2.42081 3.16765 1.85407 3.48266 1.36812C3.79768 0.882177 4.24662 0.497795 4.77529 0.261375C5.30395 0.0249557 5.88975 -0.0533941 6.46196 0.0357832C7.03418 0.124961 7.56835 0.377853 8 0.763934C8.43165 0.377853 8.96582 0.124961 9.53804 0.0357832C10.1103 -0.0533941 10.696 0.0249557 11.2247 0.261375C11.7534 0.497795 12.2023 0.882177 12.5173 1.36812C12.8324 1.85407 13 2.42081 13 2.99993V4.99993H14.5C14.8978 4.99993 15.2794 5.15797 15.5607 5.43927C15.842 5.72058 16 6.10211 16 6.49993V16.5049C16 17.4319 15.6318 18.3208 14.9763 18.9763C14.3209 19.6317 13.4319 19.9999 12.505 19.9999H4C2.93913 19.9999 1.92172 19.5785 1.17157 18.8284C0.421427 18.0782 0 17.0608 0 15.9999V6.49993C0 6.10211 0.158035 5.72058 0.43934 5.43927C0.720644 5.15797 1.10218 4.99993 1.5 4.99993H3ZM9.635 18.4999C9.22706 17.9147 9.00887 17.2183 9.01 16.5049V6.49993H1.5V15.9999C1.5 16.3282 1.56466 16.6533 1.6903 16.9566C1.81594 17.26 2.00009 17.5356 2.23223 17.7677C2.46438 17.9998 2.73998 18.184 3.04329 18.3096C3.34661 18.4353 3.6717 18.4999 4 18.4999H9.635ZM7.5 4.99993V2.99993C7.5 2.60211 7.34197 2.22058 7.06066 1.93927C6.77936 1.65797 6.39782 1.49993 6 1.49993C5.60218 1.49993 5.22064 1.65797 4.93934 1.93927C4.65804 2.22058 4.5 2.60211 4.5 2.99993V4.99993H7.5ZM9 4.99993H11.5V2.99993C11.5 2.69117 11.4048 2.38992 11.2272 2.1373C11.0497 1.88468 10.7985 1.693 10.508 1.58843C10.2175 1.48386 9.90177 1.4715 9.60396 1.55302C9.30615 1.63454 9.04076 1.80598 8.844 2.04393C8.945 2.34393 9 2.66593 9 2.99993V4.99993ZM10.51 16.5049C10.51 17.034 10.7202 17.5415 11.0943 17.9156C11.4685 18.2897 11.9759 18.4999 12.505 18.4999C13.0341 18.4999 13.5415 18.2897 13.9157 17.9156C14.2898 17.5415 14.5 17.034 14.5 16.5049V6.49993H10.51V16.5049Z" fill="current"/>
                </svg>
            </div>
            {{-- titles --}}
            <div class="relative z-[1]">
                <p class="hidden md:block mb-1 font-medium text-base md:text-sm lg:font-normal lg:text-xl xl:text-2xl text-center"> Terms of sale </p>
                <p class="text-sm lg:text-base font-normal text-center"> شرایط فروش </p>
            </div>

            {{-- layer --}}
            <x-home_landing.quickaccess.layer
                classNames='absolute top-0 -left-64 group-hover:left-0 transition-all group-hover:animate-pulse-custom w-auto h-full hidden md:block' />
        </Link>
        {{-- blog --}}
        <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'blog']) }}" class="h-[72px] bg-[#1A1B1D] group relative rounded-custom px-5 flex items-center md:flex-col md:h-auto md:pt-10 lg:pt-14 overflow-hidden lg:pb-16 md:pb-12 md:px-2 sm:h-20 text-white text-sm font-normal sm:text-base md:text-sm lg:text-xl xl:text-2xl gap-4 sm:gap-6 md:gap-8 lg:gap-12">
            {{-- image --}}
            <div class="flex_center size-12 sm:size-14 md:size-12 lg:size-16 xl:size-20 group-hover:animate-jump-around rounded-full bg-white relative z-[1]">
                <svg class="h-6 sm:h-8 md:h-6 fill-normal lg:h-8 xl:h-10" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 15H7.5V16.5H0V15ZM0 10.5H7.5V12H0V10.5ZM16.5 7.5H1.5C1.10218 7.5 0.720644 7.34196 0.43934 7.06066C0.158035 6.77936 0 6.39782 0 6V1.5C0 1.10218 0.158035 0.720644 0.43934 0.43934C0.720644 0.158035 1.10218 0 1.5 0H16.5C16.8978 0 17.2794 0.158035 17.5607 0.43934C17.842 0.720644 18 1.10218 18 1.5V6C18 6.39782 17.842 6.77936 17.5607 7.06066C17.2794 7.34196 16.8978 7.5 16.5 7.5ZM1.5 1.5V6H16.5V1.5H1.5ZM16.5 18H12C11.6022 18 11.2206 17.842 10.9393 17.5607C10.658 17.2794 10.5 16.8978 10.5 16.5V12C10.5 11.6022 10.658 11.2206 10.9393 10.9393C11.2206 10.658 11.6022 10.5 12 10.5H16.5C16.8978 10.5 17.2794 10.658 17.5607 10.9393C17.842 11.2206 18 11.6022 18 12V16.5C18 16.8978 17.842 17.2794 17.5607 17.5607C17.2794 17.842 16.8978 18 16.5 18ZM12 12V16.5H16.5V12H12Z" fill="current"/>
                </svg>
            </div>
            {{-- titles --}}
            <div class="relative z-[1]">
                <p class="hidden md:block mb-1 font-medium text-base md:text-sm lg:font-normal lg:text-xl xl:text-2xl text-center"> Blog </p>
                <p class="text-sm lg:text-base font-normal text-center"> بلاگ </p>
            </div>
            {{-- layer --}}
            <x-home_landing.quickaccess.layer
                classNames='absolute top-0 -left-64 group-hover:left-0 transition-all group-hover:animate-pulse-custom w-auto h-full hidden md:block' />
        </Link>
        {{-- agencies --}}
        <Link href="{{ route('landing.sales', ['page' => $landSlug]) }}" class="h-[72px] bg-[#1A1B1D] group rounded-custom relative px-5 flex items-center md:flex-col md:h-auto md:pt-10 lg:pt-14 overflow-hidden lg:pb-16 md:pb-12 md:px-2 sm:h-20 text-white text-sm font-normal sm:text-base md:text-sm lg:text-xl xl:text-2xl gap-4 sm:gap-6 md:gap-8 lg:gap-12">
            {{-- image --}}
            <div class="flex_center size-12 sm:size-14 md:size-12 lg:size-16 xl:size-20 rounded-full bg-white group-hover:animate-jump-around relative z-[1]">
                <svg class="h-6 sm:h-8 md:h-6 stroke-normal lg:h-8 xl:h-10" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12C10.6569 12 12 10.6569 12 9C12 7.34315 10.6569 6 9 6C7.34315 6 6 7.34315 6 9C6 10.6569 7.34315 12 9 12Z" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 1C6.87827 1 4.84344 1.84285 3.34315 3.34315C1.84285 4.84344 1 6.87827 1 9C1 10.892 1.402 12.13 2.5 13.5L9 21L15.5 13.5C16.598 12.13 17 10.892 17 9C17 6.87827 16.1571 4.84344 14.6569 3.34315C13.1566 1.84285 11.1217 1 9 1Z" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            {{-- titles --}}
            <div class="relative z-[1]">
                <p class="hidden md:block mb-1 font-medium text-base md:text-sm lg:font-normal lg:text-xl xl:text-2xl text-center"> Agencies </p>
                <p class="text-sm lg:text-base font-normal text-center"> نمایندگی ها </p>
            </div>
            {{-- layer --}}
            <x-home_landing.quickaccess.layer
                classNames='absolute top-0 -left-64 group-hover:left-0 transition-all group-hover:animate-pulse-custom w-auto h-full hidden md:block' />
        </Link>
        {{-- announcements --}}
        <Link href="{{ route('landing.article.list', ['page' => $landSlug, 'f' => 'sell']) }}"  class="h-[72px] bg-[#1A1B1D] group relative rounded-custom px-5 flex items-center md:flex-col md:h-auto md:pt-10 lg:pt-14 overflow-hidden lg:pb-16 md:pb-12 md:px-2 sm:h-20 text-white text-sm font-normal sm:text-base md:text-sm lg:text-xl xl:text-2xl gap-4 sm:gap-6 md:gap-8 lg:gap-12">
            {{-- image --}}
            <div class="flex_center size-12 sm:size-14 md:size-12 lg:size-16 xl:size-20 rounded-full group-hover:animate-jump-around bg-white relative z-[1]">
                <svg class="h-6 sm:h-8 md:h-6 fill-normal lg:h-8 xl:h-10" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.8692 15V17C15.8692 17.2652 15.9737 17.5196 16.1598 17.7071C16.3459 17.8946 16.5983 18 16.8615 18C17.1247 18 17.3771 17.8946 17.5632 17.7071C17.7493 17.5196 17.8538 17.2652 17.8538 17V2H3.96144V13H1.97681V1C1.97681 0.734783 2.08136 0.48043 2.26746 0.292893C2.45355 0.105357 2.70595 0 2.96913 0H18.8461C19.1093 0 19.3617 0.105357 19.5478 0.292893C19.7339 0.48043 19.8385 0.734783 19.8385 1V17C19.8385 17.7956 19.5248 18.5587 18.9665 19.1213C18.4082 19.6839 17.651 20 16.8615 20H2.96913C2.17959 20 1.4224 19.6839 0.864113 19.1213C0.305828 18.5587 -0.0078125 17.7956 -0.0078125 17V15H15.8692Z" fill="current"/>
                </svg>
            </div>
            {{-- titles --}}
            <div class="relative z-[1]">
                <p class="hidden md:block mb-1 font-medium text-base md:text-sm lg:font-normal lg:text-xl xl:text-2xl text-center"> Notify </p>
                <p class="text-sm lg:text-base font-normal text-center"> اطلاعیه ها </p>
            </div>

            {{-- layer --}}
            <x-home_landing.quickaccess.layer
                classNames='absolute top-0 -left-64 group-hover:left-0 transition-all group-hover:animate-pulse-custom w-auto h-full hidden md:block' />
        </Link>
    </section>
</section>
