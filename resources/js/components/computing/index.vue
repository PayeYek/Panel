<template>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 default_container">
        <section class="flex flex-col">
            <p class="text-lg font-medium text-normal mb-4"> محاسبه گر اقساط </p>
            <!-- vehicle price amount -->
            <section class="mb-8 lg:mb-14">
                <p class="text-sm pr-4 font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2"> مبلغ تسهیلات </p>
                <div class="w-full h-12 mb-6 rounded-custom bg-stone-200 font-medium text-sm flex_between px-6">
                    <!-- decrease -->
                    <button type="button" :class="'p-1 cursor-pointer stroke-stone-700 ' + (loanInitialValue > loanMin ? '' : 'opacity-40 pointer-events-none')" @click="loanOrder('minus')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                        <span class="sr-only"> decrease </span>
                    </button>
                    <p> {{ numberWithCommas(loanInitialValue) }} </p>
                    <!-- increase -->
                    <button type="button" :class="'p-1 cursor-pointer stroke-stone-700 ' + (loanInitialValue < loanMax ? '' : 'opacity-40 pointer-events-none')" @click="loanOrder('plus')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span class="sr-only"> increase </span>
                    </button>
                </div>
                <div class="h-2 w-full bg-stone-200 rounded-full mb-4 relative">
                    <input
                        :style="{ background: priceSliderBackground }"
                        type="range" class="dir-rtl absolute top-0.5 inset-x-0.5 range__input"
                        :min="loanMin"
                        :max="loanMax"
                        :value="loanInitialValue"
                        v-model="loanInitialValue"
                        :step="loanSteps"
                        @change="calculateDeposite" />
                </div>
                <div class="text-sm font-normal flex items-center justify-between mb-4 text-stone-700">
                    <p> {{ loanInitialValue < 200000000 ? 'کمتر از تسهیلات' : `${numberWithCommas(loanInitialValue)} تومان` }} </p>
                    <p> {{ numberWithCommas(loanMax) }} <span class="text-xs"> تومان </span> </p>
                </div>
            </section>

            <!-- discount percent -->
            <section class="mb-8 lg:mb-14">
                <p class="text-sm pr-4 font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2"> نوع خودرو </p>

                <section class="flex_center lg:gap-4 gap-2 text-stone-700 text-sm font-normal">
                    <div>
                        <input type="radio" value="internal" v-model="manufacture" name="manufacture" id="internal" class="hidden peer" />
                        <label for="internal" class="h-12 rounded-custom w-20 peer-checked:w-28 sm:w-32 sm:peer-checked:w-40 cursor-pointer lg:w-32 lg:peer-checked:w-40 border flex_center border-stone-400 bg-white peer-checked:border-[#599CFF] peer-checked:bg-[#EEF5FF] peer-checked:font-medium"> داخلی </label>
                    </div>
                    <div>
                        <input type="radio" value="chinese" v-model="manufacture" name="manufacture" id="chinese" class="hidden peer" />
                        <label for="chinese" class="h-12 rounded-custom w-20 peer-checked:w-28 sm:w-32 sm:peer-checked:w-40 cursor-pointer lg:w-32 lg:peer-checked:w-40 border flex_center border-stone-400 bg-white peer-checked:border-[#599CFF] peer-checked:bg-[#EEF5FF] peer-checked:font-medium"> چینی </label>
                    </div>
                    <div>
                        <input type="radio" value="european" v-model="manufacture" name="manufacture" id="European" class="hidden peer" />
                        <label for="European" class="h-12 rounded-custom w-20 peer-checked:w-28 sm:w-32 sm:peer-checked:w-40 cursor-pointer lg:w-32 lg:peer-checked:w-40 border flex_center border-stone-400 bg-white peer-checked:border-[#599CFF] peer-checked:bg-[#EEF5FF] peer-checked:font-medium"> اروپایی </label>
                    </div>
                </section>
            </section>

            <!-- monthes -->
            <section class="mb-8 lg:mb-14 text-stone-700">
                <p class="text-sm pr-4 font-medium mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2"> مدت زمان بازگشت وجه </p>
                <select class="w-full h-12 rounded-custom bg-stone-200 border-0 focus:ring-0 outline-none !pr-6 font-normal text-sm" v-model="initialMonth">
                    <option value="12"> 12 قسط </option>
                    <option value="24"> 24 قسط </option>
                    <option value="36"> 36 قسط </option>
                    <option value="48"> 48 قسط </option>
                    <option value="60"> 60 قسط </option>
                </select>
            </section>

            <!-- calculate -->
            <button class="text-lg font-normal mx-auto bg-normal cursor-pointer rounded-custom text-white flex_center h-12 w-52" type="button"> محاسبه کن </button>
        </section>

        <!-- total -->
        <section>
            <section class="bg-[#EEF5FF] text-sm font-normal rounded-custom px-4 py-6 lg:py-14 lg:px-10">
                <p class="text-lg font-medium text-stone-700 mb-4 lg:mb-6"> نتیجه محاسبه </p>
                <div class="flex_between border bg-white border-stone-400 rounded-custom w-full h-12 pr-2 pl-6 mb-2 lg:mb-4">
                    <p class="text-stone-500"> مبلغ هر قسط: </p>
                    <p class="text-stone-700"> تومان </p>
                </div>
                <div class="flex_between border bg-white border-stone-400 rounded-custom w-full h-12 pr-2 pl-6 mb-2 lg:mb-4">
                    <p class="text-stone-500"> وثیقه: </p>
                    <p class="text-stone-700"> تومان </p>
                </div>
                <div class="flex_between border bg-white border-stone-400 rounded-custom w-full h-12 pr-2 pl-6 mb-2 lg:mb-4">
                    <p class="text-stone-500"> نرخ موثر: </p>
                    <p class="text-stone-700"> تومان </p>
                </div>
                <div class="flex_between border bg-white border-stone-400 rounded-custom w-full h-12 pr-2 pl-6 mb-8 lg:mb-12">
                    <p class="text-stone-500"> هزینه عملیات: </p>
                    <p class="text-stone-700"> تومان </p>
                </div>
                <ul class="list-disc list-inside text-stone-700 text-sm font-normal mb-4">
                    <li class="mb-2 last:mb-0"> مبلغ تسهیلات 40 تا 60 درصد ارزش وسیله نقلیه می باشد. </li>
                    <li class="mb-2 last:mb-0"> هزینه عملیات بدون ارزش افزوده محاسبه گردیده است. </li>
                    <li class="mb-2 last:mb-0"> سود اقساط شما معادل نرخ مصوب بانک مرکزی یعنی 23 درصد است. </li>
                </ul>
                <form action="#" class="border-2 border-white rounded-custom py-4 sm:py-6 sm:px-12 px-6 flex flex-col items-center">
                    <p class="text-center text-sm font-medium text-normal mb-2 lg:mb-4"> جهت مشاوره و خرید شماره خود را وارد کنید: </p>
                    <input type="tel" class="w-full max-w-64 mx-auto h-12 rounded-custom bg-white border border-stone-400 focus:border-stone-400 mb-4 tracking-widest focus:ring-0 outline-none placeholder:text-[#8A8B8C] px-3" placeholder="0912" />
                    <button class="w-full max-w-64 mx-auto h-12 rounded-custom border font-medium text-base border-normal text-normal hover:bg-normal hover:text-white duration-200" type="submit"> ثبت </button>
                </form>
            </section>
        </section>
    </section>
