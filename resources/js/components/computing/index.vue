<template>
    <section class="default_container mt-12">
        <p class="text-lg lg:text-2xl font-medium text-stone-700 mb-4"> محاسبه گر اقساط </p>
        <section class="grid grid-cols-1 lg:grid-cols-10 gap-5 border border-stone-200 rounded-custom">
            <section class="lg:col-span-6 p-6">
                <section class="flex flex-col max-w-[33rem] w-full mx-auto">
                    <!-- vehicle price amount -->
                    <section class="mb-8 lg:mb-14">
                        <p class="text-sm pr-4 font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2"> میزان وام درخواستی </p>
                        <div class="w-full h-12 mb-6 rounded-custom bg-stone-200 font-medium text-sm flex_between px-6">
                            <!-- decrease -->
                            <button type="button" :class="'p-1 cursor-pointer stroke-stone-950 ' + (loanInitialValue > loanMin ? '' : 'opacity-40 pointer-events-none')" @click="loanOrder('minus')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                                <span class="sr-only"> decrease </span>
                            </button>
                            <p class="text-stone-950 lg:text-xl font-medium text-lg"> {{ numberWithCommas(loanInitialValue) }} </p>
                            <!-- increase -->
                            <button type="button" :class="'p-1 cursor-pointer stroke-stone-950 ' + (loanInitialValue < loanMax ? '' : 'opacity-40 pointer-events-none')" @click="loanOrder('plus')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <span class="sr-only"> increase </span>
                            </button>
                        </div>
                        <div class="h-2 w-full bg-stone-200 rounded-full mb-4 relative">
                            <input
                                :style="{ background: priceSliderBackground }"
                                type="range" class="dir-rtl absolute top-0.5 inset-x-0.5 range__input rounded-full"
                                :min="loanMin"
                                :max="loanMax"
                                :value="loanInitialValue"
                                v-model="loanInitialValue"
                                :step="loanSteps" />
                        </div>
                        <div class="text-sm font-normal flex items-center justify-between mb-4 text-stone-700">
                            <p> 200 میلیون تومان </p>
                            <p> 3 میلیارد تومان </p>
                        </div>
                    </section>
        
                    <!-- payment duration -->
                    <section>
                        <p class="text-sm pr-4 font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2"> مدت زمان بازپرداخت <span class="sm:hidden text-stone-700 text-xs font-medium"> (ماهه) </span> </p>
        
                        <section class="flex_center gap-2 text-stone-700 text-sm font-normal">
                            <div>
                                <input type="radio" value="12" v-model="paymentDuration" name="paymentDuration" id="12monthes" class="hidden peer" />
                                <label for="12monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium">
                                    <span> 12 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="24" v-model="paymentDuration" name="paymentDuration" id="24monthes" class="hidden peer" />
                                <label for="24monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium">
                                    <span> 24 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="36" v-model="paymentDuration" name="paymentDuration" id="36monthes" class="hidden peer" />
                                <label for="36monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium">
                                    <span> 36 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="48" v-model="paymentDuration" name="paymentDuration" id="48monthes" class="hidden peer" />
                                <label for="48monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium">
                                    <span> 48 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="60" v-model="paymentDuration" name="paymentDuration" id="60monthes" class="hidden peer" />
                                <label for="60monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium">
                                    <span> 60 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                        </section>
                    </section>
        
                    <!-- monthes -->
                    <!-- <section class="mb-8 lg:mb-14 text-stone-700">
                        <p class="text-sm pr-4 font-medium mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2"> مدت زمان بازگشت وجه </p>
                        <select class="w-full h-12 rounded-custom bg-stone-200 border-0 focus:ring-0 outline-none !pr-6 font-normal text-sm" v-model="initialMonth">
                            <option value="12"> 12 قسط </option>
                            <option value="24"> 24 قسط </option>
                            <option value="36"> 36 قسط </option>
                            <option value="48"> 48 قسط </option>
                            <option value="60"> 60 قسط </option>
                        </select>
                    </section> -->
        
                    <!-- calculate -->
                    <!-- <button class="text-lg font-normal mx-auto bg-normal cursor-pointer rounded-custom text-white flex_center h-12 w-52" type="button"> محاسبه کن </button> -->
                </section>
            </section>
    
            <!-- total -->
            <section class="lg:col-span-4">
                <section class="bg-stone-200 text-sm font-normal rounded-b-custom px-4 py-6 lg:py-12 lg:px-10">
                    <div class="flex_between mb-4 lg:mb-6">
                        <p class="text-base lg:text-lg font-medium text-stone-700"> نتیجه محاسبه </p>
                        <p class="text-sm text-[#1EA0FF] border-b-2 border-b-transparent hover:border-b-[#1EA0FF] border-dashed font-medium cursor-pointer"> اطلاعات بیشتر </p>
                    </div>
                    <ul class="list-none text-[#90A4AE] mb-6">
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p class=""> مبلغ خالص تسهیلات دریافتی </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> 0000 </p>
                                <p class=""> تومان </p>
                            </div>
                        </li>
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p class=""> مبلغ هر قسط (فواصل دو ماهه) </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> 0000 </p>
                                <p class=""> تومان </p>
                            </div>
                        </li>
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p class=""> مبلغ کل بازپرداخت </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> 0000 </p>
                                <p class=""> تومان </p>
                            </div>
                        </li>
                    </ul>
                    <button class="text-lg font-medium mx-auto bg-normal cursor-pointer rounded-custom text-white flex_center h-12 px-10 lg:px-14 xl:px-20" type="button"> درخواست مشاوره </button>
                </section>
            </section>
        </section>
    </section>
</template>

<script>
import { ref, computed } from 'vue';
import { numberWithCommas } from '../../common';


export default {
    name: 'Calculator',
    props: {
        list: Array,
    },
    setup() {
        const selectedProduct = ref("");
        const loanSteps = ref(100000000);
        const loanMin = ref(200000000);
        const loanMax = ref(3000000000);
        const loanInitialValue = ref(400000000);
        const paymentDuration = ref(24);
        

        const generatePriceBackground = (value) => {
            let percentage = (value - loanMin.value) / (loanMax.value - loanMin.value) * 100;
            return `linear-gradient(to left, #1A1B1D ${percentage}%, transparent ${percentage}%)`;
        };

        const priceSliderBackground = computed(() => generatePriceBackground(loanInitialValue.value));

        const loanOrder = (payload) => {
            if (loanInitialValue.value < loanMax.value && payload === 'plus') {
                loanInitialValue.value = parseInt(loanInitialValue.value);
                loanInitialValue.value += loanSteps.value;
            } else if(loanInitialValue.value > loanMin.value && payload === 'minus') {
                loanInitialValue.value -= loanSteps.value;
            }
        }

        return {
            selectedProduct,
            loanSteps,
            loanMin,
            loanMax,
            loanInitialValue,
            paymentDuration,
            numberWithCommas,
            loanOrder,
            priceSliderBackground,
        }
    }
}
</script>