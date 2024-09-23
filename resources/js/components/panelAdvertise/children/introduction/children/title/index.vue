<template>
    <div>
        <label class="block group/input" for="advertise-title">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  عنوان </span>
            <div
                :class="'flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/input:ring-1 group-focus-within/input:ring-primary-500 group-focus-within/input:border-primary-500 transition duration-200 ' + (titleError === '' ? '' : 'border-red-500 dark:border-red-500')">
                <div class="relative flex flex-1">
                    <input type="text" id="advertise-title" v-model="title"
                           class="min-h-[2.5rem] pr-3 block bg-gray-50 pl-12 dark:bg-gray-700 dark:text-white w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed rounded-[7px]"/>
                    <div :class="'absolute top-1 left-1 rounded-full size-8 text-xs flex items-center justify-center ' + (titleLimit >= 0 ? 'bg-green-400/20 dark:bg-green-600/25 text-green-400' : 'bg-red-500/10 text-red-500 dark:bg-red-500/20')"> {{titleLimit}} </div>
                </div>
            </div>
        </label>
        <div class="text-red-600 dark:text-red-500 text-sm mt-0.5 flex items-center" v-if="titleError !== ''">
            <svg class="w-4 h-4 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2s-2.5.85-3.36 2.4l-6.4 11.52c-.81 1.47-.9 2.88-.25 3.99.65 1.11 1.93 1.72 3.61 1.72h12.8c1.68 0 2.96-.61 3.61-1.72.65-1.11.56-2.53-.25-3.99z" opacity=".4"></path><path d="M12 14.75c-.41 0-.75-.34-.75-.75V9c0-.41.34-.75.75-.75s.75.34.75.75v5c0 .41-.34.75-.75.75zM12 18c-.06 0-.13-.01-.2-.02a.636.636 0 01-.18-.06.757.757 0 01-.18-.09l-.15-.12c-.18-.19-.29-.45-.29-.71 0-.26.11-.52.29-.71l.15-.12c.06-.04.12-.07.18-.09.06-.03.12-.05.18-.06.13-.03.27-.03.39 0 .07.01.13.03.19.06.06.02.12.05.18.09l.15.12c.18.19.29.45.29.71 0 .26-.11.52-.29.71l-.15.12c-.06.04-.12.07-.18.09-.06.03-.12.05-.19.06-.06.01-.13.02-.19.02z"></path></svg>
            <span> {{titleError}} </span>
        </div>
    </div>
</template>

<script>
import {ref, watch, computed} from "vue";
import {useAdvertise} from "@/store/panel/advertise/index.js";
import {textInputLimitation} from "@/components/helper/common.js";

export default {
    name: 'Title',
    setup(){
        const advertiseStore = useAdvertise();
        const title = ref(null);
        const titleLimit = ref(textInputLimitation);
        const titleError = ref(computed(() => advertiseStore.titleErrorMessage));

        watch(title, n => {
            advertiseStore.saveTitle(n);
            titleLimit.value = textInputLimitation - n.toString().length;
        })

        return {
            title,
            titleError,
            titleLimit,
            textInputLimitation,
        }
    }
}
</script>
