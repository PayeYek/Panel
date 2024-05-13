<template>
    <section class="grid gap-5 grid-cols-1 lg:grid-cols-2">
        <!--                step 1-->
        <label class="block group/select" for="select-category">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> دسته بندی </span>
            <div
                class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
                <div>
                    <select :value="bindCategoryStepOne" @input="$emit('update:bindCategoryStepOne', $event.target.value)" id="select-category"
                            class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                        <option value="0" selected disabled>انتخاب کنید</option>
                        <!--<option v-for="(option, index) in data" :key="index" :value="option.id"> {{ option.title }} </option>-->
                    </select>
                </div>
            </div>
        </label>

        <!--                step 2-->
        <label :class="'block group/select ' + (categoryLevel >= 1 ? 'opacity-100 cursor-pointer pointer-events-auto' : 'opacity-40 cursor-default pointer-events-none')" for="select-subcategory">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> زیر دسته بندی </span>
            <div
                class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
                <div>
                    <select :value="bindCategoryStepTwo" @input="$emit('update:bindCategoryStepTwo', $event.target.value)" id="select-subcategory"
                            class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                        <option value="0" selected disabled>انتخاب کنید</option>
<!--                        <template v-for="(cat, index) in data">-->
<!--                            <option v-for="(subCat, index) in data" :value="subCat.id"> {{ subCat.title }} </option>-->
<!--                        </template>-->
<!--                        <option value="1"> اتوبوس</option>-->
<!--                        <option value="2"> مینی بوس</option>-->
<!--                        <option value="3"> کامیون</option>-->
                    </select>
                </div>
            </div>
        </label>

        <!--                step 3-->
        <label :class="'block group/select ' + (categoryLevel >= 2 ? 'opacity-100 cursor-pointer pointer-events-auto' : 'opacity-40 cursor-default pointer-events-none')" for="select-usage">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> زیر دسته بندی </span>
            <div
                class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
                <div>
                    <select :value="bindCategoryStepThree" @input="$emit('update:bindCategoryStepThree', $event.target.value)" id="select-usage"
                            class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                        <option value="0" selected disabled>انتخاب کنید</option>
                        <option value="1"> باری</option>
                        <option value="2"> یخچالی</option>
                        <option value="3"> کشنده</option>
                    </select>
                </div>
            </div>
        </label>
    </section>
</template>

<script>
import { useAdvertise } from '@/store/panel/advertise/index.js';
import { ref } from 'vue';

export default {
    name: 'Select Category Level',
    props: {
        categoryLevel: Number,
        bindCategoryStepOne: [String, Number],
        bindCategoryStepTwo: [String, Number],
        bindCategoryStepThree: [String, Number],
    },
    setup(){
        const advertiseStore = useAdvertise();
        const mainResponse = ref(advertiseStore.category.response);
        // console.log(mainResponse.value);
    }
}
</script>
