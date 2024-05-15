<template>
    <!-- state-->
    <label class="block group/select" for="select-state">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> استان </span>
        <div
            class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
            <div>
                <select id="select-state" v-model="stateId"
                        class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                    <option value="0" selected disabled>انتخاب کنید</option>
                    <option v-for="(option, index) in states" :key="index" :value="option.id"> {{ option.title }} </option>
                </select>
            </div>
        </div>
    </label>

    <!-- city-->
    <label :class="'block group/select ' + (cities.length ? '' : 'pointer-events-none opacity-40 cursor-default')" for="select-city">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> شهر </span>
        <div
            class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
            <div>
                <select id="select-city" v-model="cityId"
                        class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                    <option value="0" selected disabled>انتخاب کنید</option>
                    <option v-for="(option, index) in cities" :key="index" :value="option.id"> {{ option.title }} </option>
                </select>
            </div>
        </div>
    </label>
</template>

<script>
import {ref, watch} from 'vue';
import {useAdvertise} from "@/store/panel/advertise/index.js";

export default {
    name: 'State VS City',
    setup(){
        const advertiseStore = useAdvertise();
        const stateId = ref(0);
        const cityId = ref(0);
        const states = ref([]);
        const cities = ref([]);

        watch(cityId, n => {
            console.log(n);
            // advertiseStore.saveCity(id);
        });

        return {
            stateId,
            cityId,
            states,
            cities,
        }
    }
}
</script>
