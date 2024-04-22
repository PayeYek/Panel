<template>
    <div class="flex_center flex-col gap-2 md:flex-row lg:gap-4">
        <div class="text-lg font-medium text-white cursor-pointer rounded-custom bg-stone-700 hover:bg-stone-800 flex_center h-11 w-52"
            @click="OpenModal"> مشاوره و خرید </div>
        <Link :href="catalogLink"
            class="text-lg font-medium bg-white border cursor-pointer rounded-custom text-stone-700 border-stone-700 hover:text-stone-800 hover:border-stone-800 flex_center h-11 w-52">
        دانلود کاتالوگ </Link>
    </div>

    <!-- modal layer -->
    <div class="fixed inset-0 bg-[#ABABAB]/40 z-[5] backdrop-blur-2xl" v-if="showModal" @click="closeModal"></div>

    <!-- modal content -->
    <section v-if="showModal"
        class="fixed overflow-auto top-0 right-0 w-full h-full sm:h-auto sm:max-w-[36rem] md:max-w-[40rem] lg:max-w-4xl xl:max-w-5xl sm:top-1/2 sm:right-1/2 sm:translate-x-1/2 sm:-translate-y-1/2 z-[6] sm:overflow-hidden">
        <!-- calculator -->
        <section class="grid grid-cols-1 lg:grid-cols-10 gap-5 drop-shadow-smooth bg-white rounded-custom relative"
            v-if="counselingStep == 0">
            <div @click="closeModal"
                class="absolute top-4 left-4 size-7 rounded-full bg-stone-400/50 flex_center cursor-pointer">
                <svg class="size-5 stroke-stone-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="current" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <section class="lg:col-span-6 p-6">
                <section class="flex flex-col max-w-[33rem] w-full mx-auto">
                    <!-- vehicle price amount -->
                    <section class="mb-8 lg:mb-14">
                        <p
                            class="text-sm pr-4 font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2">
                            میزان وام درخواستی </p>
                        <div class="w-full h-12 mb-6 font-medium text-sm flex_between px-6">
                            <!-- decrease -->
                            <button type="button"
                                :class="'p-2 cursor-pointer text-[#1EA0FF] ' + (loanInitialValue > loanMin ? '' : 'opacity-40 pointer-events-none')"
                                @click="loanOrder('minus')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                                <span class="sr-only"> decrease </span>
                            </button>
                            <p class="text-stone-950 lg:text-3xl font-medium text-xl sm:text-2xl">
                                {{ numberWithCommas(loanInitialValue) }}
                                <span class="hidden sm:inline-block"> تومان </span>
                            </p>
                            <!-- increase -->
                            <button type="button"
                                :class="'p-2 cursor-pointer text-[#1EA0FF] ' + (loanInitialValue < loanMax ? '' : 'opacity-40 pointer-events-none')"
                                @click="loanOrder('plus')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <span class="sr-only"> increase </span>
                            </button>
                        </div>
                        <div class="h-2 w-full bg-stone-200 rounded-full mb-4 relative">
                            <input :style="{ background: priceSliderBackground }" type="range"
                                class="dir-rtl absolute top-0.5 inset-x-0.5 range__input rounded-full" :min="loanMin"
                                :max="loanMax" :value="loanInitialValue" v-model="loanInitialValue" :step="loanSteps" />
                        </div>
                        <div class="text-sm font-normal flex items-center justify-between mb-4 text-stone-700">
                            <p> 200 میلیون تومان </p>
                            <p> 3 میلیارد تومان </p>
                        </div>
                    </section>

                    <!-- payment duration -->
                    <section>
                        <p
                            class="text-sm pr-4 font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2">
                            مدت زمان بازپرداخت <span class="sm:hidden text-stone-700 text-sm font-normal"> (سال)
                            </span> </p>

                        <section class="flex_center gap-2 text-stone-700 text-base font-normal">
                            <div>
                                <input type="radio" value="12" v-model="paymentDuration" name="paymentDuration"
                                    id="12monthes" class="hidden peer" />
                                <label for="12monthes"
                                    class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                    <span> 1 </span>
                                    <span class="hidden sm:block"> ساله </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="24" v-model="paymentDuration" name="paymentDuration"
                                    id="24monthes" class="hidden peer" />
                                <label for="24monthes"
                                    class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                    <span> 2 </span>
                                    <span class="hidden sm:block"> ساله </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="36" v-model="paymentDuration" name="paymentDuration"
                                    id="36monthes" class="hidden peer" />
                                <label for="36monthes"
                                    class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                    <span> 3 </span>
                                    <span class="hidden sm:block"> ساله </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="48" v-model="paymentDuration" name="paymentDuration"
                                    id="48monthes" class="hidden peer" />
                                <label for="48monthes"
                                    class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                    <span> 4 </span>
                                    <span class="hidden sm:block"> ساله </span>
                                </label>
                            </div>
                            <div>
                                <input type="radio" value="60" v-model="paymentDuration" name="paymentDuration"
                                    id="60monthes" class="hidden peer" />
                                <label for="60monthes"
                                    class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                    <span> 5 </span>
                                    <span class="hidden sm:block"> ساله </span>
                                </label>
                            </div>
                        </section>
                    </section>
                </section>
            </section>

            <!-- total -->
            <section class="lg:col-span-4 bg-stone-200 rounded-b-custom lg:rounded-t-custom">
                <section class="text-sm font-normal px-4 py-6 lg:py-12 lg:px-10">
                    <div class="flex_between mb-4 lg:mb-6">
                        <p class="text-base lg:text-lg font-medium text-stone-700"> نتیجه محاسبه </p>
                        <p class="text-sm text-[#1EA0FF] border-b-2 border-b-transparent hover:border-b-[#1EA0FF] border-dashed font-medium cursor-pointer"
                            @click="trueInformationState"> اطلاعات بیشتر </p>
                    </div>
                    <ul class="list-none text-[#90A4AE] mb-6">
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p> مبلغ هر قسط </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> {{ numberWithCommas(loanPerMonth) }} </p>
                                <p> تومان </p>
                            </div>
                        </li>
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p> مدت زمان بازپرداخت </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> {{ paymentDuration }} ماهه </p>
                                <p> تومان </p>
                            </div>
                        </li>
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p class=""> مبلغ کل بازپرداخت </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> {{ numberWithCommas(refund) }} </p>
                                <p class=""> تومان </p>
                            </div>
                        </li>
                        <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                            <p> خالص تسهیلات دریافتی </p>
                            <div class="flex_row gap-2 sm:gap-4">
                                <p class="text-stone-950"> {{ numberWithCommas(fund) }} </p>
                                <p class=""> تومان </p>
                            </div>
                        </li>
                    </ul>
                    <button
                        class="text-lg font-medium mx-auto bg-normal cursor-pointer rounded-custom text-white flex_center h-12 px-10 lg:px-14 xl:px-20"
                        type="button" @click="changeCounselingStep(1)"> درخواست مشاوره </button>
                </section>
            </section>
        </section>



        <section
            class="grid grid-cols-1 sm:grid-cols-10 gap-5 drop-shadow-smooth bg-white rounded-custom sm:rounded-custom sm:overflow-hidden relative"
            v-if="counselingStep == 1">
            <div @click="closeModal"
                class="absolute top-4 left-4 size-7 rounded-full bg-stone-200 flex_center cursor-pointer">
                <svg class="size-5 stroke-stone-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="current" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <!-- form -->
            <section class="sm:col-span-4 bg-stone-200 rounded-b-custom lg:rounded-t-custom pt-8 px-4 pb-12 lg:px-10">
                <h4
                    class="text-sm pr-4 font-medium text-stone-700 mb-2 lg:mb-5 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2">
                    تسهیلات خودروی تجاری </h4>
                <p class="text-sm lg:text-base font-normal text-stone-700 mb-6 lg:mb-8"> برای درخواست تسهیلات خودروی
                    تجاری
                    مشخصات را وارد کنید. </p>
                <form action="">
                    <div class="flex flex-col text-stone-700 gap-5 mb-9">
                        <select name="facilities" v-model="loanInitialValue"
                            class="h-11 rounded-custom border border-[#CFD1D4] focus:ring-0 outline-none focus:border-[#CFD1D4] text-sm font-normal">
                            <option value="0" selected disabled> مبلغ تسهیلات </option>
                            <option v-for="(option, index) in loanOptions" :key="index" :value="option.key">
                                {{ formatValue(option.value) }} تومان
                            </option>
                        </select>
                        <select name="vehicles"
                            class="h-11 rounded-custom border border-[#CFD1D4] focus:ring-0 outline-none focus:border-[#CFD1D4] text-sm font-normal">
                            <option value="0" selected disabled> نوع خودرو </option>
                        </select>
                        <input name="fullname" type="text"
                            class="h-11 rounded-custom border border-[#CFD1D4] focus:ring-0 outline-none focus:border-[#CFD1D4] text-sm font-normal placeholder:text-[#acacac]"
                            placeholder="نام خانوادگی" />
                        <input name="phone" type="tel"
                            class="h-11 dir-rtl rounded-custom border border-[#CFD1D4] focus:ring-0 outline-none focus:border-[#CFD1D4] text-sm font-normal placeholder:text-[#acacac]"
                            placeholder="شماره موبایل" />
                    </div>
                    <div class="flex_center sm:flex-col lg:flex-row gap-2">
                        <button type="submit"
                        class="h-11 rounded-custom bg-normal text-lg font-medium text-white flex_center w-full sm:w-32 md:w-36 lg:w-full max-w-[272px]">
                        ثبت درخواست </button>
                        <div @click="changeCounselingStep(0)" class="text-base font-medium bg-white border cursor-pointer rounded-custom text-stone-700 border-stone-700 hover:text-stone-800 hover:border-stone-800 flex_center h-11 w-32 md:w-36 lg:w-32">
                            مرحله قبل
                        </div>
                    </div>
                </form>
            </section>
            <section class="sm:col-span-6 p-6 text-stone-700 pt-6 px-4 lg:px-10 lg:pt-16">
                <h4 class="text-lg font-semibold mb-2 lg:text-2xl lg:mb-6"> دریافت تسهیلات در کوتاه ترین زمان </h4>
                <p class="text-sm font-normal leading-6 lg:leading-7 mb-8 lg:mb-0">
                    با ثبت درخواست دریافت تسهیلات جهت خرید ماشین های سنگین، کارشناسان لیزینگ اتوبان با شما تماس خواهند
                    گرفت و مراحل دریافت تسهیلات را متناسب با شرایط شما به صورت کامل به شما توضیح خواهند داد، پس از تکمیل
                    اطلاعات اولیه پروسه دریافت تسهیلات آغاز خواهد شد.
                    در صورت تکمیل مدارک از سمت شما پروسه دریافت تسهیلات به سرعت طی شده و در مدت زمان 2 هفته می توانید
                    مبلغ تسهیلات مورد نظر را دریافت نمایید.
                </p>
                <!-- icons -->
                <div class="flex items-end gap-6">
                    <FormIconOne classNames="w-full max-w-[480px] lg:max-w-80 xl:max-w-96" />
                    <FormIconTwo classNames="hidden sm:block w-72 lg:w-44 xl:w-48" />
                </div>
            </section>
        </section>
    </section>

    <!-- modal layer -->
    <div class="fixed inset-0 bg-[#ABABAB]/40 z-[6] backdrop-blur-2xl" v-show="modalState" @click="closeModalState">
    </div>

    <!-- information modal content -->
    <section
        class="flex px-4 lg:px-8 py-10 text-sm font-medium text-stone-700 flex-col bg-white sm:rounded-custom fixed top-0 drop-shadow-base right-0 w-full h-full sm:h-auto sm:max-w-[36rem] md:max-w-[40rem] lg:max-w-[44rem] sm:top-1/2 sm:right-1/2 sm:translate-x-1/2 sm:-translate-y-1/2 z-[7] overflow-hidden"
        v-show="informationState">
        <!-- close btn -->
        <div @click="closeInformationState"
            class="absolute top-4 left-4 size-7 rounded-full bg-stone-200 flex_center cursor-pointer">
            <svg class="size-5 stroke-stone-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="current" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <!-- title -->
        <p
            class="mb-4 pr-4 relative before:absolute before:top-1 before:right-0 before:size-2 before:rounded-full before:bg-normal">
            اطلاعات بیشتر </p>
        <ul class="pr-6 space-y-2 list-inside list-disc">
            <li>  تعداد چک های قابل پرداخت 7 چک </li>
            <li>  مبلغ بیمه بدنه به صورت جداگانه روی اقساط محاسبه و دریافت می شود. </li>
            <li> هزینه عملیات بدون ارزش افزوده محاسبه گردیده است. </li>
            <li> سود اقساط شما معادل نرخ مصوب بانک مرکزی یعنی 23 درصد است. </li>
        </ul>
    </section>
