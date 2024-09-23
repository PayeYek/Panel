<template>
    <div class="col-span-full">
        <label class="block group/textarea" for="advertise-description">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> توضیحات </span>
            <div
                :class="'flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/textarea:ring-1 group-focus-within/textarea:ring-primary-500 group-focus-within/textarea:border-primary-500 transition duration-200 ' + (titleError === '' ? '' : 'border-red-500 dark:border-red-500')">
                <textarea v-model="description" id="advertise-description" class="rounded-[7px] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed"></textarea>
            </div>
        </label>
        <div class="text-red-600 dark:text-red-500 text-sm mt-0.5 flex items-center" v-if="titleError !== ''">
            <svg class="w-4 h-4 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2s-2.5.85-3.36 2.4l-6.4 11.52c-.81 1.47-.9 2.88-.25 3.99.65 1.11 1.93 1.72 3.61 1.72h12.8c1.68 0 2.96-.61 3.61-1.72.65-1.11.56-2.53-.25-3.99z" opacity=".4"></path><path d="M12 14.75c-.41 0-.75-.34-.75-.75V9c0-.41.34-.75.75-.75s.75.34.75.75v5c0 .41-.34.75-.75.75zM12 18c-.06 0-.13-.01-.2-.02a.636.636 0 01-.18-.06.757.757 0 01-.18-.09l-.15-.12c-.18-.19-.29-.45-.29-.71 0-.26.11-.52.29-.71l.15-.12c.06-.04.12-.07.18-.09.06-.03.12-.05.18-.06.13-.03.27-.03.39 0 .07.01.13.03.19.06.06.02.12.05.18.09l.15.12c.18.19.29.45.29.71 0 .26-.11.52-.29.71l-.15.12c-.06.04-.12.07-.18.09-.06.03-.12.05-.19.06-.06.01-.13.02-.19.02z"></path></svg>
            <span> {{titleError}} </span>
        </div>
    </div>
</template>

<script>
import {useAdvertise} from "@/store/panel/advertise/index.js";
import {computed, ref, watch} from "vue";

export default {
    name: 'Description',
    setup(){
        const advertiseStore = useAdvertise();
        const description = ref(null);
        const titleError = ref(computed(() => advertiseStore.descriptionErrorMessage));

        watch(description, n => {
            advertiseStore.saveDescription(n);
        })

        return {
            description,
            titleError,
        }
    }
}
</script>
