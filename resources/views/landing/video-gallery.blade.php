<x-layout.default.main :land="$land">

    <main class="pt-4 relative">
        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        <section class="flex flex-col gap-4 mb-8 default_container sm:flex-row-reverse sm:justify-between sm:items-center">
            <section class="relative w-full h-12 sm:w-72">
                <input type="text"
                    class="w-full h-full outline-none border-b border-x-0 border-t-0 border-b-dark-100 focus:ring-0 focus:border-b-dark-100 pl-10 pr-3 placeholder:text-[#888b93] text-sm font-normal text-stone-700"
                    placeholder="جستجو مطلب" v-model="searchFilterState" @keyup="filterArticleByName" />
                <div class="absolute flex-none w-8 h-8 left-2 top-2 flex_center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.9284 17.0396L20.4016 20.3996M19.2816 11.4396C19.2816 15.7695 15.7715 19.2796 11.4416 19.2796C7.11165 19.2796 3.60156 15.7695 3.60156 11.4396C3.60156 7.1097 7.11165 3.59961 11.4416 3.59961C15.7715 3.59961 19.2816 7.1097 19.2816 11.4396Z"
                            stroke="#111827" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
            </section>
    
            <!-- filters -->
            <ul
                class="flex items-center flex-wrap gap-x-2 gap-y-4 list-none text-base font-bold *:rounded-custom *:flex_center *:h-8 *:px-3 *:cursor-pointer *:border *:border-stone-700 *:text-stone-700">
                <li> جدید ترین </li>
                <li> قدیمی ترین </li>
                <li> پربیننده ترین </li>
            </ul>
        </section>

    </main>

</x-layout.default.main>