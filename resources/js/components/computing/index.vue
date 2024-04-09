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
                                <label for="12monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium duration-200">
                                    <span> 12 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="24" v-model="paymentDuration" name="paymentDuration" id="24monthes" class="hidden peer" />
                                <label for="24monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium duration-200">
                                    <span> 24 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="36" v-model="paymentDuration" name="paymentDuration" id="36monthes" class="hidden peer" />
                                <label for="36monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium duration-200">
                                    <span> 36 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="48" v-model="paymentDuration" name="paymentDuration" id="48monthes" class="hidden peer" />
                                <label for="48monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium duration-200">
                                    <span> 48 </span>
                                    <span class="hidden sm:block"> ماهه </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="60" v-model="paymentDuration" name="paymentDuration" id="60monthes" class="hidden peer" />
                                <label for="60monthes" class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-stone-950 peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium duration-200">
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
                <section class="bg-stone-200 text-sm font-normal rounded-b-custom lg:rounded-t-custom px-4 py-6 lg:py-12 lg:px-10">
                    <div class="flex_between mb-4 lg:mb-6">
                        <p class="text-base lg:text-lg font-medium text-stone-700"> نتیجه محاسبه </p>
                        <p class="text-sm text-[#1EA0FF] border-b-2 border-b-transparent hover:border-b-[#1EA0FF] border-dashed font-medium cursor-pointer" @click="moreInfoStateToggler"> اطلاعات بیشتر </p>
                    </div>
                    <ul class="list-none text-[#90A4AE] mb-6">
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p class=""> مبلغ خالص تسهیلات دریافتی </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> {{ numberWithCommas(fund) }} </p>
                                <p class=""> تومان </p>
                            </div>
                        </li>
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p class=""> مبلغ هر قسط (فواصل دو ماهه) </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> {{ numberWithCommas(loanPerMonth) }} </p>
                                <p class=""> تومان </p>
                            </div>
                        </li>
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p class=""> مبلغ کل بازپرداخت </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> {{ numberWithCommas(refund) }} </p>
                                <p class=""> تومان </p>
                            </div>
                        </li>
                    </ul>
                    <button class="text-lg font-medium mx-auto bg-normal cursor-pointer rounded-custom text-white flex_center h-12 px-10 lg:px-14 xl:px-20" type="button"> درخواست مشاوره </button>
                </section>
            </section>

            <!-- modal layer -->
            <div class="fixed inset-0 bg-[#ABABAB]/40 z-[5] backdrop-blur-2xl" v-show="moreInfoState" @click="moreInfoStateToggler"></div>

            <!-- modal content -->
            <section class="flex flex-col bg-white sm:rounded-custom fixed top-0 drop-shadow-base right-0 w-full h-full sm:h-auto sm:max-w-[36rem] md:max-w-[40rem] lg:max-w-[44rem] sm:top-1/2 sm:right-1/2 sm:translate-x-1/2 sm:-translate-y-1/2 z-[6] overflow-hidden" v-show="moreInfoState">
                <!-- title -->
                <div
                    class="w-full py-10 text-xl font-bold text-stone-700 lg:text-2xl flex_center relative">
                    <p> ارتباط با کارشناسان فروش </p>
                    <!-- close btn -->
                    <div @click="moreInfoStateToggler" class="size-7 rounded-full bg-stone-200 flex_center cursor-pointer absolute top-4 left-4">
                        <svg class="size-5 stroke-stone-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <form action="#" method="#" class="flex flex-col items-center px-5 pb-10">
                    <p class="mb-6 text-base font-normal leading-7 text-center text-stone-700"> جهت ارتباط و اطلاع از
                        شرایط فروش شماره خود را وارد کنید. </p>
                    <input name="phone" type="tel"
                        class="bg-white mb-5 max-w-64 h-11 border border-[#CFD1D4] focus:border-[#CFD1D4] focus:ring-0 rounded-custom outline-none w-full placeholder:text-[#acacac] text-base font-normal px-3 text-stone-700 tracking-widest"
                        placeholder="09" />
                    <button type="submit"
                        class="w-full text-base font-medium text-white rounded-custom flex_center max-w-64 h-11 bg-normal hover:bg-focus focus:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                        ارسال </button>
                </form>
            </section>
        </section>
    </section>
