<template>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 default_container">
        <section class="flex flex-col">
            <p class="text-lg font-medium text-normal mb-4"> محاسبه گر اقساط </p>
            <!-- vehicle price amount -->
            <section class="mb-8 lg:mb-14">
                <p class="text-sm pr-4 font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2"> ارزش وسیله نقلیه </p>
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
                    <p> {{ loanInitialValue }} <span class="text-xs"> میلیون تومان </span> </p>
                    <p> {{ loanMax }} <span class="text-xs"> میلیون تومان </span> </p>
                </div>
            </section>

            <!-- discount percent -->
            <section class="mb-8 lg:mb-14">
                <div class="flex items-center gap-2 pr-4 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2">
                    <span class="text-sm font-medium text-stone-700"> میزان وام درخواستی </span>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 fill-[#599CFF] -scale-x-100 cursor-pointer">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <section class="flex_center lg:gap-4 gap-2 text-stone-700 text-sm font-normal">
                    <div>
                        <input type="radio" value="40" v-model="percentage" name="percentage" id="fourty" class="hidden peer" />
                        <label for="fourty" class="h-12 rounded-custom w-20 peer-checked:w-28 sm:w-32 sm:peer-checked:w-40 cursor-pointer lg:w-32 lg:peer-checked:w-40 border flex_center border-stone-400 bg-white peer-checked:border-[#599CFF] peer-checked:bg-[#EEF5FF] peer-checked:font-medium"> 40% </label>
                    </div>
                    <div>
                        <input type="radio" value="50" v-model="percentage" name="percentage" id="fifty" class="hidden peer" />
                        <label for="fifty" class="h-12 rounded-custom w-20 peer-checked:w-28 sm:w-32 sm:peer-checked:w-40 cursor-pointer lg:w-32 lg:peer-checked:w-40 border flex_center border-stone-400 bg-white peer-checked:border-[#599CFF] peer-checked:bg-[#EEF5FF] peer-checked:font-medium"> 50% </label>
                    </div>
                    <div>
                        <input type="radio" value="60" v-model="percentage" name="percentage" id="sixty" class="hidden peer" />
                        <label for="sixty" class="h-12 rounded-custom w-20 peer-checked:w-28 sm:w-32 sm:peer-checked:w-40 cursor-pointer lg:w-32 lg:peer-checked:w-40 border flex_center border-stone-400 bg-white peer-checked:border-[#599CFF] peer-checked:bg-[#EEF5FF] peer-checked:font-medium"> 60% </label>
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
                    <p class="text-stone-500"> مبلغ تسهیلات: </p>
                    <p class="text-stone-700"> تومان </p>
                </div>
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
                <ul class="list-disc list-inside text-stone-700 text-sm font-normal">
                    <li class="mb-1.5 last:mb-0"> قیمت ها به تومان می باشد. </li>
                    <li class="mb-1.5 last:mb-0"> هزینه عملیات بدون ارزش افزوده محاسبه گردیده است. </li>
                    <li class="mb-1.5 last:mb-0"> سود اقساط شما معادل نرخ مصوب بانک مرکزی یعنی 23 درصد است. </li>
                </ul>
            </section>
        </section>
    </section>
</template>

<script>
import { ref, computed } from 'vue';


export default {
    name: 'Calculator',
    props: {
        list: Array,
    },
    setup() {
        const selectedProduct = ref("");
        const loanSteps = ref(1);
        const loanMin = ref(10);
        const loanMax = ref(100);
        const loanInitialValue = ref(20);
        const percentage = ref(50);
        const initialMonth = ref(24);
        // const monthlySteps = ref(1);
        // const monthlyMin = ref(1);
        // const monthlyMax = ref(36);
        // const monthlyInitialValue = ref(6);
        // const loanInitalPerMonth = ref(0);
        // const loanInitalTotal = ref(0);

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

        const calculateDeposite = (e) => {
        }

        return {
            selectedProduct,
            loanSteps,
            loanMin,
            loanMax,
            loanInitialValue,
            percentage,
            initialMonth,
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