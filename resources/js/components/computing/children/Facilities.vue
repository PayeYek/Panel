<template>
    <section :class="'flex items-start flex-wrap justify-center max-w-[832px] mx-auto lg:gap-8 xl:gap-x-24 xl:max-w-[988px] ' + classNames">
        <div class="flex items-center flex-col text-stone-700 aspect-square group w-64 hover:bg-stone-200 transition-colors rounded px-8 pt-4 cursor-default" v-for="(facility, index) in facilities" :key="index">
            <component :is="facility.Icon" classNames="mb-4" />
            <h3 class="text-lg font-semibold mb-3"> {{ facility.title }} </h3>
            <h5 class="text-xs font-medium mb-3"> {{ facility.documentNeeded }} </h5>
            <p class="text-sm font-normal leading-6 line-clamp-3 text-center h-[72px]"> {{ facility.needs }} </p>
        </div>
    </section>
</template>

<script>
import Identification from './Icons/Identification.vue';
import Authentication from './Icons/Authentication.vue';
import Location from './Icons/Location.vue';
import Bank from './Icons/Bank.vue';
import Jobs from './Icons/Jobs.vue';
import Residence from './Icons/Residence.vue';

export default {
    name: 'Facilities',
    components: {
        Identification,
        Authentication,
        Location,
        Bank,
        Jobs,
        Residence,
    },
    props: {
        classNames: String,
    },
    setup(){
        const facilities = [
            {
                Icon: Identification,
                title: "مدارک شناسایی",
                documentNeeded: "(متقاضی / ضامنین)",
                needs: "تصاویر برابر اصل شده کلیه صفحات شناسنامه و کارت ملی",
            },
            {
                Icon: Authentication,
                title: "مدارک هویتی",
                documentNeeded: "(متقاضی / ضامنین)",
                needs: "مستندات ثبت نامی در سامانه های ثنا و سخا و اصل گواهی امضا",
            },
            {
                Icon: Location,
                title: "مدارک سکونتی",
                documentNeeded: "(متقاضی)",
                needs: "تصاویر برابر اصل شده سند مالکیت یا اجاره نامه محل سکونت و اصل قبض آب یا برق",
            },
            {
                Icon: Bank,
                title: "مدارک بانکی",
                documentNeeded: "(متقاضی)",
                needs: "دسته چک صیادی، پرینت گردش حساب 3 ماه و معدل حساب بانکی",
            },
            {
                Icon: Jobs,
                title: "مدارک شغلی",
                documentNeeded: "(متقاضی / ضامنین)",
                needs: "تصویر و پرینت کارت هوشمند، 10 بارنامه اخیر، سند مالکیت خودرو یا محل و جواز کسب",
            },
            {
                Icon: Residence,
                title: "فرم ها و قرارداد ها",
                documentNeeded: "(متقاضی)",
                needs: "قرارداد خرید اقساطی، مبایعه نامه و فرم مبارزه با پولشویی",
            },
        ];

        return {
            facilities,
        }
    }
}
</script>
