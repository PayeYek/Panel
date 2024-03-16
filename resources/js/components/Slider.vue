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
                    <ul v-if="slide.infos" class="list-disc list-inside absolute top-2.5 sm:top-4 sm:right-2 right-1 py-1 px-2 sm:px-4 sm:py-2 space-y-1.5 z-[1] bg-white/80 text-xs font-bold text-stone-700 rounded-custom">
                        <template v-for="(li, innerIndex) in slide.infos" :key="innerIndex">
                            <li class="marker:text-stone-700 sm:text-sm md:text-base" v-if="li" :class="{ 'hidden': innerIndex > 0, 'sm:list-item': innerIndex >= 1 && innerIndex < 3, 'md:list-item': innerIndex >= 3 }">
                                <p class="truncate inline-flex"> {{ li }} </p>
                            </li>
                        </template>
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

        // props.slides.map(item => {
        //     console.log(item.infos[1]);
            
        // })
        return {
            onSwiper,
            onSlideChange,
            modules: [Navigation, Pagination, Autoplay],
        };
    }
}
</script>
