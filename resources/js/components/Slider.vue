<template>
    <section :class="'mb-6 lg:mb-8 ' + containerStyle">
        <swiper
            :modules="modules"
            :slides-per-view="1"
            :navigation="true"
            :autoplay="{delay: 3500, disableOnInteraction: false}"
            :pagination="{ clickable: true }"
            :class="'land_slider slider_type_1 ' + sliderStyle"
        >
            <swiper-slide v-for="(slide, index) in slides" :key="index">
                <a :href="slide.link" class="relative w-full pt-[56%] block rounded-b-custom overflow-hidden">
                    <img class="object-cover w-full h-full top-0 left-0 absolute" :src="slide.image" :alt="slide.alt">
                    <ul v-if="slide.infos" class="list-disc list-inside absolute top-2.5 sm:top-4 sm:right-2 right-1 py-1 px-2 sm:px-4 sm:py-2 space-y-1.5 z-[1] bg-white/80 text-xs font-medium text-stone-700 rounded-custom">
                        <template v-for="(li, innerIndex) in slide.infos" :key="innerIndex">
                            <li class="marker:text-stone-700 sm:text-sm md:text-base" v-if="li" :class="{ 'hidden': innerIndex > 0, 'sm:list-item': innerIndex >= 1 && innerIndex < 3, 'md:list-item': innerIndex >= 3 }">
                                <p class="truncate inline-flex"> {{ li }} </p>
                            </li>
                        </template>
                    </ul>
                    <!-- gradient background -->
                    <div  class="custom_gradient absolute bottom-0 left-0 w-full h-12 sm:h-24 lg:h-36 xl:h-52 bg-gradient-to-t from-black/80 sm:from-black/90 to-transparent"></div>
                </a>
            </swiper-slide>
        </swiper>
    </section>
</template>

<script>
// import Swiper core and required modules
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

import { ref } from 'vue';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/pagination';

export default {
    props: {
        slides: Object,
        radiusB: String,
        sliderType: {
            type: Number,
            default: 1,
        }
    },
    components: {
        Swiper,
        SwiperSlide
    },
    setup(props) {
        const sliderStyle = ref("");
        const containerStyle = ref("");
        
        const onSwiper = (swiper) => {
            //console.log(swiper);
        };
        
        const onSlideChange = () => {
            //console.log('slide change');
        };
        // props.slides.map(item => {
        // })
        switch (props.sliderType) {
            case 1:
                sliderStyle.value = "arrow-bottom";
                containerStyle.value = "default_container";
                break;
        
            case 2:
                sliderStyle.value = "arrow-center";
                containerStyle.value = "default_container";
                break;
        
            case 3:
                sliderStyle.value = "arrow-blur-bottom";
                containerStyle.value = "default_container";
                break;
                
            case 4:
                sliderStyle.value = "arrow-center-transparent";
                containerStyle.value = "default_container";
                break;

            case 5:
                sliderStyle.value = "arrow-blur-center";
                containerStyle.value = "default_container";
                break;
        
            default:
                sliderStyle.value = "arrow-bottom";
                containerStyle.value = "default_container";
                break;
        }
        return {
            onSwiper,
            onSlideChange,
            modules: [Navigation, Pagination, Autoplay],
            sliderStyle,
            containerStyle,
        };
    }
}
</script>
