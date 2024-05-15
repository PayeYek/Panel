<template>
    <section :class="classNames">
        <h5 class="text-xl sm:text-2xl font-medium p-4 tracking-tight text-gray-900 dark:text-white rtl:font-bakh">
            تائید اطلاعات
        </h5>

        <section class="grid gap-5 grid-cols-1 lg:grid-cols-2 mb-10 cursor-default">
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
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  نوع خودرو </span>
                <div
                    class="flex min-h-[2.5rem] px-3 items-center bg-gray-50 dark:bg-gray-700 dark:text-white w-full rounded-lg flex-1 border border-gray-300 dark:border-gray-600 shadow-sm transition duration-200">
                    {{ usage.title }}
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
        const usage = ref(computed(() => advertiseStore.selectedUsage));
        const specifications = ref(computed(() => advertiseStore.selectedSpecificationValues));
        // console.log(specifications.value)
        for (const [key, value] of Object.entries(specifications.value)) {
            console.log(value);
            if(value.required != 0 && value.type === 'select'){

            }
        }

        return {
            product,
            usage,
        }
    }
}
</script>
