<template>
    <section class="grid grid-cols-1 lg:grid-cols-10 gap-5 default_container">
        <section class="flex flex-col lg:col-span-4">
            <p class="text-lg font-medium text-stone-700 mb-4"> محاسبه اقساط </p>
            <!-- <select v-model="selectedProduct" class="mb-4">
                <option value="" selected disabled> محصول مورد نظر را انتخاب کنید </option>
                <option v-for="(product, index) in list" :key="index" :value="product.id"> {{ product.name }} </option>
            </select> -->
            <!-- range slider -->
            <section class="">
                <p class="text-sm font-medium text-stone-700 mb-4"> مبلغ مورد نظر خود را وارد کنید. </p>
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

            <!-- range slider -->
            <section class="">
                <p class="text-sm font-medium text-stone-700 mb-4"> تعداد ماه ها را وارد کنید. </p>
                <div class="flex items-center justify-between mb-4">
                    <p class="text-base font-medium text-normal"> 1 ماه </p>
                    <p class="text-xl font-medium text-normal"> {{ monthlyInitialValue }} ماهه </p>
                </div>
                
                <input
                    :style="{ background: monthSliderBackground }"
                    type="range" class="dir-rtl w-full range__input"
                    :min="monthlyMin"
                    :max="monthlyMax"
                    :value="monthlyInitialValue"
                    v-model="monthlyInitialValue"
                    :step="monthlySteps"
                    @change="calculateDeposite" />
            </section>
        </section>

        <!-- total -->
        <section class="lg:col-span-6 text-stone-700 font-medium">
            <section class="bg-stone-200 rounded-custom p-8 flex items-center justify-center gap-8">
                <div class="flex_center flex-col gap-4 border border-stone-400 rounded-custom w-40 h-28">
                    <p class="text-lg"> {{ loanInitalPerMonth }} </p>
                    <p class="text-sm"> ماهانه </p>
                </div>
                <div class="flex_center flex-col gap-4 border border-stone-400 rounded-custom w-40 h-28">
                    <p class="text-lg"> {{ loanInitalTotal }} </p>
                    <p class="text-sm"> مجموع اقساط </p>
                </div>
            </section>
        </section>
    </section>
</template>

<script>
import { ref, watch, computed } from 'vue';


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
        const monthlySteps = ref(1);
        const monthlyMin = ref(1);
        const monthlyMax = ref(36);
        const monthlyInitialValue = ref(6);
        const loanInitalPerMonth = ref(0);
        const loanInitalTotal = ref(0);

        const generatePriceBackground = (value) => {
            let percentage = (value - loanMin.value) / (loanMax.value - loanMin.value) * 100;
            return `linear-gradient(to left, #599CFF ${percentage}%, transparent ${percentage}%)`;
        };

        const generateMonthBackground = (value) => {
            let percentage = (value - monthlyMin.value) / (monthlyMax.value - monthlyMin.value) * 100;
            return `linear-gradient(to left, #878787 ${percentage}%, #d2d2d2 ${percentage}%)`;
        };

        const priceSliderBackground = computed(() => generatePriceBackground(loanInitialValue.value));
        const monthSliderBackground = computed(() => generateMonthBackground(monthlyInitialValue.value));

        const calculateDeposite = (e) => {
        }

        return {
            selectedProduct,
            loanSteps,
            loanMin,
            loanMax,
            loanInitialValue,
            monthlySteps,
            monthlyMin,
            monthlyMax,
            monthlyInitialValue,
            calculateDeposite,
            loanInitalPerMonth,
            loanInitalTotal,
            priceSliderBackground,
            monthSliderBackground,
        }
    }
}
</script>