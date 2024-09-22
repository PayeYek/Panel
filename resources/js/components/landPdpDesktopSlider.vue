<template>
    <section class="grid-cols-5 gap-5 hidden lg:grid">
        <!-- thumbnails -->
        <div v-if="oldGallery.length > 0" class="col-span-1 w-full pt-0.5">
            <div class="grid grid-cols-1 gap-4">
                <div v-for="(thumb, index) in thumbGallery" :key="index"
                    class="relative w-full overflow-hidden cursor-pointer aspect-square rounded-custom"
                    @click="showSliderWithSliderTo(index)">
                    <img :src="thumb" :alt="name" class="object-cover w-full h-full rounded-custom" />
                    <div class="w-full h-full bg-black/60 absolute top-0 left-0 flex_center text-white/60 font-normal text-5xl"
                        v-if="index == 3 && thumbGalleryLength > 4"> {{ thumbGalleryLength - 4 }} + </div>
                </div>
            </div>
        </div>

        <div :class="oldGallery.length > 0 ? 'col-span-4' : 'col-span-5'">
            <div class="w-full pt-[100%] relative border border-[#DBDBDB] rounded-custom">
                <div class="absolute inset-0 cursor-pointer">
                    <img :src="mainImage" :alt="name" class="object-contain w-full h-full rounded-custom" />
                </div>
            </div>
        </div>
    </section>

    <!-- modal layer -->
    <div class="hidden lg:block bg-black/60 fixed inset-0 z-[4]" v-show="openModal" @click="closeModal"></div>

    <section
        class="hidden lg:flex_center w-2/3 max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto translate-x-1/2 -translate-y-1/2 fixed top-1/2 right-1/2 z-[5]"
        v-show="openModal">
        <swiper :modules="modules" :speed="750" :slides-per-view="1" :space-between="16" :navigation="true"
            class="w-full desktop_pdp_slider">
            <swiper-slide v-for="slide in oldGallery">
                <div class="relative pt-[56%] w-full">
                    <img class="absolute top-0 left-0 object-cover w-full h-full" :src="slide" :alt="name" />
                    <div class="absolute text-white bottom-0 left-0 w-full z-[2] bg-gradient-to-t from-black/90 to-transparent h-1/3"></div>
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
        slides: [Object, String],
        mainImage: String,
        name: String,
    },
    components: {
        Swiper,
        SwiperSlide
    },
    setup(props) {
        const oldGallery = ref(JSON.parse(props.slides).pictures);
        const thumbnails = [...oldGallery.value];
        const thumbGallery = ref(null);
        const thumbGalleryLength = ref(null);
        const openModal = ref(false)
        const desktopSliderSwiper = ref(null)
        const showSliderWithSliderTo = ref(null)
        thumbGalleryLength.value = [...oldGallery.value].length
// console.log(oldGallery.value.length);
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

        if (thumbnails.length <= 4) {
            thumbGallery.value = thumbnails;
        } else {
            thumbGallery.value = thumbnails.slice(0, -(thumbnails.length - 4));
        }


        return {
            modules: [Navigation],
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