<template>
    <template v-if="type == 1">
        <li v-for="(article, index) in ArticlesList" :key="index" :class="'flex flex-col sm:flex-row rounded-custom bg-white overflow-hidden ' + borderStyle">
            <!-- image -->
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none">
                <img :src="article.image" :alt="article.title" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
            </div>
            <!-- docs -->
            <div class="px-6 pb-6 pt-2.5 md:pl-10 flex flex-col sm:justify-center sm:flex-1">
                <h3 class="mb-4 text-lg font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <p
                    class="text-sm text-justify line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-16 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500 ">
                    {{ article.description }}
                </p>
                <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug"
                    class="text-lg font-medium flex_center h-10 w-32 rounded-custom mr-auto text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                    <span> بیشتر </span>
                    <!-- <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 16L9.41 14.59L3.83 9L16 9V7L3.83 7L9.41 1.41L8 0L0 8L8 16Z"
                            fill="current" />
                    </svg> -->
                </ArticleLink>
                <!-- <x-home_landing.announcement.children.linkBtn text="بیشتر" href="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" class="mr-auto rounded-custom text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal" /> -->
            </div>
        </li>
    </template>

    <template v-if="type == 2">
        <li v-for="(article, index) in ArticlesList" :key="index" :class="'flex flex-col w-60 lg:w-full flex-none overflow-hidden rounded-custom bg-white ' + borderStyle">
            <div class="relative w-full pt-[62%]">
                <img :src="article.image" :alt="article.title"
                    class="absolute top-0 left-0 w-full h-full object-cover" />
            </div>
            <!-- info -->
            <div class="px-4 pt-3 pb-4">
                <h3 class="mb-2 text-sm font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <p class="mb-3 text-xs font-normal leading-5 h-10 text-justify text-stone-700  line-clamp-2">
                    {{ article.description }}
                </p>
                <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug"
                    class="text-lg font-medium flex_center h-10 w-32 rounded-custom mr-auto text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                    <span> بیشتر </span>
                    <!-- <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 16L9.41 14.59L3.83 9L16 9V7L3.83 7L9.41 1.41L8 0L0 8L8 16Z"
                            fill="current" />
                    </svg> -->
                </ArticleLink>
                <!-- <x-home_landing.announcement.children.linkBtn text="بیشتر" href="{{ route('landing.article.show',['page'=> $landSlug, 'article'=> $articleSlug]) }}" class="mx-auto lg:ml-0 rounded-custom text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal" /> -->
            </div>
        </li>
    </template>
</template>

<script>
import { ref } from 'vue';

export default {
    name: 'HomeArticles',
    props: {
        landSlug: String,
        borderStyle: String,
        data: [Array, Object],
        land: [Array, Object],
        type: [String, Number],
        evenOdd: Boolean,
    },
    setup(props){
        const ArticlesList = ref(JSON.parse(props.data));

        console.log(props.type);
        return {
            ArticlesList,
        }
    }
}
</script>