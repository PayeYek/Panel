
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
                        <img :src="product.image" alt="mammut" class="object-contain h-full" />
                    </div>
                    <h3 class="mb-5 font-bold lg:mb-4 text-lg sm:line-clamp-1 text-gray-900"> {{ product.name }} </h3>
                    <div class="flex flex-col gap-4">
                        <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'text-sm lg:text-base font-bold cursor-pointer w-40 h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'text-sm lg:text-base font-bold cursor-pointer w-40 h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
                        <LandBtn text="خرید اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug" :classNames="'text-sm lg:text-base font-bold cursor-pointer w-40 h-11 flex_center text-normal bg-white border border-normal hover:border-focus hover:text-focus focus:border-focus focus:text-focus focus:shadow-focus focus:shadow-shadowNormal ' + radius" />
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
        classType: {
            type: String,
            default: null,
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