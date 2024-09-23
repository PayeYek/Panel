<template>
    <section class="mb-2.5 lg:mb-8 relative z-[1] sm:default_container lg:hidden">
        <swiper :modules="modules" :speed="750" :slides-per-view="1" :pagination="{ clickable: true }" class="slider_type_1 stone_paginate">
            <swiper-slide v-for="slide in newGallery">
                <div class="relative pt-[100%] w-full">
                    <img loading="lazy" class="object-contain absolute w-full h-full top-0 left-0" :src="slide" :alt="slide" />
                </div>
            </swiper-slide>
        </swiper>
    </section>
</template>

<script>
// import Swiper core and required modules
import {Pagination} from 'swiper/modules';
// Import Swiper Vue.js components
import {Swiper, SwiperSlide} from 'swiper/vue';
import { ref } from 'vue';

export default {
    name: 'MobileSlider',
    props: {
        slides: [Object, String],
    },
    components: {
        Swiper,
        SwiperSlide
    },
    setup(props) {
        const gallery = ref(JSON.parse(props.slides).pictures);
        // console.log(JSON.parse(props.slides));
        const newGallery = ref(null);
        const copyOfGallery = [...gallery.value];
        const newSlide = ref(JSON.parse(props.slides).image)
        newGallery.value = [newSlide.value].concat(gallery.value)
        return {
            modules: [Pagination],
            newGallery,
        };
    }
}
</script>