</template>

<script>
import { ref, computed } from 'vue';
import { numberWithCommas } from '../../common';
// import {  } from '';


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
        const manufacture = ref("internal");
        const initialMonth = ref(24);
        // const monthlySteps = ref(1);
        // const monthlyMin = ref(1);
        // const monthlyMax = ref(36);
        // const monthlyInitialValue = ref(6);
        // const loanInitalPerMonth = ref(0);
        // const loanInitalTotal = ref(0);

        // console.log(numberWithCommas(1523654));

        const generatePriceBackground = (value) => {
            let percentage = (value - loanMin.value) / (loanMax.value - loanMin.value) * 100;
            return `linear-gradient(to left, #599CFF ${percentage}%, transparent ${percentage}%)`;
        };

        // const generateMonthBackground = (value) => {
        //     let percentage = (value - monthlyMin.value) / (monthlyMax.value - monthlyMin.value) * 100;
        //     return `linear-gradient(to left, #878787 ${percentage}%, #d2d2d2 ${percentage}%)`;
        // };

        const priceSliderBackground = computed(() => generatePriceBackground(loanInitialValue.value));
        // const monthSliderBackground = computed(() => generateMonthBackground(monthlyInitialValue.value));

        const loanOrder = (payload) => {
            if (loanInitialValue.value < loanMax.value && payload === 'plus') {
                loanInitialValue.value += loanSteps.value
            } else if(loanInitialValue.value > loanMin.value && payload === 'minus') {
                loanInitialValue.value -= loanSteps.value
            }
        }

        const calculateDeposite = (e) => {
        }

        return {
            selectedProduct,
            loanSteps,
            loanMin,
            loanMax,
            loanInitialValue,
            manufacture,
            initialMonth,
            numberWithCommas,
            loanOrder,
            // monthlySteps,
            // monthlyMin,
            // monthlyMax,
            // monthlyInitialValue,
            calculateDeposite,
            // loanInitalPerMonth,
            // loanInitalTotal,
            priceSliderBackground,
            // monthSliderBackground,
        }
    }
}
</script>