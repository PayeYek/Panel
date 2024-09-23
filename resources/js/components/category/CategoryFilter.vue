<template>
    
    <section v-if="filterType == 0" class="default_container mb-12 flex items-center gap-4">
        <p class="text-lg font-normal text-stone-700 text-center"> محصولات </p>
        <div
            class="h-11 w-40 before:absolute before:content-[''] before:w-2 before:h-2 before:border-r-2 before:border-b-2 before:border-stone-700 before:top-1/2 before:left-4 before:-translate-y-1/2 before:rotate-45 relative">
            <select id="selectFilter"
                class="w-full h-full border focus:ring-0 outline-none !bg-none text-stone-700 border-stone-700 focus:border-stone-700 rounded-custom"
                v-model="filterState">
                <option value="0"> همه محصولات </option>
                <option value="1"> کامیون </option>
                <option value="2"> کشنده </option>
                <option value="4"> کامیونت </option>
                <option value="5"> ون </option>
            </select>
        </div>
    </section>

    <section v-if="filterType == 1" class="default_container mb-8">
        <ul class="text-base font-medium text-stone-700 flex items-center gap-2">
            <li @click="changeFilter(0)" :class="filterState == 0 ? 'text-white bg-normal border-normal ' : ''" class="h-10 px-3 flex items-center cursor-pointer rounded-custom border border-stone-400"> همه </li>
            <template v-for="(category, index) in categories" :key="index">
                <li @click="changeFilter(category.id)" :class="filterState == category.id ? 'text-white bg-normal border-normal ' : ''" class="h-10 px-3 flex items-center cursor-pointer rounded-custom border border-stone-400"> {{ category.title }} </li>
            </template>
        </ul>
    </section>

    <section class="mb-4 lg:mb-16 relative z-[1] default_container">
        <div :class="'grid grid-cols-1 ' + classType">
            <template v-if="productType != 10">
                <template v-for="(product, index) in filteredList">

                    <div v-if="productType == 1" :key="index"
                        :class="'w-60 py-5 first:pt-0 last:pb-0 items-center flex flex-col border-b border-b-stone-400 last:border-b-0 sm:border-b-0 sm:first:pt-5 sm:last:pb-5 sm:px-4 sm:w-full mx-auto sm:mx-0 relative before:absolute before:left-0 before:inset-y-10 before:hidden before:w-px before:bg-stone-400 sm:before:block last:before:bg-transparent sm:before:[&:nth-child(2n)]:bg-transparent lg:before:[&:nth-child(2n)]:bg-stone-400 lg:before:[&:nth-child(4n)]:bg-transparent after:absolute after:content-[' + '] after:top-0 after:inset-x-6 after:h-px after:bg-stone-400 after:hidden sm:after:[&:nth-of-type(n+3)]:block lg:after:[&:nth-of-type(n+3)]:hidden lg:after:[&:nth-of-type(n+5)]:block ' + borderStyle + (evenOdd == 1 ? ' evenOdd_cards' : ' bg-white')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-2 h-48">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-5 font-medium text-base sm:text-lg lg:text-xl sm:line-clamp-1 text-stone-700"> {{ product.name }} </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="text-center text-sm font-normal leading-7 mb-3 h-14 line-clamp-2"> {{ product.description }} </Link>
                        <div class="grid grid-cols-5 gap-2 w-56 lg:w-52">
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle text-white bg-normal hover:bg-focus col-span-5 rounded-b-custom rounded-tl-custom rounded-tr-2xl" />
                            <LandBtn text="مشخصات فنی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle border text-normal border-normal hover:border-focus col-span-3 rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle border text-normal border-normal hover:border-focus col-span-2 rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 2" :key="index"
                        :class="'px-8 w-full pt-1 pb-8 items-center flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="h-32 mb-0.5">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-0.5 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </Link>
                        <div class="grid w-56 grid-cols-2 lg:w-full gap-2">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="col-span-full sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 3" :key="index"
                        :class="'pl-6 pr-8 w-full pt-5 pb-8 flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-1.5 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </Link>
                        <div class="flex items-center justify-between gap-4">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="flex-none h-32 lg:h-28 xl:h-32">
                                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                            </Link>
                            <div class="flex flex-col w-40 gap-2 shrink">
                                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                            </div>
                        </div>
                    </div>

                    <div v-if="productType == 4" :key="index"
                        :class="'px-6 gap-2 w-full pt-6 pb-10 flex items-center rounded-custom ' + borderStyle + ' ' + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="flex-none min-w-28 h-28 sm:min-w-32 sm:h-32">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <div class="flex flex-col flex-1 gap-4">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-1.5 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </Link>
                            <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="col-span-full sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                            </div>
                        </div>
                    </div>

                    <div v-if="productType == 5" :key="index"
                        :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 relative ` + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug"
                            class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <div class="mb-4 sm:mb-0 sm:flex-1">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-2 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </Link>
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug"
                                class="text-sm leading-6 text-justify text-[#818284] font-medium line-clamp-2">
                                {{ product.description }}
                            </Link>
                        </div>
                        <div class="flex flex-col items-center gap-2 w-56 mx-auto sm:mx-0">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 6" :key="index"
                        :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 sm:pr-10 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 sm:after:hidden relative before:bg-normal before:absolute before:content-[''] before:top-0 before:right-0 before:w-4 before:hidden sm:before:block before:h-full overflow-hidden sm:rounded-custom border-0 sm:border drop-shadow-none ` + borderStyle + ' ' + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug"
                            class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <div class="mb-4 sm:mb-0 sm:flex-1">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-2 sm:gap-4 font-medium lg:mb-1 text-lg text-stone-700"> {{ product.name }} </Link>
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug"
                                class="text-sm leading-6 text-justify text-[#818284] font-medium line-clamp-2">
                                {{ product.description }}
                            </Link>
                        </div>
                        <div class="flex flex-col items-center gap-2 w-56 mx-auto sm:mx-0">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 7" :key="index"
                        :class="'px-8 lg:px-5 xl:px-8 py-5 sm:pb-12 w-full items-center flex flex-col sm:first:rounded-none sm:last:rounded-none shadow-[0px_0px_0px_1px_#d2d2d2] ' + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="h-32 mb-2">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-5 font-medium lg:mb-4 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </Link>
                        <div class="flex flex-col gap-4 w-56 mx-auto sm:mx-0">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 8" :key="index"
                        :class="'border-b last:border-b-0 border-dark-100 pl-6 pr-8 w-full pt-5 pb-8 sm:border-l sm:[&:nth-child(2n)]:border-l-0 lg:[&:nth-child(2n)]:border-l lg:[&:nth-child(3n)]:border-l-0 flex flex-col ' + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-1.5 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </Link>
                        <div class="flex items-center justify-between gap-4">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="flex-none h-32 lg:h-28 xl:h-32">
                                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                            </Link>
                            <div class="flex flex-col w-40 gap-2 shrink">
                                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                            </div>
                        </div>
                    </div>

                    <div v-if="productType == 9" :key="index"
                        :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-0 after:w-full after:h-px after:border-t first:after:hidden after:border-dark-100 relative ` + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug"
                            class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <div class="mb-4 sm:mb-0 sm:flex-1">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-2 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </Link>
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug"
                                class="text-sm leading-6 text-justify text-[#818284] font-medium line-clamp-2">
                                {{ product.description }}
                            </Link>
                        </div>
                        <div class="flex flex-col items-center gap-2 w-56 mx-auto sm:mx-0">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 11" :key="index"
                        :class="'rounded-custom px-8 w-full pt-5 lg:pt-2 pb-8 items-center flex flex-col product_card ' + borderStyle + (evenOdd == 1 ? ' evenOdd_cards ' : ' bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="h-56 lg:h-48 lg:mb-1 aspect-square mb-3">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-3 font-medium text-lg line-clamp-1 text-stone-700 text-center lg:line-clamp-2 lg:mb-1 lg:h-14"> {{ product.name }} </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-3 font-medium text-base line-clamp-1 text-stone-700 text-center lg:text-base"> مدل: {{ product.model }} </Link>
                        <div class="flex flex-col w-56 lg:w-full xl:w-56 gap-3">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="w-full col-span-full h-11 flex_center rounded-custom before:rounded-custom text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal text-lg font-medium"> فروش اقساطی </Link>
                            <div class="flex items-center gap-2">
                                <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="w-full h-11 flex-1 flex_center rounded-custom before:rounded-custom text-normal border border-normal text-lg font-medium"> مشخصات </Link>
                                <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="size-11 flex-none flex_center rounded-custom before:rounded-custom border border-normal text-lg font-medium">
                                    <svg width="28" height="32" class="fill-normal" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1243_2960)">
                                            <path d="M26.7207 6.78571C27.0541 7.11905 27.3399 7.57143 27.5781 8.14286C27.8162 8.71429 27.9353 9.2381 27.9353 9.71429V30.2857C27.9353 30.7619 27.7686 31.1667 27.4352 31.5C27.1018 31.8333 26.6969 32 26.2206 32H2.21471C1.7384 32 1.33354 31.8333 1.00012 31.5C0.666708 31.1667 0.5 30.7619 0.5 30.2857V1.71429C0.5 1.2381 0.666708 0.833333 1.00012 0.5C1.33354 0.166667 1.7384 0 2.21471 0H18.2186C18.6949 0 19.2189 0.119048 19.7904 0.357143C20.362 0.595238 20.8145 0.880952 21.1479 1.21429L26.7207 6.78571ZM18.7902 2.42857V9.14286H25.5061C25.3871 8.79762 25.2561 8.55357 25.1132 8.41072L19.5225 2.82143C19.3796 2.67857 19.1355 2.54762 18.7902 2.42857ZM25.649 29.7143V11.4286H18.2186C17.7423 11.4286 17.3375 11.2619 17.004 10.9286C16.6706 10.5952 16.5039 10.1905 16.5039 9.71429V2.28571H2.78627V29.7143H25.649ZM16.4682 19.125C16.8612 19.4345 17.3613 19.7679 17.9686 20.125C18.6711 20.0417 19.3677 20 20.0584 20C21.8088 20 22.8626 20.2917 23.2199 20.875C23.4104 21.1369 23.4223 21.4464 23.2556 21.8036C23.2556 21.8155 23.2496 21.8274 23.2377 21.8393L23.202 21.875V21.8929C23.1305 22.3452 22.7078 22.5714 21.9338 22.5714C21.3623 22.5714 20.6776 22.4524 19.8797 22.2143C19.0819 21.9762 18.3079 21.6607 17.5578 21.2679C14.9262 21.5536 12.5922 22.0476 10.556 22.75C8.73416 25.869 7.29333 27.4286 6.23355 27.4286C6.05493 27.4286 5.88823 27.3869 5.73343 27.3036L5.30475 27.0893C5.29284 27.0774 5.25712 27.0476 5.19758 27C5.0785 26.881 5.04278 26.6667 5.09041 26.3571C5.19758 25.881 5.53099 25.3363 6.09066 24.7232C6.65032 24.1101 7.43622 23.5357 8.44838 23C8.61508 22.8929 8.75202 22.9286 8.85919 23.1071C8.88301 23.131 8.89491 23.1548 8.89491 23.1786C9.51411 22.1667 10.1512 20.994 10.8061 19.6607C11.6158 18.0417 12.235 16.4821 12.6637 14.9821C12.3779 14.006 12.1963 13.0565 12.1189 12.1339C12.0415 11.2113 12.0802 10.4524 12.235 9.85714C12.366 9.38095 12.6161 9.14286 12.9852 9.14286H13.3782C13.652 9.14286 13.8604 9.23214 14.0033 9.41072C14.2176 9.66072 14.2712 10.0655 14.1641 10.625C14.1402 10.6964 14.1164 10.744 14.0926 10.7679C14.1045 10.8036 14.1105 10.8512 14.1105 10.9107V11.4464C14.0867 12.9107 14.0033 14.0536 13.8604 14.875C14.5153 16.8274 15.3846 18.244 16.4682 19.125ZM6.17996 26.4643C6.79916 26.1786 7.61484 25.2381 8.62699 23.6429C8.0197 24.119 7.49874 24.619 7.06411 25.1429C6.62948 25.6667 6.33476 26.1071 6.17996 26.4643ZM13.2888 10.0357C13.1102 10.5357 13.0983 11.3214 13.2531 12.3929C13.265 12.3095 13.3067 12.0476 13.3782 11.6071C13.3782 11.5714 13.4198 11.3155 13.5032 10.8393C13.5151 10.7917 13.5389 10.744 13.5746 10.6964C13.5627 10.6845 13.5568 10.6726 13.5568 10.6607C13.5449 10.6369 13.5389 10.619 13.5389 10.6071C13.527 10.3452 13.4496 10.131 13.3067 9.96429C13.3067 9.97619 13.3008 9.9881 13.2888 10V10.0357ZM11.074 21.8393C12.6816 21.1964 14.3724 20.7143 16.1467 20.3929C16.1229 20.381 16.0455 20.3244 15.9145 20.2232C15.7835 20.122 15.6882 20.0417 15.6287 19.9821C14.7237 19.1845 13.9676 18.1369 13.3603 16.8393C13.0388 17.8631 12.5446 19.0357 11.8778 20.3571C11.5206 21.0238 11.2526 21.5179 11.074 21.8393ZM22.6126 21.5536C22.3268 21.2679 21.4932 21.125 20.1119 21.125C21.0169 21.4583 21.7552 21.625 22.3268 21.625C22.4935 21.625 22.6007 21.619 22.6483 21.6071C22.6483 21.5952 22.6364 21.5774 22.6126 21.5536Z" fill="current"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1243_2960">
                                                <rect width="27.4353" height="32" fill="white" transform="translate(0.5)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>

                    <div v-if="productType == 12" :key="index"
                        :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-10 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 rounded-custom after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 relative border-x-4 ` + (evenOdd == 1 ? 'evenOdd_cards ' : 'bg-white ') + borderStyle">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug"
                            class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-40 lg:w-48 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <div class="mb-4 sm:mb-0 sm:flex-1">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-4 font-medium sm:mb-1 lg:mb-6 text-lg sm:text-xl sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </Link>
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug"
                                class="text-sm leading-7 sm:mb-2 lg:mb-4 text-justify sm:text-base sm:font-normal text-stone-700 font-medium line-clamp-2 lg:line-clamp-1">
                                {{ product.description }}
                            </Link>
                            <p class="hidden sm:flex line-clamp-1 text-base font-normal text-stone-700"> مدل: {{ product.model }} </p>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-1 gap-4 sm:gap-2 w-60 sm:w-48 mx-auto sm:mx-0">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle text-base font-semibold categoryBtnEmpty border-x-4 rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty border-x-4 rounded-custom" />
                            <LandBtn text="شرایط فروش" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle text-normal bg-transparent border-y border-x-4 border-normal hover:border-focus rounded-custom col-span-full" />
                        </div>
                    </div>

                    <div v-if="productType == 13" :key="index"
                        :class="'rounded-custom pt-2 px-8 md:px-4 lg:px-8 w-full pb-5 items-center flex flex-col ' + borderStyle + (evenOdd == 1 ? ' evenOdd_cards' : ' bg-white')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-1 h-48">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-3 font-medium lg:mb-2 text-lg lg:text-base sm:line-clamp-1 text-stone-700"> {{ product.name }} </Link>
                        <div class="grid grid-cols-2 gap-2 w-56 md:w-full">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle bg-transparent border border-normal hover:boder-focus text-normal hover:text-normal rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle bg-transparent border border-normal hover:boder-focus text-normal hover:text-normal rounded-custom" />
                            <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle text-white bg-normal hover:bg-focus rounded-custom col-span-2" />
                        </div>
                    </div>

                    <div v-if="productType == 14" :key="index"
                        :class="'pt-2 px-8 w-72 sm:w-full pb-5 lg:pt-3 items-center flex flex-col rounded-custom mx-auto lg:mx-0 ' + borderStyle + ' ' + (evenOdd == 1 ? 'evenOdd_cards' : 'bg-white')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-2 h-44 aspect-square">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-2 font-medium text-right text-lg sm:h-14 line-clamp-2 lg:line-clamp-1 text-stone-700 lg:h-[28px]"> {{ product.name }} </Link>
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-4 font-normal text-sm line-clamp-2 text-stone-700 text-justify leading-6 lg:h-12"> {{ product.description }} </Link>
                        <div class="grid grid-cols-2 gap-2 w-56 lg:w-full">
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom col-span-2" />
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 15" :key="index"
                        :class="'px-6 gap-2 lg:gap-5 w-full pt-6 pb-10 flex flex-col lg:flex-row lg:items-center rounded-custom ' + borderStyle + (evenOdd == 1 ? ' evenOdd_cards ' : ' bg-white ')">
                        <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="aspect-square md:flex-none lg:w-40">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </Link>
                        <div class="flex flex-col flex-1 gap-4">
                            <Link :href="'/l/' + landSlug + '/p/' + product.slug" class="mb-1.5 font-medium lg:mb-1 text-lg text-center lg:text-right sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </Link>
                            <div class="grid w-full grid-cols-2 gap-2 mx-auto lg:mx-0 max-w-72">
                                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle bg-white border text-normal border-normal hover:border-focus rounded-custom" />
                                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle bg-white border text-normal border-normal hover:border-focus rounded-custom" />
                                <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="col-span-full sameCategoryBtnStyle text-white bg-normal hover:bg-focus rounded-custom" />
                            </div>
                        </div>
                    </div>
                    
                </template>
            </template>

            <template v-if="productType == 10">
                <template v-for="(product, index) in filteredList" :key="index">
                    <section class="flex flex-col" v-if="product.length > 0">
                        <p class="text-base lg:text-xl font-medium mb-4 text-stone-700 text-center"> محصولات {{ product[0].brand.title }} </p>
                        <hr class="w-56 lg:w-96 border-normal mb-4 lg:mb-6 mx-auto" />
                        <ul class="flex flex-col lg:flex-row mx-auto lg:mx-0 lg:items-start lg:justify-center lg:flex-wrap gap-1">
                            <li v-for="(item, index) in product" :key="index"
                                :class="'pt-2 px-8 w-72 sm:w-96 lg:w-full lg:max-w-[17rem] pb-5 lg:pt-3 items-center flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards' : 'bg-white')">
                                <Link :href="'/l/' + landSlug + '/p/' + item.slug" class="mb-2 h-52">
                                    <img :src="item.image" :alt="item.name" class="object-contain h-full" />
                                </Link>
                                <Link :href="'/l/' + landSlug + '/p/' + item.slug" class="mb-5 font-medium text-xl line-clamp-2 lg:line-clamp-1 text-stone-700 lg:h-[28px]"> {{ item.name }} </Link>
                                <Link :href="'/l/' + landSlug + '/p/' + item.slug" class="mb-6 font-normal text-sm line-clamp-1 text-stone-700 h-5"> مدل: {{ item.model }} </Link>
                                <div class="grid grid-cols-2 gap-3 w-56 lg:w-full">
                                    <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + item.slug"
                                        classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom col-span-2" />
                                    <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + item.slug"
                                        classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                    <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + item.slug"
                                        classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                </div>
                            </li>
                        </ul>
                    </section>
                </template>
            </template>
        </div>
    </section>
