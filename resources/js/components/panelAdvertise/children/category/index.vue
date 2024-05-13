<template>
    <section :class="classNames">
        <div class="flex justify-between items-center gap-4 p-4 mb-4" @click="toggleCategoryDropdown">
            <h5 class="text-xl sm:text-2xl font-medium tracking-tight text-gray-900 dark:text-white rtl:font-bakh"> دسته
                بندی را انتخاب کنید </h5>

            <!-- dropdown icon-->
            <button type="button" class="cursor-pointer p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" :class="'size-6 duration-1000 ' + (categoryDropdown ? 'rotate-180' : 'rotate-0')">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
        </div>
        <div
            :class="'px-4 overflow-hidden transition-all duration-1000 ' + (categoryDropdown ? 'max-h-[60rem] pb-4' : 'max-h-0 pb-0')">
            <!-- steps-->
            <ul class="text-sm list-none flex items-center relative mb-10">
                <li class="flex-1 flex justify-center" v-for="(cat, index) in categoryStepTitles" :key="index"> {{ cat.title }} </li>
                <li class="absolute h-4 w-full rounded-full bg-gray-200 dark:bg-gray-600 left-0 top-8 overflow-hidden">
                    <div class="bg-primary-700 dark:bg-primary-600 h-full rounded-full duration-300" :style="{width: `${categoryLevel * (100 / categoryStepTitles.length)}%`}"></div>
                </li>
            </ul>
            <!-- tabs-->
            <section>
                <!-- select category-->
                <SelectCategory
                    :data="data"
                    :categoryLevel="categoryLevel"
                    @update:bindCategoryStepOne="updatecategoryStepOne"
                    :bindCategoryStepOne="bindCategoryStepOne"
                    @update:bindCategoryStepTwo="updatecategoryStepTwo"
                    :bindCategoryStepTwo="bindCategoryStepTwo"
                    :bindCategoryStepThree="bindCategoryStepThree"
                    @update:bindCategoryStepThree="updatecategoryStepThree" />
            </section>

        </div>
    </section>
</template>

<script>
import SelectCategory from "@/components/panelAdvertise/children/category/children/SelectCategory.vue";
export default {
    name: 'Category Step',
    components: {
        SelectCategory,
    },
    props: {
        classNames: String,
        categoryLevel: Number,
        bindCategoryStepOne: [String, Number],
        bindCategoryStepTwo: [String, Number],
        bindCategoryStepThree: [String, Number],
        updatecategoryStepOne: Function,
        updatecategoryStepTwo: Function,
        updatecategoryStepThree: Function,
        categoryStepTitles: Array,
        categoryDropdown: Boolean,
        toggleCategoryDropdown: Function,
        data: Array,
    }
}
</script>
