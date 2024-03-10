<x-layout.default.main :land="$land">

    <main class="pt-24">
        {{-- filter --}}
        <x-splade-data default="{ showSearch: false }">
            {{-- mobile filter --}}
            <section class="default_container max-w-96 mx-auto lg:hidden mb-6">
                <section class="flex items-center gap-4" v-if="!data.showSearch">
                    <select class="h-12 w-full text-base font-bold text-gray-900 border border-dark-100 focus:ring-0 focus:border-dark-100 outline-none rounded-custom">
                        <option value="0" selected disabled> دسته بندی </option>
                    </select>
                    <button type="button" class="w-12 h-12 cursor-pointer flex-none rounded-custom flex_center border border-dark-100" v-on:click="data.showSearch = true">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.9284 17.0396L20.4016 20.3996M19.2816 11.4396C19.2816 15.7695 15.7715 19.2796 11.4416 19.2796C7.11165 19.2796 3.60156 15.7695 3.60156 11.4396C3.60156 7.1097 7.11165 3.59961 11.4416 3.59961C15.7715 3.59961 19.2816 7.1097 19.2816 11.4396Z" stroke="#111827" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </section>
    
                <form action="#" class="w-full h-12 relative" v-else>
                    <input type="text" class="w-full h-full outline-none border border-dark-100 focus:ring-0 focus:border-dark-100 rounded-custom px-10 placeholder:text-[#888b93] text-sm font-normal text-gray-900" placeholder="جستجو مطلب" />
                    <button type="button" class="w-8 h-8 absolute left-2 top-2 cursor-pointer flex-none flex_center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.9284 17.0396L20.4016 20.3996M19.2816 11.4396C19.2816 15.7695 15.7715 19.2796 11.4416 19.2796C7.11165 19.2796 3.60156 15.7695 3.60156 11.4396C3.60156 7.1097 7.11165 3.59961 11.4416 3.59961C15.7715 3.59961 19.2816 7.1097 19.2816 11.4396Z" stroke="#111827" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                    {{-- close btn --}}
                    <button type="button" class="w-8 h-8 absolute right-2 top-2 cursor-pointer flex-none flex_center" v-on:click="data.showSearch = false">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
            </section>

            {{-- desktop filter --}}
            <section class="hidden lg:flex items-center justify-between default_container mb-5">
                {{-- categories --}}
                <div class="flex items-center gap-5 text-normal">
                    <a href="#" class="h-8 w-36 flex_center rounded-custom border border-dark-100 text-base font-bold"> اخبار </a>
                    <a href="#" class="h-8 w-36 flex_center rounded-custom border border-dark-100 text-base font-bold"> اطلاعیه </a>
                    <a href="#" class="h-8 w-36 flex_center rounded-custom border border-dark-100 text-base font-bold"> همه موارد </a>
                </div>

                <form action="#" class="w-[298px] h-12 relative">
                    <input type="text" class="w-full h-full outline-none border border-dark-100 focus:ring-0 focus:border-dark-100 rounded-custom pl-10 placeholder:text-[#888b93] text-sm font-normal text-gray-900" placeholder="جستجو مطلب" />
                    <button type="submit" class="w-8 h-8 absolute left-2 top-2 cursor-pointer flex-none flex_center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.9284 17.0396L20.4016 20.3996M19.2816 11.4396C19.2816 15.7695 15.7715 19.2796 11.4416 19.2796C7.11165 19.2796 3.60156 15.7695 3.60156 11.4396C3.60156 7.1097 7.11165 3.59961 11.4416 3.59961C15.7715 3.59961 19.2816 7.1097 19.2816 11.4396Z" stroke="#111827" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </form>
            </section>
        </x-splade-data>

        <x-home_landing.announcement :showSectionTitle=false :landSlug="$land->slug" :data="$land->articles" type="{{ $land->styles->article_type }}" />
    </main>

</x-layout.default.main>
