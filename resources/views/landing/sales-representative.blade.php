@php
    $radiusSize = match($land->styles->radius."") {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };

    $textStyle = match($land->styles->color."") {
        '1' => 'text-red-700',
        '2' => 'text-blue-700',
        '3' => 'text-rose-700',
        '4' => 'text-zinc-700',
        '5' => 'text-cobalt-700',
        default => null
    };

    $fillBtnTheme = '';
    switch ($land->styles->color."") {
        case '1':
            $fillBtnTheme = 'fill_btn_theme_warning_filled';
            break;
        case '2':
            $fillBtnTheme = 'fill_btn_theme_primary_filled';
            break;
        case '3':
            $fillBtnTheme = 'fill_btn_theme_rose_filled';
            break;
        case '4':
            $fillBtnTheme = 'fill_btn_theme_zinc_filled';
            break;
        case '5':
            $fillBtnTheme = 'fill_btn_theme_cobalt_filled';
            break;
    };
@endphp

<x-layout.default.main :land="$land">
    <main class="pt-4 relative">
        {{-- titles --}}
        <section class="default_container">
            <p class="text-[10px] md:text-sm md:font-bold font-normal mb-6 text-gray-900"> نمایندگی فروش </p>
            <h1 class="text-center px-8 text-2xl md:text-[32px] font-normal mb-5 md:mb-8 {{ $textStyle }}"> نمایندگی 2111 آرین دیزل </h1>
            <h3 class="text-xl font-normal mb-6 text-gray-900 md:text-2xl"> آرین دیزل </h3>
            <p class="text-justify text-sm md:text-base md:mb-10 lg:mb-14 font-normal leading-6 md:leading-7 mb-5">
                شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
            </p>
            {{-- branches --}}
            <section class="grid grid-cols-1 {{ $textStyle }} md:grid-cols-2 gap-6 mb-4">
                <div class="drop-shadow-base flex flex-col px-16 md:px-12 pt-4 pb-12 bg-white {{ $radiusSize }}">
                    <p class="text-center text-base font-bold mb-12"> شعبه مرکزی </p>
                    {{-- address --}}
                    <div class="flex items-start gap-3.5 mb-4">
                        {{-- icon --}}
                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0013 21.6004C12.0013 21.6004 19.5144 14.9221 19.5144 9.91343C19.5144 5.76409 16.1507 2.40039 12.0013 2.40039C7.85199 2.40039 4.48828 5.76409 4.48828 9.91343C4.48828 14.9221 12.0013 21.6004 12.0013 21.6004Z" stroke="current" stroke-width="2"/>
                            <path d="M14.4016 9.60054C14.4016 10.926 13.3271 12.0005 12.0016 12.0005C10.6761 12.0005 9.60163 10.926 9.60163 9.60054C9.60163 8.27506 10.6761 7.20054 12.0016 7.20054C13.3271 7.20054 14.4016 8.27506 14.4016 9.60054Z" stroke="current" stroke-width="2"/>
                        </svg>
                        <p class="text-sm font-normal text-gray-900 leading-6"> تهران، اشرفی اصفهانی، برج نگین رضا، واحد 112 </p>
                    </div>
                    {{-- phone --}}
                    <div class="flex items-start gap-3.5 mb-4">
                        {{-- icon --}}
                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.7715 3.33619C18.7715 3.33619 19.9095 4.49485 20.2432 4.77879C20.7367 5.24134 20.9698 5.78632 20.9698 6.50076C20.9698 6.56945 20.9698 6.64273 20.9653 6.71142C20.8784 8.07159 20.3483 9.33559 19.8958 10.2836C18.6435 12.8757 16.8657 15.1518 14.6125 17.0432C12.7341 18.6049 10.9974 19.6491 9.13265 20.3406C7.99464 20.7665 7.10799 20.9222 6.27162 20.8535C5.73689 20.8077 5.29357 20.6016 4.91423 20.2215L3.35574 18.6599C3.14551 18.4354 3.03125 18.1973 3.03125 17.9637C3.03125 17.6752 3.20492 17.4417 3.35117 17.2951C3.35574 17.2905 3.36031 17.2859 3.36489 17.2814C3.62539 17.002 3.89504 16.7364 4.18298 16.457C4.32923 16.315 4.47548 16.1685 4.6263 16.0219L5.874 14.7717C6.35846 14.2862 6.80635 14.2862 7.29081 14.7717C7.42335 14.9045 7.55589 15.0327 7.68386 15.1655C8.0769 15.5502 7.77532 15.248 8.13181 15.6465C8.14095 15.6556 8.14552 15.6648 8.15466 15.6694C8.54771 16.0632 8.93162 15.99 9.19213 15.9075C9.20584 15.9029 9.21955 15.8984 9.23326 15.8938C10.0194 15.5686 10.7598 15.1106 11.6418 14.4145L11.6464 14.41C13.2003 13.146 14.4115 11.8133 15.3392 10.3432C15.4581 10.1554 15.554 9.96307 15.6454 9.77988C15.7277 9.61501 15.8054 9.4593 15.8877 9.32649C15.8968 9.30817 15.9105 9.28985 15.9197 9.27153C15.9974 9.11582 16.0339 8.96927 16.0339 8.81814C16.0339 8.43803 15.7963 8.19988 15.7186 8.12203L14.8227 7.22435C14.6673 7.06864 14.48 6.82133 14.48 6.53281C14.48 6.24887 14.6582 6.01531 14.8136 5.87334C14.8182 5.86876 14.8182 5.86876 14.8227 5.86418L17.341 3.34076C17.8072 2.86906 18.7715 3.33619 18.7715 3.33619Z" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="tel:02144000990" class="text-sm font-normal text-gray-900 leading-6 dir-ltr"> 021 - 44000990 </a>
                    </div>
                </div>
                <div class="drop-shadow-base flex flex-col px-16 md:px-12 pt-4 pb-12 bg-white {{ $radiusSize }}">
                    <p class="text-center text-base font-bold mb-12"> شعبه اسلامشهر </p>
                    {{-- address --}}
                    <div class="flex items-start gap-3.5 mb-4">
                        {{-- icon --}}
                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0013 21.6004C12.0013 21.6004 19.5144 14.9221 19.5144 9.91343C19.5144 5.76409 16.1507 2.40039 12.0013 2.40039C7.85199 2.40039 4.48828 5.76409 4.48828 9.91343C4.48828 14.9221 12.0013 21.6004 12.0013 21.6004Z" stroke="current" stroke-width="2"/>
                            <path d="M14.4016 9.60054C14.4016 10.926 13.3271 12.0005 12.0016 12.0005C10.6761 12.0005 9.60163 10.926 9.60163 9.60054C9.60163 8.27506 10.6761 7.20054 12.0016 7.20054C13.3271 7.20054 14.4016 8.27506 14.4016 9.60054Z" stroke="current" stroke-width="2"/>
                        </svg>
                        <p class="text-sm font-normal text-gray-900 leading-6"> اسلامشهر، میدان نماز، خیابان عباس آباد، پلاک 8 </p>
                    </div>
                    {{-- phone --}}
                    <div class="flex items-start gap-3.5 mb-4">
                        {{-- icon --}}
                        <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.7715 3.33619C18.7715 3.33619 19.9095 4.49485 20.2432 4.77879C20.7367 5.24134 20.9698 5.78632 20.9698 6.50076C20.9698 6.56945 20.9698 6.64273 20.9653 6.71142C20.8784 8.07159 20.3483 9.33559 19.8958 10.2836C18.6435 12.8757 16.8657 15.1518 14.6125 17.0432C12.7341 18.6049 10.9974 19.6491 9.13265 20.3406C7.99464 20.7665 7.10799 20.9222 6.27162 20.8535C5.73689 20.8077 5.29357 20.6016 4.91423 20.2215L3.35574 18.6599C3.14551 18.4354 3.03125 18.1973 3.03125 17.9637C3.03125 17.6752 3.20492 17.4417 3.35117 17.2951C3.35574 17.2905 3.36031 17.2859 3.36489 17.2814C3.62539 17.002 3.89504 16.7364 4.18298 16.457C4.32923 16.315 4.47548 16.1685 4.6263 16.0219L5.874 14.7717C6.35846 14.2862 6.80635 14.2862 7.29081 14.7717C7.42335 14.9045 7.55589 15.0327 7.68386 15.1655C8.0769 15.5502 7.77532 15.248 8.13181 15.6465C8.14095 15.6556 8.14552 15.6648 8.15466 15.6694C8.54771 16.0632 8.93162 15.99 9.19213 15.9075C9.20584 15.9029 9.21955 15.8984 9.23326 15.8938C10.0194 15.5686 10.7598 15.1106 11.6418 14.4145L11.6464 14.41C13.2003 13.146 14.4115 11.8133 15.3392 10.3432C15.4581 10.1554 15.554 9.96307 15.6454 9.77988C15.7277 9.61501 15.8054 9.4593 15.8877 9.32649C15.8968 9.30817 15.9105 9.28985 15.9197 9.27153C15.9974 9.11582 16.0339 8.96927 16.0339 8.81814C16.0339 8.43803 15.7963 8.19988 15.7186 8.12203L14.8227 7.22435C14.6673 7.06864 14.48 6.82133 14.48 6.53281C14.48 6.24887 14.6582 6.01531 14.8136 5.87334C14.8182 5.86876 14.8182 5.86876 14.8227 5.86418L17.341 3.34076C17.8072 2.86906 18.7715 3.33619 18.7715 3.33619Z" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="tel:02144000990" class="text-sm font-normal text-gray-900 leading-6 dir-ltr"> 021 - 44000990 </a>
                    </div>
                </div>
            </section>

            {{-- send message --}}
            <section class="bg-white drop-shadow-base px-4 pb-8 pt-2 sm:pt-4 md:pt-8 sm:pb-10 md:pb-12 {{ $radiusSize }}">
                <div class="md:w-[492px] md:mx-auto">
                    <p class="text-base font-bold mb-4 {{ $textStyle }} text-center md:text-right md:mb-6"> ارسال پیام </p>
                    <p class="text-sm md:text-base font-normal text-gray-900 mb-12 md:mb-4 text-center md:text-right"> در صورت نیاز به مشاوره و خدمت با ما همراه باشید. </p>
                    {{-- form --}}
                    <section class="flex flex-col items-center">
                        <form action="#" id="addComment" class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10 md:gap-y-4 gap-2 w-56 mb-6 md:mb-20 md:w-full">
                            <input name="fullName" type="text" class="shadow-glass {{ $radiusSize }} shadow-black/30 h-12 border-0 focus:ring-0 outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900" placeholder="نام" />
                            <select name="subject" class="shadow-glass {{ $radiusSize }} invalid:text-[#888b93] shadow-black/30 h-12 border-0 focus:ring-0 outline-none w-full text-sm font-normal valid:text-gray-900">
                                <option value="1"> موضوع 1 </option>
                                <option value="2"> موضوع 2 </option>
                            </select>
                            <input name="phone" type="tel" class="shadow-glass {{ $radiusSize }} shadow-black/30 h-12 border-0 focus:ring-0 outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl" placeholder="شماره همراه (اختیاری)" />
                            <label for="email" class="h-12 w-full relative">
                                <input id="email" required name="email" type="text" class="peer {{ $radiusSize }} h-full shadow-glass shadow-black/30 border-0 focus:ring-0 outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900" placeholder="ایمیل" />
                                <i class="absolute top-2 right-12 text-red-700 peer-valid:hidden">*</i>
                            </label>
                            <label for="comment" class="w-full relative h-40 md:h-32 md:col-span-2">
                                <textarea required name="comment" class="shadow-glass {{ $radiusSize }} shadow-black/30 h-full resize-none peer border-0 focus:ring-0 outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900" placeholder="دیدگاه"></textarea>
                                <i class="absolute top-1 right-[52px] text-red-700 peer-valid:hidden">*</i>
                            </label>
                        </form>
                        <button type="submit" form="addComment" class="flex_center w-64 h-11 {{ $fillBtnTheme }} {{ $radiusSize }}"> ارسال </button>
                    </section>
                </div>
            </section>
        </section>
    </main>
</x-layout.default.main>