@php
    $borderStyle = match($land->styles->border_type."") {
        '0'  => 'drop-shadow-base border-0',
        '1' => 'border-stone-700/20 focus:ring-0 focus:border-stone-700/20',
        default => 'drop-shadow-base',
    };
@endphp

<x-layout.default.main :land="$land">
    <main class="pt-4 relative mb-8 sm:mb-24 lg:mb-28">
        {{-- titles --}}
        <section class="default_container">
            <p class="text-[10px] md:text-sm md:font-medium font-normal mb-6 text-stone-700"> نمایندگی فروش </p>
            <h1 class="text-center px-8 text-2xl md:text-[32px] font-normal mb-5 md:mb-8 text-normal"> نمایندگی 2111 آرین دیزل </h1>
            <h3 class="text-xl font-normal mb-6 text-stone-700 md:text-2xl"> آرین دیزل </h3>
            <p class="text-justify text-sm md:text-base md:mb-10 lg:mb-14 font-normal leading-6 md:leading-7 mb-5">
                شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
            </p>

            {{-- chart --}}
            <AmChart borderStyle="{{ $borderStyle }}" />

            {{-- send message --}}
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
    </main>
</x-layout.default.main>