<template>
    <template v-if="type == 1">
        <div v-for="(product, index) in productList.slice(0, 4)" :key="index"
            :class="'rounded-custom pt-2 px-8 w-full pb-5 items-center flex flex-col ' + borderStyle + (evenOdd ? ' evenOdd_cards' : ' bg-white')">
            <div class="mb-2 h-36">
                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
            </div>
            <h3 class="mb-5 font-medium lg:mb-4 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }} </h3>
            <div class="flex flex-col gap-4 w-56 lg:w-52">
                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                    classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
            </div>
        </div>
    </template>

    <template v-if="type == 2">
        <div v-for="(product, index) in productList.slice(0, 4)" :key="index"
            :class="'px-8 w-full pt-1 pb-8 items-center flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
            <div class="h-32 mb-0.5">
                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
            </div>
            <h3 class="mb-0.5 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }} </h3>
            <div class="grid w-56 grid-cols-2 lg:w-52 gap-2">
                <LandBtn text="مشخصات" :to="'/l/' + landSlug + '/p/' + product.slug"
                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                <LandBtn text="کاتالوگ" :to="'/l/' + landSlug + '/p/' + product.slug"
                    classNames="sameCategoryBtnStyle categoryBtnEmpty rounded-custom" />
                <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                    classNames="col-span-full sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
            </div>
        </div>
    </template>

    <template v-if="type == 3">
        <div v-for="(product, index) in productList.slice(0, 3)" :key="index"
            :class="'pl-6 pr-8 w-full pt-5 pb-8 flex flex-col rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
            <h3 class="mb-1.5 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name }}
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
                    <LandBtn text="فروش اقساطی" :to="'/l/' + landSlug + '/p/' + product.slug"
                        classNames="sameCategoryBtnStyle castegoryBtnfilled rounded-custom" />
                </div>
            </div>
        </div>
    </template>

    <template v-if="type == 4">
        <div v-for="(product, index) in productList.slice(0, 3)" :key="index"
            :class="'px-6 gap-2 w-full pt-6 pb-10 flex items-center rounded-custom ' + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
            <div class="flex-none min-w-28 h-28 sm:min-w-32 sm:h-32">
                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
            </div>
            <div class="flex flex-col flex-1 gap-4">
                <h3 class="mb-1.5 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
                    }}
                </h3>
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
    </template>

    <template v-if="type == 5">
        <div v-for="(product, index) in productList.slice(0, 4)" :key="index"
            :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-dark-100 relative ` + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
            <div
                class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 font-medium lg:mb-1 text-lg sm:line-clamp-1 text-stone-700"> {{ product.name
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

    <template v-if="type == 6">
        <div v-for="(product, index) in productList.slice(0, 3)" :key="index"
            :class="`flex flex-col w-full sm:flex-row sm:items-center lg:pl-14 sm:gap-4 lg:gap-10 xl:gap-16 px-6 sm:pr-10 pb-6 pt-4 sm:py-6 after:absolute after:content-[''] after:top-0 after:left-[5%] after:w-[90%] after:h-px after:border-t first:after:hidden after:border-stone-400 sm:after:hidden relative before:bg-normal before:absolute before:content-[''] before:top-0 before:right-0 before:w-4 before:hidden sm:before:block before:h-full overflow-hidden sm:rounded-custom border-0 sm:border drop-shadow-none ` + borderStyle + ' ' + (evenOdd ? 'evenOdd_cards ' : 'bg-white ')">
            <div
                class="h-[11.5rem] sm:h-32 md:h-36 lg:h-40 sm:mx-0 sm:w-32 md:w-36 lg:w-40 sm:flex-none mx-auto mb-2.5 sm:mb-0">
                <img :src="product.image" :alt="product.name" class="object-contain h-full" />
            </div>
            <div class="mb-4 sm:mb-0 sm:flex-1">
                <h3 class="mb-2 sm:gap-4 font-medium lg:mb-1 text-lg text-stone-700"> {{ product.name }} </h3>
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

<script>
import { ref } from 'vue';

export default {
    name: 'Product',
    props: {
        type: [String, Number],
        evenOdd: Boolean,
        data: Array,
        landSlug: String,
        borderStyle: String,
    },
    setup(props){
        console.log(props.evenOdd);
        const productList = ref(JSON.parse(props.data));


        return {
            productList
        }
    }
}
</script>