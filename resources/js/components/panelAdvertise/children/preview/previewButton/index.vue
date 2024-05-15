<template>
    <div>
        <button type="button" @click="moveTo(1)"
                :class="'rounded-lg shadow-sm font-medium py-2 px-4 focus:outline-none focus:ring-4 focus:ring-primary-500 transition duration-200 bg-primary-700 hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700 text-white focus:ring-primary-200 dark:focus:ring-primary-800 ' + classNames">
            ثبت پیشنویس
        </button>
    </div>
</template>

<script>
import {useAdvertise} from "@/store/panel/advertise/index.js";
import {ref, computed} from 'vue';

export default {
    name: 'Preview Button',
    props: {
        classNames: String,
    },
    setup(){
        const advertiseStore = useAdvertise();
        const title = ref(computed(() => advertiseStore.title));
        const description = ref(computed(() => advertiseStore.description));
        const product = ref(computed(() => advertiseStore.selectedCategory));
        const usage = ref(computed(() => advertiseStore.selectedUsage));
        const specifications = ref(computed(() => advertiseStore.selectedSpecificationValues));

        const moveTo = step => {
            console.log(title.value);
            if(title.value === ""){
                advertiseStore.handleTitleError("عنوان خالیست.");
            }
            // advertiseStore.changeStep(step);
        }

        return {
            moveTo,
        }
    }
}
</script>
