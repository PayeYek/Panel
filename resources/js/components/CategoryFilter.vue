<template>
    <section class="default_container mb-8 lg:flex lg:items-center lg:gap-4">
        <p class="mb-4 lg:mb-0 text-base font-bold text-stone-700 text-center"> محصولات </p>
        <div
            class="h-10 w-full max-w-96 mx-auto lg:w-36 lg:mx-0 before:absolute before:content-[''] before:w-2 before:h-2 before:border-r-2 before:border-b-2 before:border-normal before:top-1/2 before:left-4 before:-translate-y-1/2 before:rotate-45 relative">
            <select id="selectFilter"
                class="w-full h-full border focus:ring-0 outline-none !bg-none text-normal border-normal focus:border-focus rounded-custom"
                v-model="filterState">
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
            <template v-if="productType != 12">
                <template v-for="(product, index) in filteredList">

                    <div v-if="productType == 1" :key="index"
                        :class="'pt-2 px-8 w-full pb-5 items-center flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div class="mb-2 h-36">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </h3>
                        <div class="flex flex-col gap-4 w-56 lg:w-full">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 2" :key="index"
                        :class="'px-8 w-full pt-1 pb-8 items-center flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div class="h-32 mb-0.5">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </h3>
                        <div class="grid w-56 grid-cols-2 lg:w-full gap-2">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="'col-span-full sameCategoryBtnStyle categoryBtnEmpty rounded-custom'" />
                        </div>
                    </div>

                    <div v-if="productType == 3" :key="index"
                        :class="'px-8 w-full pt-1 pb-8 items-center flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div class="h-32 mb-0.5">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <h3 class="mb-0.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </h3>
                        <div class="grid w-56 grid-cols-2 lg:w-full xl:w-56 gap-2">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="'col-span-full sameCategoryBtnStyle castegoryBtnfilled rounded-custom'" />
                        </div>
                    </div>

                    <div v-if="productType == 4" :key="index"
                        :class="'pl-6 pr-8 w-full pt-5 pb-8 flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </h3>
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex-none h-32 lg:h-28 xl:h-32">
                                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                            </div>
                            <div class="flex flex-col w-40 gap-2 shrink">
                                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            </div>
                        </div>
                    </div>

                    <div v-if="productType == 5" :key="index"
                        :class="'px-6 gap-2 w-full pt-6 pb-10 flex items-center rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div class="flex-none h-28 sm:h-32">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <div class="flex flex-col flex-1 gap-4">
                            <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </h3>
                            <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="'col-span-full sameCategoryBtnStyle categoryBtnEmpty rounded-custom'" />
                            </div>
                        </div>
                    </div>

                    <div v-if="productType == 6" :key="index"
                        :class="'px-6 gap-2 w-full pt-6 pb-10 flex items-center rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div class="flex-none h-28 sm:h-32">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <div class="flex flex-col flex-1 gap-4">
                            <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </h3>
                            <div class="grid w-full grid-cols-2 gap-2 mr-auto max-w-72">
                                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="col-span-full sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                            </div>
                        </div>
                    </div>

                    <div v-if="productType == 7" :key="index"
                        :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 relative ` + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div
                            class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <div class="mb-4 sm:mb-0 sm:flex-1">
                            <h3 class="mb-2 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </h3>
                            <p
                                class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                                {{ product.description }}
                            </p>
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

                    <div v-if="productType == 8" :key="index"
                        :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 sm:pr-10 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 sm:after:hidden relative before:bg-normal before:absolute before:content-[''] before:top-0 before:right-0 before:w-4 before:hidden sm:before:block before:h-full overflow-hidden sm:rounded-custom` + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div
                            class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <div class="mb-4 sm:mb-0 sm:flex-1">
                            <h3 class="mb-2 sm:gap-4 font-bold lg:mb-1 text-lg text-stone-700"> {{ product.name }} </h3>
                            <p
                                class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                                {{ product.description }}
                            </p>
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

                    <div v-if="productType == 9" :key="index"
                        :class="'px-8 lg:px-5 xl:px-8 py-5 sm:pb-12 w-full items-center flex flex-col sm:border-l sm:border-l-dark-100 sm:[&:nth-child(2n+2)]:border-l-0 lg:[&:nth-child(2n+2)]:border-l lg:[&:nth-child(4n+4)]:border-l-0 border-t border-t-dark-100 first:border-t-0 sm:first:rounded-none sm:last:rounded-none sm:[&:nth-of-type(-n+2)]:border-t-0 lg:[&:nth-of-type(-n+2)]:border-t lg:[&:nth-of-type(-n+4)]:border-t-0 ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div class="h-32 mb-2">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </h3>
                        <div class="flex flex-col gap-4 w-56 mx-auto sm:mx-0">
                            <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                        </div>
                    </div>

                    <div v-if="productType == 10" :key="index"
                        :class="'border-b last:border-b-0 border-dark-100 pl-6 pr-8 w-full pt-5 pb-8 sm:border-l sm:[&:nth-child(2n)]:border-l-0 lg:[&:nth-child(2n)]:border-l lg:[&:nth-child(3n)]:border-l-0 flex flex-col ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <h3 class="mb-1.5 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
                        </h3>
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex-none h-32 lg:h-28 xl:h-32">
                                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                            </div>
                            <div class="flex flex-col w-40 gap-2 shrink">
                                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                                <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                            </div>
                        </div>
                    </div>

                    <div v-if="productType == 11" :key="index"
                        :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-0 after:w-full after:h-px after:border-t first:after:hidden after:border-dark-100 relative ` + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
                        <div
                            class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                            <img :src="product.image" :alt="product.name" class="object-contain h-full" />
                        </div>
                        <div class="mb-4 sm:mb-0 sm:flex-1">
                            <h3 class="mb-2 font-bold lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
                                }}
                            </h3>
                            <p
                                class="text-sm leading-6 text-justify text-[#818284] dark:text-white font-medium line-clamp-2">
                                {{ product.description }}
                            </p>
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
                </template>
            </template>

            <template v-if="productType == 12">
                <template v-for="(product, index) in filteredList" :key="index">
                    <section class="flex flex-col" v-if="product.length > 0">
                        <p class="text-xl font-bold mb-4 text-slate-700 text-center"> محصولات SHACMOTO </p>
                        <hr class="w-96 border-normal mb-6 mx-auto" />
                        <ul class="flex flex-col lg:flex-row lg:items-start lg:justify-center gap-0">
                            <li v-for="(item, index) in product" :key="index"
                                :class="'pt-2 px-8 w-72 pb-5 items-center flex flex-col rounded-custom ' + (evenOdd ? 'evenOdd_cards' : 'bg-white')">
                                <div class="mb-2 h-52">
                                    <img :src="item.image" :alt="item.name" class="object-contain h-full" />
                                </div>
                                <h3 class="mb-5 font-bold text-xl lg:line-clamp-1 text-stone-700"> {{ item.name }} </h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 w-56 lg:w-full">
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
import { ref, computed, watch } from 'vue';

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
    },
    setup(props) {
        const productList = ref(JSON.parse(props.list));
        const filterState = ref(0);
        const brandCategories = ref([]);
        const removeDuplicated = ref([]);
        const filteredList = ref([]);
        const allProductsList = ref([]);

        // console.log(0, typeof filteredList.value);
        function remove_duplicates_es6(arr) {
            let s = new Set(arr);
            let it = s.values();
            return Array.from(it);
        }

        let getAllBrands = new Promise(function (resolve, reject) {
            productList.value.map(brand => {
                return brand.products.map(item => {
                    const brandId = item.brand_id
                    brandCategories.value.push(brandId);
                })
            })
            removeDuplicated.value = remove_duplicates_es6(brandCategories.value)
            
            resolve();
            reject();
        })

        let getAllCategories = new Promise(function (resolve, reject) {
            productList.value.map(product => {
                product.products.map(item => {
                    allProductsList.value.push(item)
                })
            })
            resolve();
            reject();
        })

        // console.log(brandCategories.value);

        // const nonTwelveFilteredList = computed(() => {
        //     return filterState.value == 0
        //         ? productList.value
        //         : productList.value.filter(item => item.category_id == filterState.value);
        // });

        watch(() => props.productType, (newType) => {
            if (newType == 12) {
                filteredList.value = [];
                // console.log(0, typeof filteredList.value);
                getAllBrands.then(() => {
                    for (let index = 0; index < removeDuplicated.value.length; index++) {
                        filteredList.value.push([]);
                        // console.log(1, typeof filteredList.value);
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


                // watch(() => filterState.value, () => {
                //     // console.log(1 , filteredList.value);
                //     updateFilteredList();
                // });
            } else {
                getAllCategories.then(() => {
                    if (filterState.value == 0) {
                        filteredList.value = allProductsList.value;
                    } else {
                        filteredList.value = allProductsList.value.filter(item => item.category_id == filterState.value)
                    }

                })
                // filteredList.value = computed(() => {
                //     return filterState.value == 0
                //     ? allProductsList.value
                //     : allProductsList.value.filter(item => item.category_id == filterState.value)
                // });
            }
        }, { immediate: true });

        watch(() => filterState.value, (newVal) => {
            if (props.productType != 12) {
                if (newVal == 0) {
                    filteredList.value = allProductsList.value;
                } else {
                    filteredList.value = allProductsList.value.filter(item => item.category_id == newVal)
                }
            } else {
                filteredList.value = [];
                if (newVal == 0) {
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
                    getAllBrands.then(() => {
                        for (let index = 0; index < removeDuplicated.value.length; index++) {
                            filteredList.value.push([]);
                            const element = removeDuplicated.value[index];
                            productList.value.filter(product => {
                                product.products.map(item => {
                                    if (item.brand_id == element && item.category_id == filterState.value) {
                                        filteredList.value[index].push(item);
                                    }
                                })
                            })
                        }
                    })
                }
            }
        });

        const updateFilteredList = () => {
            if (filterState.value == 0) {
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
                filteredList.value = [];
                getAllBrands.then(() => {
                    for (let index = 0; index < removeDuplicated.value.length; index++) {
                        filteredList.value.push([]);
                        const element = removeDuplicated.value[index];
                        productList.value.filter(product => {
                            product.products.map(item => {
                                if (item.brand_id == element && item.category_id == filterState.value) {
                                    filteredList.value[index].push(item);
                                }
                            })
                        })
                    }
                })
            }
        };

        // filteredList.value = computed(() => {
        //     return filterState.value == 0 
        //         ? productList.value 
        //         : productList.value.filter(categoryId => categoryId.category_id == filterState.value);
        // });

        return {
            filterState,
            filteredList,
        }
    }
}
</script>