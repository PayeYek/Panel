<template>
    <section class="mb-2.5 lg:mb-8 relative z-[1] sm:default_container">
        <swiper
            :modules="modules"
            :slides-per-view="1"
            :navigation="false"
            :autoplay="{delay: 3500, disableOnInteraction: false}"
            :pagination="{ clickable: true }"
            class="land_slider slider_type_1"
        >
            <swiper-slide v-for="slide in slides">
                <a href="#" class="relative w-full pt-[44%] block">
                    <img :class="'object-cover w-full h-full top-0 left-0 absolute ' + radiusB" :src="slide.image" :alt="slide.alt">
                    <div :class="'absolute top-2/3  text-white py-8 px-20 text-2xl z-[1] ' + sliderPanelBgColor">
                        <span v-text="slide.alt"></span>
                    </div>
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
        sliderPanelBgColor: String,
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