</template>

<script>
import { ref, watch, onMounted } from 'vue';

export default {
    name: 'CategoryFilter',
    props: {
        classType: {
            type: String,
            default: 1,
        },
        landSlug: {
            type: String,
            default: null,
        },
        borderStyle: {
            type: String,
            default: null,
        },
        productType: {
            type: Number,
            default: 1,
        },
        list: {
            type: Array,
            default: null,
        },
        evenOdd: {
            type: Boolean,
            default: false,
        },
        filterType: {
            type: [Number, String],
            default: 1,
        },
    },
    setup(props) {
        const productList = ref(JSON.parse(props.list)); // List of products
        const filterState = ref(0); // Current filter state
        const categories = ref([]); // List of categories
        const brandCategories = ref([]); // List of brand categories
        const removeDuplicated = ref([]); // List of unique brand categories
        const filteredList = ref([]); // Filtered list of products
        const allProductsList = ref([]); // List of all products
        const queryParam = ref('0'); // Query parameter
        const firstTime = ref(false); // Flag to track if it's the first time setting filter

        // Function to remove duplicates from an array
        function remove_duplicates_es6(arr) {
            let s = new Set(arr);
            let it = s.values();
            return Array.from(it);
        }

        // Promise to get all brand categories
        let getAllBrands = new Promise(function (resolve, reject) {
            productList.value.map(brand => {
                return brand.products.map(item => {
                    const brandId = item.brand_id
                    brandCategories.value.push(brandId);
                })
            })
            removeDuplicated.value = remove_duplicates_es6(brandCategories.value)
            
            resolve();
        })

        // Promise to get all categories
        let getAllCategories = new Promise(function (resolve, reject) {
            productList.value.map(product => {
                product.products.map(item => {
                    allProductsList.value.push(item)
                })
            })
            resolve();
        })

        // Get filter parameters on component mount
        onMounted(() => {
            const urlParams = new URLSearchParams(window.location.search);
            queryParam.value = urlParams.get('category') != null ? urlParams.get('category') : '0';
            
            changeFilter(queryParam.value);

            categories.value = productList.value.map(category => {
                return category.category
            })
        })

        

        // Function to change filter state
        const changeFilter = (filter) => {
            if(firstTime.value)
            {
                window.history.replaceState( {}, "",`?category=${filter}`);
            }
            filterState.value = filter;
            firstTime.value = true;
        }
        


        // Watch for changes in product type
        watch(() => props.productType, (newType) => {
            if (newType == 10) {
                filteredList.value = [];
                getAllBrands.then(() => {
                    for (let index = 0; index < removeDuplicated.value.length; index++) {
                        filteredList.value.push([]);
                        const element = removeDuplicated.value[index];
                        productList.value.filter(product => {
                            product.products.map(item => {
                                if (item.brand_id == element) {
                                    filteredList.value[index].push(item);
                                }
                            })
                        })
                    }
                })
            } else {
                getAllCategories.then(() => {
                    if (filterState.value == 0) {
                        filteredList.value = allProductsList.value;
                    } else {
                        filteredList.value = allProductsList.value.filter(item => item.category_id == filterState.value)
                    }

                })
            }
        }, { immediate: true });

        // Watch for changes in filter state
        watch(() => filterState.value, (newVal) => {
            if (props.productType != 10) {
                if (newVal == 0) {
                    filteredList.value = allProductsList.value;
                } else {
                    filteredList.value = allProductsList.value.filter(item => item.category_id == newVal)
                }
            } else {
                if (newVal == 0) {
                    getAllBrands.then(() => {
                        filteredList.value = [];
                        for (let index = 0; index < removeDuplicated.value.length; index++) {
                            filteredList.value.push([]);
                            const element = removeDuplicated.value[index];
                            productList.value.filter(product => {
                                product.products.map(item => {
                                    if (item.brand_id == element) {
                                        filteredList.value[index].push(item);
                                    }
                                })
                            })
                        }
                    })
                } else {
                    getAllBrands.then(() => {
                        filteredList.value = [];
                        console.log(filteredList.value);
                        for (let index = 0; index < removeDuplicated.value.length; index++) {
                            filteredList.value.push([]);
                            const element = removeDuplicated.value[index];
                            productList.value.filter(product => {
                                product.products.map(item => {
                                    if (item.brand_id == element && item.category_id == filterState.value) {
                                        console.log(item);
                                        filteredList.value[index].push(item);
                                    }
                                })
                            })
                        }
                    })
                }
            }
        });

        // console.log(filteredList.value);


        return {
            filterState,
            filteredList,
            changeFilter,
            categories,
        }
    }
}
</script>