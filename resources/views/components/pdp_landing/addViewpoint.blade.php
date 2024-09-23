@props([
    'land' => null,
    'product' => null,
    'tabStyle' => '',
    'marginbottom' => '',
])

<section class="default_container {{ $marginbottom }}">
    <p
        class="relative text-xl mb-7 font-medium text-stone-700 {{ $tabStyle }}">
        ثبت دیدگاه </p>
    <div
        class="md:w-[40rem] lg:w-[49rem] xl:w-[56rem] md:mx-auto md:pt-10 md:border md:border-[#E2E8F0] md:rounded-custom md:py-12 md:px-24 lg:px-36 xl:px-52">
        <p class="text-sm md:text-base font-normal text-stone-700 mb-4"> با وارد کردن مشخصات خوددیدگاهتان را ثبت
            کنید. </p>
        {{-- form --}}
        <x-splade-form :default="['product_id' => $product->id, 'land_id' => $land->id]"
            action="{{ route('landing.product.comment', ['page' => $land->id, 'product' => $product->id]) }}">
            <x-layout.panel.form.alerts />
            <section class="rounded-custom md:rounded-none pt-6 pb-8 md:py-0 flex flex-col items-center">
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-10 md:gap-y-4 gap-2 w-56 mb-6 md:w-full md:mb-9">
                    <input v-model="form.name" type="text" required
                        class="col-span-full border border-[#E2E8F0] focus:border-[#E2E8F0] h-12 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-stone-700 dir-rtl"
                        placeholder="نام و نام خانوادگی (اجباری)" />
                    <input v-model="form.phone" type="tel"
                        class="border border-[#E2E8F0] focus:border-[#E2E8F0] h-12 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-stone-700 dir-rtl"
                        placeholder="شماره همراه" />
                    <input v-model="form.email" type="email"
                        class="border border-[#E2E8F0] focus:border-[#E2E8F0] h-12 focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-stone-700 dir-rtl"
                        placeholder="ایمیل" />
                    <textarea v-model="form.comment" required rows="5"
                        class="col-span-full border border-[#E2E8F0] focus:border-[#E2E8F0] h-full resize-none peer focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#888b93] text-sm font-normal pr-3 pl-6 text-stone-700"
                        placeholder="دیدگاه (اجباری)"></textarea>
                </div>
                <button type="submit"
                    class="rounded-custom flex_center w-64 h-11 text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                    ارسال </button>
            </section>
        </x-splade-form>
    </div>
</section>
