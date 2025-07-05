<section class="bg-normal border-b-4 border-b-[#FFD600]">
    <section class="default_container relative pt-10 pb-14 lg:pt-14 lg:pb-16">
        <p class="text-lg lg:text-2xl font-medium mb-4 text-center text-white md:mb-6"> ارتباط با کارشناسان فروش </p>
        <p class="text-sm lg:text-base font-normal text-white mb-8 lg:mb-12 text-center"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید </p>
        {{-- form --}}
        <section class="flex flex-col gap-10 lg:gap-16 items-center">
            <form action="#" id="contact" class="max-w-64 w-full">
                <input name="phone" type="tel" class="border border-[#cfd1d4] focus:border-[#cfd1d4] h-12 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-base bg-[#262626] font-normal pr-6 pl-3 text-white" placeholder="شماره همراه" value="09" />
            </form>
            <button type="submit" form="contact" class="flex_center max-w-64 w-full h-11 text-[#FFD598] border border-[#FFD600] bg-transparent rounded-b-custom rounded-tl-custom rounded-tr-2xl"> ارسال </button>
        </section>
        {{-- scroll to top --}}
        <button class="absolute left-10 lg:left-20 -bottom-[38px] group" id="scrollToTopBtn" type="button">
            <svg width="137" height="73" viewBox="0 0 137 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1582_11510)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M34.3027 18C28.0512 26.5136 22.1433 35 6.50606 35C-2.09008 35 -4.09526 34.9173 0.147813 39C1.16265 39 4.27377 39 8.81036 39C23.8146 39 29.632 31.5017 35.6305 23.0527C41.9534 14.1467 48.4473 5 66.0204 5C83.8023 5 91.2954 14.3652 98.5 23.3699C105.17 31.7065 111.455 39 125.565 39C132.097 39 137.292 39 138.822 39C143.954 34.5737 139.824 35.1 128.479 35.1C113.772 35.1 106.96 26.9111 100.008 18.5105C92.4996 9.43701 84.6902 0 66.1583 0C47.8436 0 40.8924 9.02584 34.3027 18Z" fill="#FFD600"/>
                    <path d="M10 39C40.6116 39 31.9871 4 66 4C100.013 4 97.3465 39 126.5 39C143.211 38.4926 131.999 47 131.999 47C131.999 47 83.6105 74 67.1342 74C49.6089 74 -18.4148 42.94 -3.00349 39C-2.10985 38.9986 8.07777 39 10 39Z" fill="#1C1C1C"/>
                </g>
                <defs>
                    <clipPath id="clip0_1582_11510">
                        <rect width="137" height="73" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            {{-- icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-stone-700 top-1/2 left-1/2 -translate-x-3.5 -translate-y-1/2 absolute group-hover:stroke-normal">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
            </svg>
        </button>
    </section>
</section>