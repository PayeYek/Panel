<template>
    <section :class="classNames" v-if="specifications">
        <h5 class="text-xl sm:text-2xl font-medium p-4 tracking-tight text-gray-900 dark:text-white rtl:font-bakh">
            مشخصات فنی را انتخاب کنید
        </h5>

        <section class="grid gap-5 grid-cols-1 lg:grid-cols-2">
            <template v-for="(spec, index) in specifications">
                <template v-if="spec.type === 'select'">
                    <label class="block group/select" :for="`select-${spec.id}`">
                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ spec.title }} <span v-if="spec.required == 1" class="text-red-500">*</span>
                        </span>
                        <div
                            class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
                            <div>
                                <select :id="`select-${spec.id}`" v-model="selectedSpecificationValues[spec.id].id" :required="spec.required != 0"
                                        class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                                    <option value="0" selected disabled>انتخاب کنید</option>
                                    <option v-for="(option, index) in spec.values" :key="index" :value="option.id">
                                        {{ option.title }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </label>
                </template>

                <template v-if="spec.type === 'input_text'">
                    <label class="block group/input" :for="`input-${spec.id}`">
                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{
                                spec.title
                            }} <span v-if="spec.required == 1" class="text-red-500">*</span> </span>
                        <div
                            class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/input:ring-1 group-focus-within/input:ring-primary-500 group-focus-within/input:border-primary-500 transition duration-200">
                            <div class="relative flex flex-1">
                                <input type="text" :id="`input-${spec.id}`" v-model="selectedSpecificationValues[spec.id].id" :required="spec.required != 0"
                                       class="min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 dark:text-white w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed rounded-[7px]"/>
                            </div>
                        </div>
                    </label>
                </template>

                <template v-if="spec.type === 'boolean'">
                    <label class="block group/select" :for="`boolean-${spec.id}`">
                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{
                                spec.title
                            }} <span v-if="spec.required == 1" class="text-red-500">*</span> </span>
                        <div
                            class="relative rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/select:ring-1 group-focus-within/select:ring-primary-500 group-focus-within/select:border-primary-500 transition duration-200">
                            <div>
                                <select :id="`boolean-${spec.id}`" v-model="selectedSpecificationValues[spec.id].id" :required="spec.required != 0"
                                        class="rounded-[7px] min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed">
                                    <option value="0" selected>
                                        ندارد
                                    </option>
                                    <option value="1">
                                        دارد
                                    </option>
                                </select>
                            </div>
                        </div>
                    </label>
                </template>

            </template>
        </section>
    </section>
</template>

<script>
import {computed, ref, watchEffect, watch} from 'vue';
import {useAdvertise} from "@/store/panel/advertise/index.js";

export default {
    name: 'Specifications',
    props: {
        classNames: String,
    },
    setup() {
        const advertiseStore = useAdvertise();
        const specifications = computed(() => advertiseStore.specifications);
        const specRefs = ref({});
        const selectedSpecificationValues = ref(computed(() => advertiseStore.selectedSpecificationValues));

        watch(() => specifications.value, n => {
            advertiseStore.emptySpecificationValues();
            console.log(n)
            if(n){
                n.forEach(spec => {
                    // console.log(spec)
                    if(spec.type === 'select' || spec.type === 'boolean'){
                        advertiseStore.initializeSpecificationValues(0, spec.required, spec.title, spec.id, spec.type);
                    } else if(spec.type === 'input_text'){
                        advertiseStore.initializeSpecificationValues("", spec.required, spec.title, spec.id, spec.type);
                    }
                });
            }
        });

        watch(() => selectedSpecificationValues.value, (n, o) => {
            // console.log(n)
        }, { deep: true });


        return {
            specifications,
            specRefs,
            selectedSpecificationValues,
        }
    }
}
</script>