</template>

<script>
import { ref, computed, watchEffect, onMounted } from 'vue';
import { numberWithCommas } from '../../common';

export default {
    name: 'Counseling',
    props: {
        catalogLink: String,
    },
    setup() {
        const loanSteps = ref(100000000);
        const loanMin = ref(200000000);
        const loanMax = ref(3000000000);
        const loanInitialValue = ref(400000000);
        const paymentDuration = ref(24);
        const fund = ref(0);
        const loanPerMonth = ref(0);
        const refund = ref(0);
        const wage = ref(9.735);
        const modalState = ref(false);
        const informationState = ref(false);
        const loanOptions = ref([]);
        const showModal = ref(false);
        const counselingStep = ref(0);

        const closeModal = () => {
            showModal.value = false;
            counselingStep.value = 0;
        }

        const OpenModal = () => {
            showModal.value = true;
        }

        const generatePriceBackground = (value) => {
            let percentage = (value - loanMin.value) / (loanMax.value - loanMin.value) * 100;
            return `linear-gradient(to left, #1ea0ff ${percentage}%, transparent ${percentage}%)`;
        };

        const priceSliderBackground = computed(() => generatePriceBackground(loanInitialValue.value));

        const loanOrder = (payload) => {
            if (loanInitialValue.value < loanMax.value && payload === 'plus') {
                loanInitialValue.value = parseInt(loanInitialValue.value);
                loanInitialValue.value += loanSteps.value;
            } else if (loanInitialValue.value > loanMin.value && payload === 'minus') {
                loanInitialValue.value -= loanSteps.value;
            }
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

        const generateLoanOptions = () => {
            const start = 200;
            const end = 3000;
            const increment = 100;

            for (let value = start; value <= end; value += increment) {
                const formattedKey = String(value * 1000000).padStart(9, '0'); // Add leading zeros
                loanOptions.value.push({ key: Number(formattedKey), value: value });
            }
        };

        const formatValue = (value) => {
            const formattedValue = value < 1000 ? value : (value / 1000);
            const unit = value < 1000 ? 'میلیون' : 'میلیارد';
            return `${formattedValue.toLocaleString('fa')} ${unit}`;
        };

        const trueInformationState = () => {
            informationState.value = true;
            modalState.value = true;
        }

        onMounted(() => {
            generateLoanOptions();
        });

        const closeModalState = () => {
            modalState.value = false;
            informationState.value = false;
        }

        const closeInformationState = () => {
            informationState.value = false;
            modalState.value = false;
        }

        const changeCounselingStep = index => {
            counselingStep.value = index;
        }

        return {
            showModal,
            closeModal,
            OpenModal,
            counselingStep,
            loanOrder,
            loanInitialValue,
            loanMin,
            loanMax,
            numberWithCommas,
            priceSliderBackground,
            loanSteps,
            paymentDuration,
            trueInformationState,
            loanPerMonth,
            refund,
            fund,
            modalState,
            closeModalState,
            informationState,
            closeInformationState,
            changeCounselingStep,
            loanOptions,
            formatValue,
        }
    }
}
</script>