</template>

<script>
import { ref, computed, watchEffect } from 'vue';
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
        const fund = ref(0);
        const loanPerMonth = ref(0);
        const refund = ref(0);
        const wage = ref(9.735);
        const moreInfoState = ref(false);

        // console.log(wage.value);
        

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

        // if(paymentDuration.value == 12){
        //     wage.value = 5.64;
        // } else if(paymentDuration.value == 24){
        //     wage.value = 9.735;
        // } else if(paymentDuration.value == 36){
        //     wage.value = 13.225;
        // } else if(paymentDuration.value == 48){
        //     wage.value = 16.19;
        // } else if(paymentDuration.value == 60){
        //     wage.value = 18.69;
        // }

        // const calculateFund = () => {
        //     if(paymentDuration.value == 12){
        //         wage.value = 5.64;
        //     } else if(paymentDuration.value == 24){
        //         wage.value = 9.735;
        //     } else if(paymentDuration.value == 36){
        //         wage.value = 13.225;
        //     } else if(paymentDuration.value == 48){
        //         wage.value = 16.19;
        //     } else if(paymentDuration.value == 60){
        //         wage.value = 18.69;
        //     }
        //     loanInitialValue.value = parseInt(loanInitialValue.value);
        //     const fullNumber = (loanInitialValue.value - (loanInitialValue.value * wage.value) / 100);
        //     fund.value = Math.floor(fullNumber / 1000) * 1000;
        // }
        
        // const calculatePerMonth = () => {
        //     if(paymentDuration.value == 12){
        //         wage.value = 5.64;
        //     } else if(paymentDuration.value == 24){
        //         wage.value = 9.735;
        //     } else if(paymentDuration.value == 36){
        //         wage.value = 13.225;
        //     } else if(paymentDuration.value == 48){
        //         wage.value = 16.19;
        //     } else if(paymentDuration.value == 60){
        //         wage.value = 18.69;
        //     }
        //     loanInitialValue.value = parseInt(loanInitialValue.value);
        //     const fullNumber = parseInt(loanInitialValue.value / (paymentDuration.value / 2));
        //     loanPerMonth.value = Math.floor(fullNumber / 1000) * 1000;
        // }

        // const calculateRefund = () => {
        //     if(paymentDuration.value == 12){
        //         wage.value = 5.64;
        //     } else if(paymentDuration.value == 24){
        //         wage.value = 9.735;
        //     } else if(paymentDuration.value == 36){
        //         wage.value = 13.225;
        //     } else if(paymentDuration.value == 48){
        //         wage.value = 16.19;
        //     } else if(paymentDuration.value == 60){
        //         wage.value = 18.69;
        //     }
        //     loanInitialValue.value = parseInt(loanInitialValue.value);
        //     const fullNumber = (loanInitialValue.value + (loanInitialValue.value * wage.value) / 100);
        //     refund.value = Math.floor(fullNumber / 1000) * 1000;
        // }

        const moreInfoStateToggler = () => {
            moreInfoState.value = !moreInfoState.value;
        }

        const calculateValues = () => {
            loanInitialValue.value = parseInt(loanInitialValue.value);
            const wageMap = {
                12: 5.64,
                24: 9.735,
                36: 13.225,
                48: 16.19,
                60: 18.69
            };

            const wageValue = wageMap[paymentDuration.value];
            wage.value = wageValue;

            const fullNumber = loanInitialValue.value - (loanInitialValue.value * wageValue) / 100;
            fund.value = Math.floor(fullNumber / 1000) * 1000;

            const perMonthFullNumber = parseInt(loanInitialValue.value / (paymentDuration.value / 2));
            loanPerMonth.value = Math.floor(perMonthFullNumber / 1000) * 1000;

            const refundFullNumber = loanInitialValue.value + (loanInitialValue.value * wageValue) / 100;
            refund.value = Math.floor(refundFullNumber / 1000) * 1000;
        };

        watchEffect(() => {
            calculateValues();
        });

        // watchEffect(() => {
        //     calculateFund();
        //     calculatePerMonth();
        //     calculateRefund();
        // })

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
            fund,
            loanPerMonth,
            refund,
            moreInfoState,
            moreInfoStateToggler,
        }
    }
}
</script>