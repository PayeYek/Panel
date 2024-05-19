<template>
    <section
        class="-m-4 md:m-0 px-4 pb-4 shadow-md sm:rounded-lg bg-white dark:bg-gray-800 relative scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto">
        <div v-show="step == 0">
            <Category classNames="mb-10" v-if="categoryLoaded" />
            <!-- usage -->
            <Usage v-if="selectedFlow == 1" :classNames="categoryLastStep == null ? 'pointer-events-none opacity-40 cursor-default' : 'mb-10'" />
            <!-- specification -->
            <Specifications v-if="selectedFlow == 1" :classNames="usageFilled == null ? 'pointer-events-none opacity-40 cursor-default' : 'mb-10'" />
            <!-- Introduction -->
            <Introduction v-if="selectedFlow == 1" :classNames="usageFilled == null ? 'pointer-events-none mb-10 opacity-40 cursor-default' : 'mb-10'" />
            <!-- submit -->
            <PreviewButton :classNames="usageFilled == null ? 'pointer-events-none opacity-40 cursor-default' : 'mb-10'" />
        </div>

        <PreviewList v-if="step == 1" />
        <!-- submit-->
<!--        <SubmitForm  />-->
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
import SubmitForm from "@/components/panelAdvertise/children/submitForm/index.vue";
import PreviewButton from "@/components/panelAdvertise/children/preview/previewButton/index.vue";
import PreviewList from "@/components/panelAdvertise/children/preview/previewList/index.vue";


export default {
    name: 'Panel Add Advertise',
    components: {Category, Usage, Specifications, Introduction, PreviewButton, PreviewList},
    setup(){
        const advertiseStore = useAdvertise();
        const step = ref(computed(() => advertiseStore.step));
        const categoryLoaded = ref(false);
        const selectedFlow = ref(computed(() => advertiseStore.flow));
        const categoryLastStep = computed(() => advertiseStore.selectedCategory);
        const usageFilled = computed(() => advertiseStore.selectedUsage);
        const specifications = computed(() => advertiseStore.selectedSpecificationValues);

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



        return {
            categoryLoaded,
            selectedFlow,
            categoryLastStep,
            usageFilled,
            step,
        }
    }
}
</script>
