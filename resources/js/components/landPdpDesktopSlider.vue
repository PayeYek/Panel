<template>
    <div class="w-full pt-[100%] relative hidden md:block">
        <div class="absolute inset-0 cursor-pointer">
            <img :src="mainImage" :alt="name" :class="'w-full h-full object-cover ' + radius" />
        </div>
    </div>

    <!-- thumbnails -->
    <div class="md:grid hidden grid-cols-3 gap-3">
        <div v-for="(thumb, index) in thumbGallery" :key="index" :class="'aspect-video w-full cursor-pointer relative overflow-hidden ' + radius"
            @click="showSliderWithSliderTo(index + 1)">
            <img :src="thumb" :alt="name" :class="'w-full h-full ' + radius + ' object-cover'" />
            <div class="w-full h-full bg-black/60 absolute top-0 left-0 flex_center text-white/60 font-normal text-[60px]" v-if="index == 0 && thumbGalleryLength > 3"> {{ thumbGalleryLength - 3 }} + </div>
        </div>
    </div>

    <!-- modal layer -->
    <div class="hidden md:block bg-black/60 fixed inset-0 z-[3]" v-show="openModal" @click="closeModal"></div>

    <section class="hidden md:flex_center w-2/3 max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto translate-x-1/2 -translate-y-1/2 fixed top-1/2 right-1/2 z-[4]" v-show="openModal">
            <swiper :modules="modules" speed="750" :slides-per-view="1" :space-between="16" :navigation="true"
                class="desktop_pdp_slider w-full">
                <swiper-slide v-for="slide in newGallery">
                    <div class="relative pt-[62%] w-full">
                        <img loading="lazy" class="object-cover absolute w-full h-full top-0 left-0" :src="slide"
                            :alt="slide" />
                    </div>
                </swiper-slide>
                <!-- closeModal -->
                <button type="button" class="cursor-pointer p-1 absolute top-4 left-5 z-[1]" @click="closeModal">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="#111827" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </swiper>
    </section>
</template>

<script>
// import Swiper core and required modules
import { Navigation } from 'swiper/modules';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';
import { ref, onMounted } from 'vue';

export default {
    name: 'DesktopSlider',
    props: {
        slides: Object,
        mainImage: String,
        name: String,
        radius: String,
    },
    components: {
        Swiper,
        SwiperSlide
    },
    setup(props) {
        const oldGallery = ref(JSON.parse(props.slides).pictures);
        const newGallery = ref(null);
        const thumbnails = [...oldGallery.value];
        const thumbGallery = ref(null);
        const thumbGalleryLength = ref(null);
        const copyOfGallery = [...oldGallery.value];
        const newSlide = ref(JSON.parse(props.slides).image);
        newGallery.value = [newSlide.value].concat(oldGallery.value);
        const openModal = ref(false)
        const desktopSliderSwiper = ref(null)
        const showSliderWithSliderTo = ref(null)
        thumbGalleryLength.value = [...oldGallery.value].length

        onMounted(() => {
            desktopSliderSwiper.value = document.querySelector('.desktop_pdp_slider').swiper
        })

        // open Modal
        showSliderWithSliderTo.value = (id) => {
            desktopSliderSwiper.value.slideTo(id);
            openModal.value = true
        }

        const closeModal = () => {
            openModal.value = false
        }

        if(thumbnails.length <= 3){
            thumbGallery.value = thumbnails;
        } else {
            thumbGallery.value = thumbnails.slice(0, -(thumbnails.length-3));
        }

        return {
            modules: [Navigation],
            newGallery,
            oldGallery,
            showSliderWithSliderTo,
            openModal,
            closeModal,
            thumbGallery,
            thumbGalleryLength,
        };
    },
}
</script>