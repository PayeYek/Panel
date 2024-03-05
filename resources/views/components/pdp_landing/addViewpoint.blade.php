@props([
    'radius' => '8',
    'colorPalette' => '1',
    'land'=>null,
    'product'=>null,
])
@php
    $radiusSize = match($radius) {
        '0' => 'rounded-none',
        '2' => 'rounded-sm',
        '4' => 'rounded',
        '6' => 'rounded-md',
        '8' => 'rounded-lg',
        '12' => 'rounded-xl',
        '16' => 'rounded-2xl',
        default => 'rounded-md'
    };

    $fillBtnTheme = '';
    switch ($colorPalette) {
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

<section class="default_container relative z-[1]">
    <div class="md:bg-white md:drop-shadow-base {{ $radiusSize }}">
        <div class="md:w-[492px] md:mx-auto md:pt-10 bg-white">
            <p class="text-lg font-bold text-gray-900 mb-1.5 md:mb-5"> ثبت دیدگاه </p>
            <p class="text-sm font-normal text-gray-900 mb-8 md:mb-4"> با وارد کردن مشخصات خوددیدگاهتان را ثبت
                کنید. </p>
            {{-- form --}}
            <x-splade-form
                :default="['product_id' => $product->id, 'land_id' => $land->id]"
                action="{{ route('landing.product.comment', ['page'=> $land->id, 'product'=>$product->id]) }}">
                <x-layout.panel.form.alerts/>
                <section class="drop-shadow-base md:drop-shadow-none bg-white {{ $radiusSize }} md:rounded-none md:bg-transparent pt-6 pb-8 md:pb-11 flex flex-col items-center">
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10 md:gap-y-4 gap-2 w-56 mb-6 md:w-full md:mb-9">
                        <input v-model="form.name" type="text" required
                               class="col-span-full shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl"
                               placeholder="نام و نام خانوادگی (اجباری)"/>
                        <input v-model="form.phone" type="tel"
                               class="shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl"
                               placeholder="شماره همراه"/>
                        <input v-model="form.email" type="email"
                               class="shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl"
                               placeholder="ایمیل"/>
                        <textarea v-model="form.comment" required rows="5"
                                  class="col-span-full shadow-glass shadow-black/30 h-full resize-none peer border-0 focus:ring-0 {{ $radiusSize }} outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900"
                                  placeholder="دیدگاه (اجباری)"></textarea>
                    </div>
                    <button type="submit" class="{{ $radiusSize }} flex_center w-64 h-11 {{ $fillBtnTheme }}"> ارسال </button>
                </section>
            </x-splade-form>
        </div>
    </div>
</section>
