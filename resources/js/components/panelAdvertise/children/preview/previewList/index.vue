<template>
    <section :class="classNames">
        <h5 class="text-xl sm:text-2xl font-medium p-4 tracking-tight text-gray-900 dark:text-white rtl:font-bakh">
            تائید اطلاعات
        </h5>

        <section class="grid gap-5 grid-cols-1 lg:grid-cols-2 mb-10 cursor-default">

            <!-- product title-->
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  عنوان </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ title }}
                </div>
            </div>
            <!-- product type-->
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  نوع خودرو </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ product.title }}
                </div>
            </div>
            <!-- usage-->
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  نوع کاربری </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ usage.title }}
                </div>
            </div>
            <!-- price-->
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  قیمت </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ numberWithCommas(price) }} تومان
                </div>
            </div>
            <!-- brand-->
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  برند </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ brand.name }}
                </div>
            </div>
            <!-- model-->
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> مدل </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ model.name }} - {{ model.model }}
                </div>
            </div>
            <!-- city-->
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  شهر </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ city.name }}
                </div>
            </div>
            <!-- specification-->
            <template v-for="(spec, index) in filledSpecifications" :key="index">
                <div>
                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  {{ spec.title }} </span>
                    <div
                        class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                        {{ spec.value }}
                    </div>
                </div>
            </template>
            <!-- description-->
            <div class="col-span-full">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  توضیحات </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ description }}
                </div>
            </div>
            <!-- primary Image-->
            <div v-if="primaryImageSrc">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  عکس اصلی </span>
                <div class="h-32 lg:h-28 relative">
                    <img :src="primaryImageSrc" :alt="title" class="h-full rounded-md object-cover peer" />
                    <img :src="primaryImageSrc" :alt="title" class="absolute bottom-36 lg:bottom-32 rounded-md right-0 opacity-0 min-w-fit hidden md:block h-60 peer-hover:opacity-100 scale-90 peer-hover:scale-100 invisible peer-hover:visible" />
                </div>
            </div>
            <!-- thumbnails -->
            <template v-if="sliderImages.length">
                <div>
                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  عکس های بیشتر </span>
                    <div v-if="sliderImages.length <= 4" class="flex items-center">
                        <div v-for="(image, index) in sliderImages" :key="index" class="size-32 lg:size-24 xl:size-28 relative -mr-14 first:mr-0 hover:ml-12">
                            <img :src="image" class="h-full object-cover origin-center rounded-full peer" />
                            <img :src="image" :alt="title" class="absolute bottom-36 lg:bottom-32 rounded-md left-0 opacity-0 min-w-fit hidden md:block h-60 peer-hover:opacity-100 scale-90 peer-hover:scale-100 invisible peer-hover:visible" />
                        </div>
                    </div>
                    <div v-else class="grid grid-cols-3 xl:grid-cols-4 gap-2">
                        <div v-for="(image, index) in sliderImages" :key="index" class="aspect-square relative">
                            <img :src="image" class="size-full object-cover origin-center rounded-md peer" />
                            <img :src="image" :alt="title" class="absolute bottom-36 lg:bottom-32 rounded-md left-0 opacity-0 min-w-fit hidden md:block h-60 peer-hover:opacity-100 scale-90 peer-hover:scale-100 invisible peer-hover:visible" />
                        </div>
                    </div>
                </div>
            </template>

        </section>
        <SubmitForm />
    </section>
</template>

<script>
import SubmitForm from "@/components/panelAdvertise/children/submitForm/index.vue";
import {useAdvertise} from "@/store/panel/advertise/index.js";
import {ref, computed} from 'vue';
import {numberWithCommas} from "@/components/helper/common.js";


export default {
    name: 'Preview List',
    components: {
        SubmitForm,
    },
    props: {
        classNames: String,
    },
    setup(){
        const advertiseStore = useAdvertise();
        const product = ref(computed(() => advertiseStore.selectedCategory));
        const title = ref(computed(() => advertiseStore.title));
        const price = ref(computed(() => advertiseStore.price));
        const city = ref(computed(() => advertiseStore.city));
        const description = ref(computed(() => advertiseStore.description));
        const usage = ref(computed(() => advertiseStore.selectedUsage));
        const specifications = ref(computed(() => advertiseStore.selectedSpecificationValues));
        const spec = ref(computed(() => advertiseStore.specifications));
        const primaryImageSrc = ref(computed(() => advertiseStore.primaryImageSrc));
        const sliderImages = ref(computed(() => advertiseStore.sliderImagesSrc));
        const filledSpecifications = ref([]);
        const brand = ref(computed(() => advertiseStore.brand));
        const model = ref(computed(() => advertiseStore.model));
        console.log(model.value)

        for (const [key, value] of Object.entries(specifications.value)) {
            // if(value.type === 'boolean'){
            //     console.log(value)
            // }
            if(value.type === 'select' && value.id != 0){
                for (const [index, content] of Object.entries(spec.value)) {
                    if(key == content.id){
                        content.values.map(item => {
                            if(item.id == value.id){
                                const obj = {
                                    title: value.title,
                                    value: item.title,
                                }
                                filledSpecifications.value.push(obj);
                            }
                        })
                    }
                }
            } else if(value.type === 'boolean' && (value.id == 0 || value.id == 1)){
                // console.log(value);
                const obj = {
                    title: value.title,
                    value: value.id == 1 ? 'دارد' : 'ندارد',
                }
                filledSpecifications.value.push(obj);
            } else if(value.type === 'input_text' && value.id !== ''){
                const obj = {
                    title: value.title,
                    value: value.id,
                }
                filledSpecifications.value.push(obj);
            }
        }

        // console.log(sliderImages.value);

        return {
            product,
            usage,
            title,
            price,
            numberWithCommas,
            description,
            city,
            filledSpecifications,
            primaryImageSrc,
            sliderImages,
            brand,
            model,
        }
    }
}
</script>
