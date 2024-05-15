<template>
    <section
        class="-m-4 md:m-0 px-4 pb-4 shadow-md sm:rounded-lg bg-white dark:bg-gray-800 relative scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto">
        <Category classNames="mb-10" v-if="categoryLoaded" />
        <!-- usage-->
        <Usage v-if="selectedFlow == 1" :classNames="categoryLastStep == null ? 'pointer-events-none opacity-40 cursor-default' : 'mb-10'" />
        <!-- specification-->
        <Specifications v-if="selectedFlow == 1" :classNames="usageFilled == null ? 'pointer-events-none opacity-40 cursor-default' : 'mb-10'" />
        <!-- specification-->
        <Introduction v-if="selectedFlow == 1" :classNames="usageFilled == null ? 'pointer-events-none opacity-40 cursor-default' : 'mb-10'" />
        <!-- submit-->
        <div>
            <button @click="handlePreviewData" type="button" :class="'rounded-lg shadow-sm font-medium py-2 px-4 focus:outline-none focus:ring-4 focus:ring-primary-500 transition duration-200 bg-primary-700 hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700 text-white focus:ring-primary-200 dark:focus:ring-primary-800 ' + (usageFilled == null ? 'pointer-events-none opacity-40 cursor-default' : 'mb-10')"> ثبت </button>
        </div>
    </section>
</template>

<script>
import {computed, ref} from 'vue';
import Category from "@/components/panelAdvertise/children/category/index.vue";
import axios from "axios";
import { useAdvertise } from '@/store/panel/advertise/index.js';
import Usage from '@/components/panelAdvertise/children/usage/index.vue';
import Specifications from "@/components/panelAdvertise/children/specifications/index.vue";
import Introduction from "@/components/panelAdvertise/children/introduction/index.vue";


export default {
    name: 'Panel Add Advertise',
    components: {Category, Usage, Specifications, Introduction},
    setup(){
        const advertiseStore = useAdvertise();
        const categoryLoaded = ref(false);
        const selectedFlow = ref(computed(() => advertiseStore.flow));
        const categoryLastStep = computed(() => advertiseStore.selectedCategory);
        const usageFilled = computed(() => advertiseStore.selectedUsage);

        axios.get(`/api/ad/categories`)
            .then(function (response) {
                // handle success
                if(response.data.status == 200){
                    advertiseStore.saveCategoryMain(response.data.data);
                    categoryLoaded.value = true;
                }
            })
            .catch(function (error) {
                // handle error
                console.log(error);

            })
            .finally(function () {
                // always executed
            });

        const handlePreviewData = () => {
            const farmdata = {
                usage_id: "",
                title: "",
                description: "",
                primary_image: "",
                slider_images: "",
                price: "",
                city_id: "",
                user_id: "",
                category_id: "",
                specifications: [],
            }

            console.log(farmdata)
        }

        return {
            categoryLoaded,
            selectedFlow,
            categoryLastStep,
            usageFilled,
            handlePreviewData,
        }
    }
}
</script>
