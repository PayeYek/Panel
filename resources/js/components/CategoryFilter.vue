
<template>
    <section class="default_container mb-8 lg:flex lg:items-center lg:gap-4">
        <p class="mb-4 lg:mb-0 text-base font-bold text-gray-900 text-center"> محصولات </p>
        <div class="h-10 w-full max-w-96 mx-auto lg:w-36 lg:mx-0 before:absolute before:content-[''] before:w-2 before:h-2 before:border-r-2 before:border-b-2 before:border-normal before:top-1/2 before:left-4 before:-translate-y-1/2 before:rotate-45 relative">
            <select id="selectFilter" :class="'w-full h-full border focus:ring-0 outline-none !bg-none text-normal border-normal focus:border-focus ' + radius" v-model="filterState">
                <option value="0"> همه محصولات </option>
                <option value="1"> کامیون </option>
                <option value="2"> کشنده </option>
                <option value="4"> کامیونت </option>
                <option value="5"> ون </option>
            </select>
        </div>
    </section>

    <section class="mb-4 lg:mb-16 relative z-[1] default_container">
        <div :class="'grid grid-cols-1 ' + classType">
            <template v-if="productType == 1">
                <!-- {{ $evenOdd == 'true' ? 'evenOdd_cards' : 'bg-white' }} {{ $radiusSize }} {{ $borderStyle }} -->
                <div v-for="(product, index) in filteredList" :key="index" :class="'pt-2 px-8 w-full pb-5 items-center flex flex-col ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ') + radius">
                    <div class="mb-2 h-36">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                    <div class="flex flex-col gap-4">
                        <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'text-sm lg:text-base font-bold cursor-pointer w-40 h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'text-sm lg:text-base font-bold cursor-pointer w-40 h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'text-sm lg:text-base font-bold cursor-pointer w-40 h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                    </div>
                </div>
            </template>

            <template v-if="productType == 2">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="'px-8 w-full pt-1 pb-8 items-center flex flex-col ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ') + radius">
                    <div class="h-32 mb-0.5">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                    <div class="grid w-56 grid-cols-2 lg:w-full gap-2">
                        <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full col-span-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                    </div>
                </div>
            </template>

            <template v-if="productType == 3">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="'px-8 w-full pt-1 pb-8 items-center flex flex-col ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ') + radius">
                    <div class="h-32 mb-0.5">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                    <div class="grid w-56 grid-cols-2 lg:w-full xl:w-56 gap-2">
                        <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full col-span-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                    </div>
                </div>
            </template>

            <template v-if="productType == 4">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="'pl-6 pr-8 w-full pt-5 pb-8 flex flex-col ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ') + radius">
                    <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex-none h-32 lg:h-28 xl:h-32">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <div class="flex flex-col w-40 gap-2 shrink">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        </div>
                    </div>
                </div>
            </template>

            <template v-if="productType == 5">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="'px-6 gap-2 w-full pt-6 pb-10 flex items-center ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ') + radius">
                    <div class="flex-none h-28 sm:h-32">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <div class="flex flex-col flex-1 gap-4">
                        <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                        <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full col-span-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        </div>
                    </div>
                </div>
            </template>

            <template v-if="productType == 6">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="'px-6 gap-2 w-full pt-6 pb-10 flex items-center ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ') + radius">
                    <div class="flex-none h-28 sm:h-32">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <div class="flex flex-col flex-1 gap-4">
                        <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                        <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full col-span-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        </div>
                    </div>
                </div>
            </template>

            <template v-if="productType == 7">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 relative ` + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                    <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <div class="mb-4 sm:mb-0 sm:flex-1">
                        <h3 class="mb-2 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                        <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                            {{ product.description }}
                        </p>
                    </div>
                    <div class="flex flex-col items-center gap-2 w-40 mx-auto sm:mx-0">
                        <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                    </div>
                </div>
            </template>

            <template v-if="productType == 8">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 sm:pr-10 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 sm:after:hidden relative before:bg-normal before:absolute before:content-[''] before:top-0 before:right-0 before:w-4 before:hidden sm:before:block before:h-full overflow-hidden ` + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ') + ' ' + smRadius">
                    <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <div class="mb-4 sm:mb-0 sm:flex-1">
                        <h3 class="mb-2 sm:gap-4 font-bold lg:mb-1 text-lg text-gray-900"> {{ product.name }} </h3>
                        <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                            {{ product.description }}
                        </p>
                    </div>
                    <div class="flex flex-col items-center gap-2 w-40 mx-auto sm:mx-0">
                        <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                    </div>
                </div>
            </template>

            <template v-if="productType == 9">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="'px-8 lg:px-5 xl:px-8 py-5 sm:pb-12 w-full items-center flex flex-col sm:border-l sm:border-l-dark-100 sm:[&:nth-child(2n+2)]:border-l-0 lg:[&:nth-child(2n+2)]:border-l lg:[&:nth-child(4n+4)]:border-l-0 border-t border-t-dark-100 first:border-t-0 sm:first:rounded-none sm:last:rounded-none sm:[&:nth-of-type(-n+2)]:border-t-0 lg:[&:nth-of-type(-n+2)]:border-t lg:[&:nth-of-type(-n+4)]:border-t-0 ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                    <div class="h-32 mb-2">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                    <div class="flex flex-col gap-4 w-40 mx-auto sm:mx-0">
                        <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                    </div>
                </div>
            </template>

            <template v-if="productType == 10">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="'border-b last:border-b-0 border-dark-100 pl-6 pr-8 w-full pt-5 pb-8 sm:border-l sm:[&:nth-child(2n)]:border-l-0 lg:[&:nth-child(2n)]:border-l lg:[&:nth-child(3n)]:border-l-0 flex flex-col ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                    <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex-none h-32 lg:h-28 xl:h-32">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <div class="flex flex-col w-40 gap-2 shrink">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        </div>
                    </div>
                </div>
            </template>

            <template v-if="productType == 11">
                <div v-for="(product, index) in filteredList" :key="index"
                    :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-0 after:w-full after:h-px after:border-t first:after:hidden after:border-dark-100 relative ` + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                    <div class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                        <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                    </div>
                    <div class="mb-4 sm:mb-0 sm:flex-1">
                        <h3 class="mb-2 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                        <p class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                            {{ product.description }}
                        </p>
                    </div>
                    <div class="flex flex-col items-center gap-2 w-40 mx-auto sm:mx-0">
                        <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'w-full text-sm lg:text-base font-bold cursor-pointer h-11 flex_center text-white bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                    </div>
                </div>
            </template>
        </div>
    </section>
</template>

<script>
import { ref, watch } from 'vue';

export default {
    name: 'CategoryFilter',
    props: {
        radius: {
            type: String,
            default: 'rounded-md',
        },
        beforeRadius: {
            type: String,
            default: 'before:rounded-md',
        },
        smRadius: {
            type: String,
            default: 'sm:rounded-md',
        },
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
    },
    setup(props){
        // console.log(props.landSlug);
        const productList = ref(JSON.parse(props.list));
        const productListCloned = ref([...JSON.parse(props.list)]);
        const filteredList = ref([...JSON.parse(props.list)]);
        const filterState = ref(0);

        watch(filterState, (newVal, oldVal) => {
            // console.log(newVal);
            if(newVal == 0){
                filteredList.value = productList.value
            } else {
                filteredList.value = productListCloned.value.filter(categoryId => categoryId.category_id == newVal)
            }
        })

        return {
            filterState,
            filteredList,
        }
    }
}
</script>