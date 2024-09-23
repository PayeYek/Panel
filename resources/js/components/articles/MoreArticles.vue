<template>
<swiper :class="'w-full swiper articleSliderTypeFive ' + containerClass"
    :modules="modules"
    :slides-per-view="3"
    :spece-between="20"
    :breakpoints="breakpoints"
    :navigation="true"
    :pagination="{ clickable: true }">
        <swiper-slide v-for="(article, index) in slides" :key="index" :class="'swiper-slide flex flex-col flex-none overflow-hidden rounded-custom ' + borderType + (striped == 1 ? ' evenOdd_cards' : ' bg-white')">
            <div class="relative w-full pt-[56%]">
                <img :src="article.image" :alt="article.title" class="absolute top-0 left-0 object-cover w-full h-full" />
            </div>
            <!-- info -->
            <div class="px-2 pt-3 pb-4">
                <div class="gap-4 mb-1 flex_between">
                    <h3
                        class="text-base font-medium leading-7 sm:text-lg text-stone-700 line-clamp-1">
                        {{ article.title }} </h3>
                    <h4 class="flex-none text-sm font-medium leading-7 sm:text-base text-normal"> {{ renderDate(article.created_at) }} </h4>
                </div>
                <p
                    class="mb-2 text-sm font-normal leading-6 sm:leading-7 sm:h-20 sm:mb-3 text-justify text-stone-700 line-clamp-3 h-[72px]">
                    {{ article.description }}
                </p>
                <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" classNames="mx-auto text-white bg-stone-700 text-lg font-medium flex_center h-10 w-32 rounded-custom"> بیشتر </ArticleLink>
            </div>
        </swiper-slide>
</swiper>

</template>

<script>
import {Autoplay, Navigation, Pagination} from 'swiper/modules';
import {Swiper, SwiperSlide} from 'swiper/vue';
import 'moment-jalaali';

import 'swiper/css';
import 'swiper/css/pagination';

export default {
    name: 'MoreArticles',
    props: {
        slides: Object,
        borderType: String,
        landSlug: String,
        containerClass: {
            type: String,
            default: '',
        },
        striped: [String, Number],
    },
    components: {
        Swiper,
        SwiperSlide
    },
    setup(){
        const breakpoints = {
            320: {
                slidesPerView: "auto",
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        }

        // convert date to fa local
        const renderDate = (string) => {
            return new Intl.DateTimeFormat('fa-IR', { dateStyle: 'medium' }).format(new Date(string))
        }

        return {
            breakpoints,
            modules: [Navigation, Pagination, Autoplay],
            renderDate,
        }
    }

}
</script>