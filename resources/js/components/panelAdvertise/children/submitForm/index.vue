<template>
    <div class="flex items-center gap-4">
        <button @click="moveTo(0)" type="button"
                :class="'rounded-lg shadow-sm font-medium py-2 px-4 focus:outline-none focus:ring-4 focus:ring-primary-500 transition duration-200 bg-primary-700 hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700 text-white focus:ring-primary-200 dark:focus:ring-primary-800 ' + classNames">
            بازگشت
        </button>
        <button @click="handlePreviewData" type="button"
                :class="'rounded-lg shadow-sm font-medium py-2 px-4 focus:outline-none focus:ring-4 focus:ring-primary-500 transition duration-200 bg-primary-700 hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700 text-white focus:ring-primary-200 dark:focus:ring-primary-800 ' + classNames">
            ثبت
        </button>
    </div>
</template>

<script>
import {useAdvertise} from '@/store/panel/advertise/index.js';
import {ref, computed} from 'vue';
import axios from "axios";

export default {
    name: 'Submit Form',
    props: {
        classNames: String,
    },
    setup() {
        const advertiseStore = useAdvertise();
        const categoryId = ref(computed(() => advertiseStore.selectedCategory));
        const description = ref(computed(() => advertiseStore.description));
        const title = ref(computed(() => advertiseStore.title));
        const price = ref(computed(() => advertiseStore.price));
        const city = ref(computed(() => advertiseStore.city));
        const primaryImage = ref(computed(() => advertiseStore.primaryImage));
        const sliderImages = ref(computed(() => advertiseStore.sliderImages));
        const usage = ref(computed(() => advertiseStore.selectedUsage));
        const specifications = ref(computed(() => advertiseStore.selectedSpecificationValues));
        const brand = ref(computed(() => advertiseStore.brand));
        const model = ref(computed(() => advertiseStore.model));

        const handlePreviewData = () => {
            let specList = {};
            for (const [key, value] of Object.entries(specifications.value)) {
                if(value.type === 'select' && value.id != 0){
                    specList[key] = value.id;
                } else if(value.type === 'boolean' && typeof value.id === 'boolean'){
                    specList[key] = value.id;
                } else if(value.type === 'input_text' && value.id !== ''){
                    specList[key] = value.id;
                }
            }

            // console.log(specList);

            const farmdata = {
                usage_id: usage.value.id,
                title: title.value,
                description: description.value,
                primary_image: primaryImage.value,
                slider_images: sliderImages.value,
                price: price.value,
                city_id: city.value.id,
                category_id: categoryId.value.id,
                specifications: specList,
                brand_id: brand.value.id,
                model_id: model.value.id,
            }

            console.log(farmdata)

            axios.post(`/api/ad/submit`, farmdata, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(function (response) {
                    // handle success
                    console.log(response)
                    if(response.data.status == 200){
                        window.location.reload();
                    // advertiseStore.saveCategoryMain(response.data.data);
                    // categoryLoaded.value = true;
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);

                })
                .finally(function () {
                    // always executed
                });
        }

        const moveTo = step => {
            advertiseStore.changeStep(step);
        }

        return {
            handlePreviewData,
            moveTo,
        }
    }
}
</script>
