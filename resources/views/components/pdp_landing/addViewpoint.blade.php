@props([
    'land'=>null,
    'product'=>null,
])

<section class="default_container relative z-[1]">
    <div class="md:bg-white md:drop-shadow-base rounded-custom">
        <div class="md:w-[492px] md:mx-auto md:pt-10 bg-white">
            <p class="text-lg font-bold text-gray-900 mb-1.5 md:mb-5"> ثبت دیدگاه </p>
            <p class="text-sm font-normal text-gray-900 mb-8 md:mb-4"> با وارد کردن مشخصات خوددیدگاهتان را ثبت
                کنید. </p>
            {{-- form --}}
            <x-splade-form
                :default="['product_id' => $product->id, 'land_id' => $land->id]"
                action="{{ route('landing.product.comment', ['page'=> $land->id, 'product'=>$product->id]) }}">
                <x-layout.panel.form.alerts/>
                <section class="drop-shadow-base md:drop-shadow-none bg-white rounded-custom md:rounded-none md:bg-transparent pt-6 pb-8 md:pb-11 flex flex-col items-center">
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10 md:gap-y-4 gap-2 w-56 mb-6 md:w-full md:mb-9">
                        <input v-model="form.name" type="text" required
                               class="col-span-full shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl"
                               placeholder="نام و نام خانوادگی (اجباری)"/>
                        <input v-model="form.phone" type="tel"
                               class="shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl"
                               placeholder="شماره همراه"/>
                        <input v-model="form.email" type="email"
                               class="shadow-glass shadow-black/30 h-12 border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900 dir-rtl"
                               placeholder="ایمیل"/>
                        <textarea v-model="form.comment" required rows="5"
                                  class="col-span-full shadow-glass shadow-black/30 h-full resize-none peer border-0 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-gray-900"
                                  placeholder="دیدگاه (اجباری)"></textarea>
                    </div>
                    <button type="submit" class="rounded-custom flex_center w-64 h-11 text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal"> ارسال </button>
                </section>
            </x-splade-form>
        </div>
    </div>
</section>
