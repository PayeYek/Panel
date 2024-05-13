<template>
    <section
        class="-m-4 md:m-0 shadow-md sm:rounded-lg bg-white dark:bg-gray-800 relative scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto">
        <CategoryStep
            classNames="mb-10"
            :toggleCategoryDropdown="toggleCategoryDropdown"
            :categoryDropdown="categoryDropdown"
            :categoryStepTitles="categoryStepTitles"
            :categoryLevel="categoryLevel"
            :updatecategoryStepOne="updatecategoryStepOne"
            :bindCategoryStepOne="categoryStepOne"
            :updatecategoryStepTwo="updatecategoryStepTwo"
            :bindCategoryStepTwo="categoryStepTwo"
            :bindCategoryStepThree="categoryStepThree"
            :updatecategoryStepThree="updatecategoryStepThree"/>
    </section>
</template>

<script>
import {ref, watch} from 'vue';
import CategoryStep from "@/components/panelAdvertise/children/category/index.vue";
import SelectCategory from "@/components/panelAdvertise/children/category/children/SelectCategory.vue";

const categoryStepTitles = [
    {
        title: "دسته بندی",
    },
    {
        title: "زیر دسته بندی",
    },
    {
        title: "کاربری",
    },
]

const data = [
    {
        id: 1,
        title: "خودرو",
        children: [
            {
                id: 1,
                title: "اتوبوس و مینی بوس",
                children: [
                    {
                        id: 1,
                        title: "اتوبوس شهری",
                    },
                    {
                        id: 1,
                        title: "مینی بوس",
                    },
                ]
            },
            {
                id: 2,
                title: "کامیون و کشنده",
                children: [
                    {
                        id: 1,
                        title: "کامیون",
                    },
                    {
                        id: 1,
                        title: "کشنده",
                    },
                ]
            },
        ],
    },
    {
        id: 2,
        title: "قطعات",
        children: [
            {
                id: 1,
                title: "گیربکس",
                children: [
                    {
                        id: 1,
                        title: "شفت",
                    },
                    {
                        id: 2,
                        title: "دیشلی",
                    },
                ]
            },
            {
                id: 2,
                title: "موتور",
                children: [
                    {
                        id: 1,
                        title: "پیستون",
                    },
                    {
                        id: 2,
                        title: "شاتون",
                    },
                ]
            },
        ],
    }
]

export default {
    name: 'Panel Add Advertise',
    components: {SelectCategory, CategoryStep,},
    setup(){
        const categoryLevel = ref(0);
        const categoryStepOne = ref(0);
        const categoryStepTwo = ref(0);
        const categoryStepThree = ref(0);
        const categoryDropdown = ref(true);

        const updatecategoryStepOne = (value) => {
            categoryStepOne.value = value;
        }

        const updatecategoryStepTwo = (value) => {
            categoryStepTwo.value = value;
        }

        const updatecategoryStepThree = (value) => {
            categoryStepThree.value = value;
        }

        watch(() => categoryStepOne.value, (n, o) => {
            if(n != 0){
                categoryLevel.value = 1;
                resetStetps(categoryStepTwo, categoryStepThree);
            }
        })

        watch(() => categoryStepTwo.value, (n, o) => {
            if(n != 0){
                categoryLevel.value = 2;
                resetStetps(categoryStepThree);
            }
        })

        watch(() => categoryStepThree.value, (n, o) => {
            if(n != 0){
                categoryLevel.value = 3;
            }
        })

        const resetStetps = (...args) => {
            args.map(el => {
                el.value = 0;
            })
        }

        const toggleCategoryDropdown = () => {
            categoryDropdown.value = !categoryDropdown.value;
        }

        return {
            categoryLevel,
            categoryStepTitles,
            categoryStepOne,
            categoryStepTwo,
            categoryStepThree,
            updatecategoryStepOne,
            updatecategoryStepTwo,
            updatecategoryStepThree,
            categoryDropdown,
            toggleCategoryDropdown,
            data,
        }
    }
}
</script>
