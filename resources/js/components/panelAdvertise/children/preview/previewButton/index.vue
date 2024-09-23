<template>
    <div>
        <button type="button" @click="moveTo(1)"
                :class="'rounded-lg shadow-sm font-medium py-2 px-4 focus:outline-none focus:ring-4 focus:ring-primary-500 transition duration-200 bg-primary-700 hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700 text-white focus:ring-primary-200 dark:focus:ring-primary-800 ' + classNames">
            ثبت پیشنویس
        </button>
    </div>
</template>

<script>
import {useAdvertise} from "@/store/panel/advertise/index.js";
import {ref, computed} from 'vue';
import {maxTextareaLimitation, minTextareaLimitation, textInputLimitation} from "@/components/helper/common.js";

export default {
    name: 'Preview Button',
    props: {
        classNames: String,
    },
    setup(){
        const advertiseStore = useAdvertise();
        const title = ref(computed(() => advertiseStore.title));
        const price = ref(computed(() => advertiseStore.price));
        const city = ref(computed(() => advertiseStore.city));
        const description = ref(computed(() => advertiseStore.description));
        const brand = ref(computed(() => advertiseStore.brand.id));
        const model = ref(computed(() => advertiseStore.model.id));

        const moveTo = step => {
            // console.log(brand.value);
            // console.log(advertiseStore.checkAllInfoFilled(), advertiseStore.checkAllSpecFilled())
            if(title.value === ""){
                advertiseStore.handleTitleError("عنوان خالیست.");
            } else if(title.value.toString().length > textInputLimitation){
                advertiseStore.handleTitleError("عنوان بیشتر از حد مجاز است.");
            } else if(title.value.toString().length <= textInputLimitation){
                advertiseStore.handleTitleError("");
            }
            if(price.value === ""){
                advertiseStore.handlePriceError("قیمت خالیست.");
            } else if(price.value.toString().length > textInputLimitation){
                advertiseStore.handlePriceError("قیمت بیشتر از حد مجاز است.");
            } else if(price.value.toString().length <= textInputLimitation){
                advertiseStore.handlePriceError("");
            }
            if(city.value == 0 || city.value === ""){
                advertiseStore.handleCityError("شهر را انتخاب کنید.");
            } else {
                advertiseStore.handleCityError("");
            }
            if(description.value.toString().length <= minTextareaLimitation){
                advertiseStore.handleDescriptionError(`توضیحات کمتر از ${minTextareaLimitation} کاراکتر می باشد.`);
            } else if(description.value.toString().length >= maxTextareaLimitation){
                advertiseStore.handleDescriptionError(`توضیحات بیشتر از ${maxTextareaLimitation} کاراکتر می باشد.`);
            } else{
                advertiseStore.handleDescriptionError("");
            }
            // console.log("brand.value => ", brand.value)
            if(brand.value == 0 || typeof brand.value === 'undefined'){
                advertiseStore.handleBrandError("برند را انتخاب کنید.");
            } else {
                advertiseStore.handleBrandError("");
            }
            if(model.value == 0 || typeof model.value === 'undefined'){
                advertiseStore.handleModelError("مدل برند را انتخاب کنید.");
            } else {
                advertiseStore.handleModelError("");
            }

            if(advertiseStore.checkAllInfoFilled() && advertiseStore.checkAllSpecFilled()){
                advertiseStore.changeStep(step);
            }
        }

        return {
            moveTo,
        }
    }
}
</script>
