<template>
    <div>
        <button @click="handlePreviewData" type="button" :class="'rounded-lg shadow-sm font-medium py-2 px-4 focus:outline-none focus:ring-4 focus:ring-primary-500 transition duration-200 bg-primary-700 hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700 text-white focus:ring-primary-200 dark:focus:ring-primary-800 ' + classNames"> ثبت </button>
    </div>
</template>

<script>
import { useAdvertise } from '@/store/panel/advertise/index.js';
import {ref, computed} from 'vue';
import axios from "axios";

export default {
    name: 'Submit Form',
    props: {
        classNames: String,
    },
    setup(){
        const advertiseStore = useAdvertise();
        const categoryId = ref(computed(() => advertiseStore.selectedCategory));
        const description = ref(computed(() => advertiseStore.description));
        const title = ref(computed(() => advertiseStore.title));
        const price = ref(computed(() => advertiseStore.price));
        const usage = ref(computed(() => advertiseStore.selectedUsage));
        const specifications = ref(computed(() => advertiseStore.selectedSpecificationValues));

        const handlePreviewData = () => {
            const farmdata = {
                usage_id: usage.value.id,
                title: title.value,
                description: description.value,
                primary_image: "",
                slider_images: "",
                price: price.value,
                city_id: 1,
                category_id: categoryId.value.id,
                specifications: specifications.value,
            }

            console.log(farmdata)

            axios.post(`/api/ad/submit`, farmdata)
                .then(function (response) {
                    // handle success
                    console.log(response)
                    // if(response.data.status == 200){
                        // advertiseStore.saveCategoryMain(response.data.data);
                        // categoryLoaded.value = true;
                    // }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);

                })
                .finally(function () {
                    // always executed
                });
        }

        return {
            handlePreviewData,
        }
    }
}
</script>
