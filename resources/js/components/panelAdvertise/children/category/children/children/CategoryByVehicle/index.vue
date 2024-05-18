<template>
    <label class="block group/select" for="select-subcategory">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> دسته بندی </span>
        <div
            class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
            <div>
                <select id="select-subcategory" v-model="selectedSubcategory"
                        class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                    <option value="0" selected disabled>انتخاب کنید</option>
                    <option v-for="(option, index) in subCategories" :key="index" :value="option.id"> {{ option.title }} </option>
                </select>
            </div>
        </div>
    </label>

    <label class="block group/select" v-if="childCategories.length > 1" for="select-sub-subcategory">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> نوع خودرو </span>
        <div
            class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
            <div>
                <select id="select-sub-subcategory" v-model="selectedChildcategory"
                        class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                    <option value="0" selected disabled>انتخاب کنید</option>
                    <option v-for="(option, index) in childCategories" :key="index" :value="option.id"> {{ option.title }} </option>
                </select>
            </div>
        </div>
    </label>

</template>

<script>
import { ref, watch } from 'vue';
import { useAdvertise } from '@/store/panel/advertise/index.js';

export default {
    name: 'categories By Vehicle',
    setup(){
        const advertiseStore = useAdvertise();
        const selectedSubcategory = ref(0);
        const selectedChildcategory = ref(0);
        const subCategories = ref(advertiseStore.categoryChildren.children);
        const childCategories = ref([]);

        watch(() => selectedSubcategory.value, (n, o) => {
            // advertiseStore.resetData(1);
            if(n != 0){
                subCategories.value.map(item => {
                    if(item.id == n){
                        childCategories.value = item.children;
                        selectedChildcategory.value = 0;

                    }
                })
            }
        })

        watch(() => selectedChildcategory.value, (n, o) => {
            if(n != 0){
                childCategories.value.map(item => {
                    if(item.id == n){
                        advertiseStore.saveSelectedCategory(item);
                    }
                })
            }
        })

        return {
            selectedSubcategory,
            subCategories,
            selectedChildcategory,
            childCategories,
        }
    }
}
</script>
