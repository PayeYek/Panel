<template>
    <section
        class="-m-4 md:m-0 shadow-md sm:rounded-lg bg-white dark:bg-gray-800 relative scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto">
        <CategoryStep classNames="mb-10" v-if="categoryLoaded"/>
    </section>
</template>

<script>
import {ref, watch} from 'vue';
import CategoryStep from "@/components/panelAdvertise/children/category/index.vue";
import axios from "axios";
import { useAdvertise } from '@/store/panel/advertise/index.js';


export default {
    name: 'Panel Add Advertise',
    components: {CategoryStep,},
    setup(){
        const advertiseStore = useAdvertise();
        const categoryLoaded = ref(false);

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
        }
    }
}
</script>
