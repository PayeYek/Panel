<template>
    <section class="mb-6 lg:mb-8 default_container">
        <swiper
            :modules="modules"
            :slides-per-view="1"
            :navigation="true"
            :autoplay="{delay: 3500, disableOnInteraction: false}"
            :pagination="{ clickable: true }"
            class="land_slider slider_type_1"
        >
            <swiper-slide v-for="(slide, index) in slides" :key="index">
                <a href="#" class="relative w-full pt-[44%] block rounded-b-custom overflow-hidden">
                    <img class="object-cover w-full h-full top-0 left-0 absolute" :src="slide.image" :alt="slide.alt">
                    <ul class="list-disc list-inside absolute top-2.5 right-1 py-1 px-2 z-[1] bg-white/80 text-xs rounded-custom">
                        <li v-for="(li, innerIndex) in slide.att" :key="innerIndex" v-if="li !== ''" :class="{ 'line-clamp-1': true, 'hidden': innerIndex > 1, 'sm:block': innerIndex > 1, 'lg:block': innerIndex > 3 }" class="line-clamp-1" v-text="slide.alt"></li>
                    </ul>
                </a>
            </swiper-slide>
        </swiper>
    </section>
</template>

<script>
// import Swiper core and required modules
import {Autoplay, Navigation, Pagination} from 'swiper/modules';
// Import Swiper Vue.js components
import {Swiper, SwiperSlide} from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';

export default {
    props: {
        slides: Object,
        radiusB: String,
    },
    components: {
        Swiper,
        SwiperSlide
    },
    setup(props) {
        const onSwiper = (swiper) => {
            //console.log(swiper);
        };
        const onSlideChange = () => {
            //console.log('slide change');
        };

        console.log();
        return {
            onSwiper,
            onSlideChange,
            modules: [Navigation, Pagination, Autoplay],
        };
    }
}
</script>
