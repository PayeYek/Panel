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
            <!-- city-->
            <div>
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  شهر </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ city }}
                </div>
            </div>
            <!-- specification-->
            <template v-for="(spec, index) in filledSpecifications" :key="index">
                <!-- city-->
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
        const filledSpecifications = ref([]);

        for (const [key, value] of Object.entries(specifications.value)) {
            if(value.type === 'select' && value.id != 0 || value.type === 'boolean' && value.id != 0){
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
            }
        }

        return {
            product,
            usage,
            title,
            price,
            numberWithCommas,
            description,
            city,
            filledSpecifications,
        }
    }
}
</script>
