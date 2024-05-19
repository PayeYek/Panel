<template>
    <section :class="classNames">
        <h5 class="text-xl sm:text-2xl font-medium p-4 tracking-tight text-gray-900 dark:text-white rtl:font-bakh">
            کاربری را انتخاب کنید
        </h5>

        <section class="grid gap-5 grid-cols-1 lg:grid-cols-2">
            <!-- select usage-->
            <label class="block group/select" for="select-usage">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> کاربری </span>
                <div
                    class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
                    <div>
                        <select id="select-usage" v-model="selectedUsage"
                                class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                            <option value="0" selected disabled>انتخاب کنید</option>
                            <option v-for="(option, index) in usageList" :key="index" :value="option.id"> {{ option.title }} </option>
                        </select>
                    </div>
                </div>
            </label>
        </section>
    </section>
</template>

<script>
import { ref, onMounted, onBeforeUnmount, nextTick, computed, watch } from 'vue';
import axios from "axios";
import Choices from 'choices.js';
import {useAdvertise} from "@/store/panel/advertise/index.js";

export default {
    name: 'Usage',
    props: {
        classNames: String,
    },
    setup(){
        const advertiseStore = useAdvertise();
        const selectedUsage = ref(0);
        const usageList = ref(computed(() => advertiseStore.usageList));
        const choicesInstance = ref(null);

        // onBeforeUnmount(() => {
        //     if (choicesInstance.value) {
        //         choicesInstance.value.destroy();
        //     }
        // });

        onMounted(() => {
            axios.get(`/api/ad/usages`)
                .then(function (response) {
                    // handle success
                    if(response.data.status == 200){
                        advertiseStore.saveUsages(response.data.data);
                        nextTick(() => {
                            const selectElement = document.getElementById('select-usage');
                            choicesInstance.value = new Choices(selectElement, {
                                searchEnabled: true,
                                itemSelectText: '',
                                shouldSort: false
                            });
                        });
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);

                })
                .finally(function () {
                    // always executed
                });
        })

        watch(() => selectedUsage.value, n => {
            // console.log(n)
            usageList.value.map(usage => {
                if(usage.id == n){
                    // console.log(usage);
                    advertiseStore.saveUsage(usage);
                    axios.get(`/api/ad/specifications/${n}`)
                        .then(function (response) {
                            // handle success
                            if(response.data.status == 200){
                                // console.log(response.data.data)
                                advertiseStore.saveSpecifications(response.data.data);
                            }
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);

                        })
                        .finally(function () {
                            // always executed
                        });
                }
            })
        })

        watch(computed(() => advertiseStore.defaultSelectedUsage), (n) => {
            if (n) {
                selectedUsage.value = 0;
            }
        });


        return {
            selectedUsage,
            usageList,
        }
    }
}
</script>
