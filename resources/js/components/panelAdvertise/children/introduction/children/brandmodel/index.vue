<template>
    <!-- Brand-->
    <div>
        <label class="block group/select" for="select-brand">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> برند </span>
            <div
                :class="'relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200 ' + (brandError === '' ? '' : 'border-red-500 dark:border-red-500')">
                <div>
                    <select id="select-brand" v-model="brandId"
                            class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                        <option value="0" selected disabled>انتخاب کنید</option>
                        <option v-for="(option, index) in brands" :key="index" :value="option.id"> {{
                                option.name
                            }}
                        </option>
                    </select>
                </div>
            </div>
        </label>
        <div class="text-red-600 dark:text-red-500 text-sm mt-0.5 flex items-center" v-if="brandError !== ''">
            <svg class="w-4 h-4 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 aria-hidden="true">
                <path
                    d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2s-2.5.85-3.36 2.4l-6.4 11.52c-.81 1.47-.9 2.88-.25 3.99.65 1.11 1.93 1.72 3.61 1.72h12.8c1.68 0 2.96-.61 3.61-1.72.65-1.11.56-2.53-.25-3.99z"
                    opacity=".4"></path>
                <path
                    d="M12 14.75c-.41 0-.75-.34-.75-.75V9c0-.41.34-.75.75-.75s.75.34.75.75v5c0 .41-.34.75-.75.75zM12 18c-.06 0-.13-.01-.2-.02a.636.636 0 01-.18-.06.757.757 0 01-.18-.09l-.15-.12c-.18-.19-.29-.45-.29-.71 0-.26.11-.52.29-.71l.15-.12c.06-.04.12-.07.18-.09.06-.03.12-.05.18-.06.13-.03.27-.03.39 0 .07.01.13.03.19.06.06.02.12.05.18.09l.15.12c.18.19.29.45.29.71 0 .26-.11.52-.29.71l-.15.12c-.06.04-.12.07-.18.09-.06.03-.12.05-.19.06-.06.01-.13.02-.19.02z"></path>
            </svg>
            <span> {{ brandError }} </span>
        </div>
    </div>

    <!-- model-->
    <div :class="models.length ? '' : 'pointer-events-none opacity-40 cursor-default'">
        <label class="block group/select" for="select-model">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> مدل </span>
            <div
                :class="'relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200 ' + (modelError === '' ? '' : 'border-red-500 dark:border-red-500')">
                <div>
                    <select id="select-model" v-model="modelId"
                            class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                        <option value="0" selected disabled>انتخاب کنید</option>
                        <option v-for="(option, index) in models" :key="index" :value="option.id"> {{
                                option.name
                            }} - {{ option.model }}
                        </option>
                    </select>
                </div>
            </div>
        </label>
        <div class="text-red-600 dark:text-red-500 text-sm mt-0.5 flex items-center" v-if="modelError !== ''">
            <svg class="w-4 h-4 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 aria-hidden="true">
                <path
                    d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2s-2.5.85-3.36 2.4l-6.4 11.52c-.81 1.47-.9 2.88-.25 3.99.65 1.11 1.93 1.72 3.61 1.72h12.8c1.68 0 2.96-.61 3.61-1.72.65-1.11.56-2.53-.25-3.99z"
                    opacity=".4"></path>
                <path
                    d="M12 14.75c-.41 0-.75-.34-.75-.75V9c0-.41.34-.75.75-.75s.75.34.75.75v5c0 .41-.34.75-.75.75zM12 18c-.06 0-.13-.01-.2-.02a.636.636 0 01-.18-.06.757.757 0 01-.18-.09l-.15-.12c-.18-.19-.29-.45-.29-.71 0-.26.11-.52.29-.71l.15-.12c.06-.04.12-.07.18-.09.06-.03.12-.05.18-.06.13-.03.27-.03.39 0 .07.01.13.03.19.06.06.02.12.05.18.09l.15.12c.18.19.29.45.29.71 0 .26-.11.52-.29.71l-.15.12c-.06.04-.12.07-.18.09-.06.03-.12.05-.19.06-.06.01-.13.02-.19.02z"></path>
            </svg>
            <span> {{ modelError }} </span>
        </div>
    </div>
</template>

<script>
import {computed, nextTick, ref, watch} from "vue";
import {useAdvertise} from "@/store/panel/advertise/index.js";
import axios from "axios";
import Choices from 'choices.js';

export default {
    name: 'Brand And Model',
    setup() {
        const advertiseStore = useAdvertise();
        const brandError = ref(computed(() => advertiseStore.brandErrorMessage));
        const modelError = ref(computed(() => advertiseStore.modelErrorMessage));
        const brandId = ref(0);
        const modelId = ref(0);
        const brands = ref([]);
        const models = ref([]);
        const brandInitialized = ref(false);
        const modelInitialized = ref(false);
        const choicesInstanceBrand = ref(null);
        const choicesInstanceModel = ref(null);

        axios.get(`/api/ad/brand/list`)
            .then(function (response) {
                brands.value.length = 0;
                // handle success
                if (response.data.status == 200) {
                    brands.value = response.data.data;

                    // prevent re-initializing choices js
                    if (!brandInitialized.value) {
                        // nextTick(() => {
                        //     const selectElement = document.getElementById('select-brand');
                        //     if (choicesInstanceBrand.value != null) {
                        //         choicesInstanceBrand.value = null;
                        //     }
                        //     choicesInstanceBrand.value = new Choices(selectElement, {
                        //         searchEnabled: true,
                        //         itemSelectText: '',
                        //         shouldSort: false
                        //     });
                        // });

                        brandInitialized.value = true;
                    }
                }
            })
            .catch(function (error) {
                // handle error
                console.log(error);

            })
            .finally(function () {
                // always executed
            });

        watch(brandId, n => {
            // models.value = [];
            modelId.value = 0;
            // advertiseStore.saveBrand({});
            brands.value.map(brand => {
                if (brand.id == n) {
                    advertiseStore.saveBrand(brand);
                }
            })
            axios.get(`/api/ad/brand/${n}/models`)
                .then(function (response) {
                    // console.log(models.value);
                    // handle success
                    if (response.data.status == 200) {
                        // models.value = response.data.data;
                        // nextTick(() => {
                        models.value = response.data.data;
                        // });
                        // console.log(models.value);

                        // prevent re-initializing choices js
                        // if (!modelInitialized.value) {
                        // console.log(choicesInstanceModel.value)
                        // nextTick(() => {
                        //     if (choicesInstanceModel.value) {
                        //         choicesInstanceModel.value.destroy();
                        //         choicesInstanceModel.value = null;
                        //     }
                        //     const selectModal = document.getElementById('select-model');
                        //     if(selectModal){
                        //         nextTick(() => {
                        //             choicesInstanceModel.value = new Choices(selectModal, {
                        //                 searchEnabled: true,
                        //                 itemSelectText: '',
                        //                 shouldSort: false
                        //             });
                        //         })
                        //     }
                        // })
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);

                })
                .finally(function () {
                    // always executed
                });
        });

        watch(modelId, n => {
            models.value.map(model => {
                if (model.id == n) {
                    // console.log(model);
                    advertiseStore.saveModel(model);
                }
            })
        })

        watch(computed(() => advertiseStore.defaultBrandId), n => {
            if (n) {
                brandId.value = 0;
            }
        })
        watch(computed(() => advertiseStore.defaultModelId), n => {
            if (n) {
                modelId.value = 0;
            }
        })


        return {
            brandId,
            modelId,
            brands,
            models,
            brandError,
            modelError,
        }
    }
}
</script>
