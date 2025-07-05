<section class="bg-normal">
    <section class="default_container relative pt-10 pb-14 lg:pt-14 lg:pb-16">
            <p class="text-lg lg:text-2xl font-medium mb-4 text-center text-white md:mb-6"> ارتباط با کارشناسان فروش </p>
            <p class="text-sm lg:text-base font-normal text-white mb-8 lg:mb-12 text-center"> جهت ارتباط و اطلاع از شرایط فروش شماره خود را وارد کنید </p>
            {{-- form --}}
            <section class="flex flex-col gap-10 lg:gap-16 items-center">
                <form action="#" id="contact" class="max-w-64 w-full">
                    <input name="phone" type="tel" class="border border-[#cfd1d4] focus:border-[#E2E8F0] h-12 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-base bg-white/20 font-normal pr-6 pl-3 text-white" placeholder="شماره همراه" value="09" />
                </form>
                <button type="submit" form="contact" class="flex_center max-w-64 w-full h-11 text-normal bg-white hover:text-focus focus:text-focus rounded-custom"> ارسال </button>
            </section>
            {{-- scroll to top --}}
            <button class="absolute left-10 lg:left-20 -bottom-9 group" id="scrollToTopBtn" type="button">
                <svg width="137" height="70" viewBox="0 0 137 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.25632 35C38.7563 35 30.7563 0 65.7563 0C100.756 0 96.7563 35 126.756 35C163.756 35 85.0863 70 65.7563 70C46.4264 70 -22.2437 35 7.25632 35Z" fill="#1C1C1C"/>
                </svg>
                {{-- icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 stroke-white/75 top-6 left-1/2 -translate-x-3.5 -translate-y-1/2 absolute group-hover:stroke-normal">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                </svg>
            </button>
    </section>
</section>