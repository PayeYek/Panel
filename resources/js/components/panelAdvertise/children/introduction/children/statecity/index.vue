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
                    <option v-for="(option, index) in states" :key="index" :value="option.id"> {{ option.name }} </option>
                </select>
            </div>
        </div>
    </label>

    <!-- city-->
    <div :class="cities.length ? '' : 'pointer-events-none opacity-40 cursor-default'">
        <label class="block group/select" for="select-city">
            <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> شهر </span>
            <div
                :class="'relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200 ' + (titleError === '' ? '' : 'border-red-500 dark:border-red-500')">
                <div>
                    <select id="select-city" v-model="cityId"
                            class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                        <option value="0" selected disabled>انتخاب کنید</option>
                        <option v-for="(option, index) in cities" :key="index" :value="option.id"> {{ option.name }} </option>
                    </select>
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
import {computed, nextTick, ref, watch} from 'vue';
import {useAdvertise} from "@/store/panel/advertise/index.js";
import axios from "axios";
import Choices from 'choices.js';

export default {
    name: 'State VS City',
    setup(){
        const advertiseStore = useAdvertise();
        const titleError = ref(computed(() => advertiseStore.cityErrorMessage));
        const stateId = ref(0);
        const cityId = ref(0);
        const states = ref([]);
        const cities = ref([]);
        const stateInitialized = ref(false);
        const choicesInstanceState = ref(null);

        axios.get(`/api/ad/provinces`)
            .then(function (response) {
                // handle success
                if(response.data.status == 200){
                    // console.log(response.data);
                    states.value = response.data.data;

                    if (!stateInitialized.value) {
                        // nextTick(() => {
                        //     const selectState = document.getElementById('select-state');
                        //     if (choicesInstanceState.value != null) {
                        //         choicesInstanceState.value = null;
                        //     }
                        //     choicesInstanceState.value = new Choices(selectState, {
                        //         searchEnabled: true,
                        //         itemSelectText: '',
                        //         shouldSort: false
                        //     });
                        // });

                        stateInitialized.value = true;
                    }
                }
            })
            .catch(function (error) {
                // handle error
                console.log(error);

            })
            .finally(function () {
                // always executed
            });

        watch(stateId, n => {
            axios.get(`/api/ad/cities/${n}`)
                .then(function (response) {
                    // handle success
                    if(response.data.status == 200){
                        cities.value = response.data.data;
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);

                })
                .finally(function () {
                    // always executed
                });
        });

        watch(cityId, n => {
            cities.value.map(city => {
                if(city.id == n){
                    // console.log(city);
                    advertiseStore.saveCity(city);
                }
            })
        })

        return {
            stateId,
            cityId,
            states,
            cities,
            titleError,
        }
    }
}
</script>
