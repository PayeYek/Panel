<template>
    <section :class="classNames">
        <div class="flex justify-between items-center gap-4 p-4">
            <h5 class="text-xl sm:text-2xl font-medium tracking-tight text-gray-900 dark:text-white rtl:font-bakh"> دسته
                بندی را انتخاب کنید
            </h5>

            <!-- dropdown icon-->
            <button type="button" class="cursor-pointer p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 duration-1000">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
        </div>

        <div class="px-4 overflow-hidden transition-all duration-1000">
            <!-- tabs-->
            <section class="grid gap-5 grid-cols-1 lg:grid-cols-2">
                <!-- select category-->
                <label class="block group/select" for="select-category">
                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> دسته بندی </span>
                    <div
                        class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
                        <div>
                            <select id="select-category" v-model="selectedCategory"
                                    class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                                <option value="0" selected disabled>انتخاب کنید</option>
                                <option v-for="(option, index) in mainCategories" :key="index" :value="option.id"> {{ option.title }} </option>
                            </select>
                        </div>
                    </div>
                </label>

                <CategoryByVehicle v-if="selectedFlow == 1" />
            </section>

        </div>
    </section>
</template>

<script>
import CategoryByVehicle from "@/components/panelAdvertise/children/category/children/children/CategoryByVehicle/index.vue";
import { useAdvertise } from '@/store/panel/advertise/index.js';
import { ref, watch, computed } from 'vue';

export default {
    name: 'Category Step',
    components: {
        CategoryByVehicle,
    },
    props: {
        classNames: String,
    },
    setup(){
        const advertiseStore = useAdvertise();
        const mainResponse = ref(advertiseStore.category);
        const mainCategories = ref([]);
        const selectedCategory = ref(0);
        const selectedFlow = ref(computed(() => advertiseStore.flow));
        mainResponse.value.map(step => {
            const obj = {
                id: step.id,
                title: step.title,
            }
            mainCategories.value.push(obj);
        });

        watch(() => selectedCategory.value, (n, o) => {
            if(n != 0){
                mainResponse.value.map(item => {
                    if(item.id == n){
                        advertiseStore.saveCategoryChildren(item);
                    }
                })
            }
        })

        return {
            mainCategories,
            selectedFlow,
            selectedCategory,
        }
    }
}
</script>
