<section class="default_container">
    <section class="bg-white border border-[#E2E8F0] rounded-custom px-4 pb-8 pt-2 sm:pt-4 md:pt-8 sm:pb-10 md:pb-12">
        <div class="md:w-[492px] md:mx-auto">
            <p class="text-base font-medium mb-4 text-normal text-center md:text-right md:mb-6"> ارسال پیام </p>
            <p class="text-sm md:text-base font-normal text-stone-700 mb-12 md:mb-4 text-center md:text-right"> در صورت نیاز به مشاوره و خدمت با ما همراه باشید. </p>
            {{-- form --}}
            <section class="flex flex-col items-center">
                <form action="#" id="addComment" class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10 md:gap-y-4 gap-2 w-56 mb-6 md:mb-20 md:w-full">
                    <input name="fullName" type="text" class="col-span-full border border-[#E2E8F0] focus:border-[#E2E8F0] h-12 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-stone-700 dir-rtl" placeholder="نام و نام خانوادگی" />
                    <input name="phone" type="tel" class="border border-[#E2E8F0] focus:border-[#E2E8F0] h-12 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-stone-700 dir-rtl" placeholder="شماره همراه" />
                    <input id="email" required name="email" type="text" class="border border-[#E2E8F0] focus:border-[#E2E8F0] h-12 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-stone-700 dir-rtl" placeholder="ایمیل" />
                    <textarea required name="comment" class="col-span-full border border-[#E2E8F0] focus:border-[#E2E8F0] h-full resize-none peer focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-stone-700" placeholder="دیدگاه"></textarea>
                </form>
                <button type="submit" form="addComment" class="flex_center w-64 h-11 text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal rounded-custom"> ارسال </button>
            </section>
        </div>
    </section>
</section>