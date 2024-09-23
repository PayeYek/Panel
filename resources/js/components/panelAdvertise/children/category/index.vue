<template>
    <section :class="classNames">
        <h5 class="text-xl sm:text-2xl font-medium p-4 tracking-tight text-gray-900 dark:text-white rtl:font-bakh"> دسته
            بندی را انتخاب کنید
        </h5>

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
