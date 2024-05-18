<template>
    <section :class="classNames">
        <h5 class="text-xl sm:text-2xl font-medium p-4 tracking-tight text-gray-900 dark:text-white rtl:font-bakh">
            مشخصات عمومی را وارد کنید
        </h5>

        <section class="grid gap-5 grid-cols-1 lg:grid-cols-2">
            <Title />

            <Price />

            <Brandmodel />

            <Statecity />

            <PrimaryImage />

            <Images />

            <Description />
        </section>
    </section>
</template>

<script>
import {useAdvertise} from "@/store/panel/advertise/index.js";
import Statecity from "@/components/panelAdvertise/children/introduction/children/statecity/index.vue";
import Title from "@/components/panelAdvertise/children/introduction/children/title/index.vue";
import Price from "@/components/panelAdvertise/children/introduction/children/price/index.vue";
import PrimaryImage from "@/components/panelAdvertise/children/introduction/children/primaryImage/index.vue";
import Images from "@/components/panelAdvertise/children/introduction/children/images/index.vue";
import Description from "@/components/panelAdvertise/children/introduction/children/description/index.vue";
import Brandmodel from "@/components/panelAdvertise/children/introduction/children/brandmodel/index.vue";

export default {
    name: 'Introduction',
    props: {
        classNames: String,
    },
    components: {
        Statecity,
        Title,
        Price,
        PrimaryImage,
        Images,
        Description,
        Brandmodel,
    },
    setup(){
    }
}
</script>
