<template>
<swiper class="w-full swiper articleSliderTypeFive"
    :modules="modules"
    :slides-per-view="3"
    :spece-between="20"
    :breakpoints="breakpoints"
    :navigation="true"
    :pagination="{ clickable: true }">
    <swiper-slide v-for="(article, index) in articleArray.slice(0,8)" :key="index" :class="'swiper-slide flex flex-col flex-none overflow-hidden rounded-custom ' + borderType + (striped == 1 ? ' evenOdd_cards' : ' bg-white')">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" class="relative w-full pt-[56%] block">
            <img :src="article.image" :alt="article.title" class="absolute top-0 left-0 object-cover w-full h-full" />
        </ArticleLink>
        <!-- info -->
        <div class="px-2 pt-3 pb-4">
            <div class="gap-4 mb-1 flex_between">
                <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug"
                    class="text-base font-medium leading-7 sm:text-lg text-stone-700 line-clamp-1">
                    {{ article.title }} </ArticleLink>
                <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" class="flex-none text-sm font-medium leading-7 sm:text-base text-normal"> {{ renderDate(article.created_at) }} </ArticleLink>
            </div>
            <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug"
                class="mb-2 text-sm font-normal leading-6 sm:leading-7 sm:h-20 sm:mb-3 text-justify text-stone-700 line-clamp-3 h-[72px]">
                {{ article.description }}
            </ArticleLink>
            <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" classNames="mx-auto text-white bg-stone-700 text-lg font-medium flex_center h-10 w-32 rounded-custom"> بیشتر </ArticleLink>
        </div>
    </swiper-slide>
</swiper>

</template>

<script>
import {Autoplay, Navigation, Pagination} from 'swiper/modules';
import {Swiper, SwiperSlide} from 'swiper/vue';
import { ref } from 'vue';
import 'moment-jalaali';

import 'swiper/css';
import 'swiper/css/pagination';

export default {
    name: 'MoreArticles',
    props: {
        slides: Object,
        borderType: String,
        landSlug: String,
        striped: [String, Number],
    },
    components: {
        Swiper,
        SwiperSlide
    },
    setup(props){
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
        const articleArray = ref(JSON.parse(props.slides));
        // console.log(articleArray.value);
        // convert date to fa local
        const renderDate = (string) => {
            return new Intl.DateTimeFormat('fa-IR', { dateStyle: 'medium' }).format(new Date(string))
        }

        return {
            breakpoints,
            modules: [Navigation, Pagination, Autoplay],
            articleArray,
            renderDate,
        }
    }

}
</script>