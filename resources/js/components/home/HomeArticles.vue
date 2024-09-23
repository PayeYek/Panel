<template>
    <template v-if="type == 1">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" v-for="(article, index) in ArticlesList.slice(0,4)" :key="index" :class="'flex flex-col sm:flex-row rounded-custom bg-white overflow-hidden ' + borderStyle + (evenOdd == 1 ? ' evenOdd_cards ' : ' bg-white ')">
            <!-- image -->
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none">
                <img :src="article.image" :alt="article.title" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
            </div>
            <!-- docs -->
            <div class="px-6 pb-6 pt-2.5 md:pl-10 flex flex-col sm:justify-center sm:flex-1">
                <h3 class="mb-4 text-lg font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <p class="text-sm text-justify line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-16 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500 ">
                    {{ article.description }}
                </p>
                <div class="text-lg font-medium flex_center h-10 w-32 rounded-custom mr-auto text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                    <span> بیشتر </span>
                </div>
            </div>
        </ArticleLink>
    </template>

    <template v-if="type == 2">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" v-for="(article, index) in ArticlesList.slice(0,4)" :key="index" :class="'flex flex-col w-60 lg:w-full flex-none overflow-hidden rounded-custom bg-white ' + borderStyle + (evenOdd == 1 ? ' evenOdd_cards ' : ' bg-white ')">
            <div class="relative w-full pt-[56%]">
                <img :src="article.image" :alt="article.title"
                    class="absolute top-0 left-0 w-full h-full object-cover" />
            </div>
            <!-- info -->
            <div class="px-4 pt-3 pb-4">
                <h3 class="mb-2 text-sm font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <p class="mb-3 text-xs font-normal leading-5 h-10 text-justify text-stone-700  line-clamp-2">
                    {{ article.description }}
                </p>
                <div
                    class="text-lg font-medium flex_center h-10 w-32 rounded-custom mx-auto lg:ml-0 text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                    <span> بیشتر </span>
                </div>
            </div>
        </ArticleLink>
    </template>

    <template v-if="type == 3">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" v-for="(article, index) in ArticlesList.slice(0,4)" :key="index" class="flex flex-col sm:flex-row bg-white border-t first:border-t-0 py-4 first:pt-0 last:pb-0 border-dark-100">
            <!-- image -->
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-custom">
                <img :src="article.image" :alt="article.title" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
            </div>
            <!-- docs -->
            <div class="px-6 md:pl-8 flex flex-col sm:justify-center sm:flex-1">
                <h3 class="mb-4 text-lg font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <p
                    class="text-sm text-justify lg:text-base line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-24 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500">
                    {{ article.description }}
                </p>
                <div class="flex items-center justify-between">
                    <p class="text-dark-500 text-sm font-normal lg:text-base"> {{ renderDate(article.created_at) }} </p>
                    <div
                        class="text-lg font-medium flex_center h-10 w-32 rounded-custom text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                        <span> بیشتر </span>
                    </div>
                </div>
            </div>
        </ArticleLink>
    </template>

    <template v-if="type == 4">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" v-for="(article, index) in ArticlesList.slice(0,4)" :key="index" class="flex flex-col sm:flex-row bg-white border-t first:border-t-0 py-4 first:pt-0 last:pb-0 border-dark-100">
            <!-- image -->
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-t-custom">
                <img :src="article.image" :alt="article.title" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
            </div>
            <!-- docs -->
            <div class="px-5 md:pl-8 flex flex-col sm:justify-center sm:flex-1">
                <h3 class="mb-1 text-base font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <h4 class="text-normal text-sm font-normal mb-4"> {{ renderDate(article.created_at) }} </h4>
                <p
                    class="text-sm text-justify lg:text-base line-clamp-3 lg:line-clamp-2 lg:h-24 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500">
                    {{ article.description }}
                </p>
                <div class="flex items-center justify-end">
                    <div
                        class="text-sm font-medium flex_center gap-4 text-stone-700">
                        <span> ادامه </span>
                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16L9.41 14.59L3.83 9L16 9V7L3.83 7L9.41 1.41L8 0L0 8L8 16Z" fill="current"/>
                        </svg>
                    </div>
                </div>
            </div>
        </ArticleLink>
    </template>

    <template v-if="type == 6">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" v-for="(article, index) in ArticlesList.slice(0,4)" :key="index" :class="'flex flex-col sm:flex-row border border-stone-400 rounded-custom ' + (evenOdd == '1' ? 'evenOdd_cards' : 'bg-white')">
            <!-- image -->
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-t-custom sm:rounded-r-custom sm:rounded-tl-none">
                <img :src="article.image" :alt="article.title" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
            </div>
            <!-- docs -->
            <div class="px-5 pb-4 lg:px-8 flex flex-col sm:justify-center lg:justify-start sm:flex-1 sm:py-2 lg:py-4">
                <div class="flex mb-1 lg:mb-4 flex-col sm:flex-row gap-2 sm:justify-between">
                    <h3 class="text-base lg:text-lg font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                    <h4 class="text-normal text-sm font-normal sm:flex-none"> {{ renderDate(article.created_at) }} </h4>
                </div>
                <p
                    class="text-sm text-justify lg:text-base line-clamp-3 lg:line-clamp-2 lg:h-24 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500">
                    {{ article.description }}
                </p>
                <div class="flex items-center justify-between sm:justify-end">
                    <div
                        class="text-sm font-medium flex_center gap-1 text-stone-700">
                        <span> ادامه </span>
                        <svg class="fill-current" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00781 9.91693L4.39115 6.30026L8.00781 2.68359" stroke="#58595B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
        </ArticleLink>
    </template>

    <template v-if="type == 7">
        <template v-for="(article, key, index) in ArticlesRowList" :key="index">
            <div class="[&:nth-of-type(3)]:col-span-2">
                <section :class="'sm:flex sm:flex-col sm:p-4 sm:bg-white border-0 sm:rounded-custom ' + borderStyle + ' sm:border-2'">
                    <p class="hidden sm:block text-base font-normal lg:text-xl mb-4"> {{ key === 'blog' ? 'بلاگ' : (key === 'news' ? 'اخبار و مقالات' : (key === 'sell' ? 'شرایط فروش' : '')) }} </p>
                    <section :class="'flex flex-col bg-white rounded-custom overflow-hidden p-4 sm:p-0 sm:border-0 ' + borderStyle + ' border-2'">
                        <ArticleLink v-for="(item, index) in article.slice(0, 2)" :href="'/l/' + landSlug + '/a/' + item.slug" :class="'pt-4 border-b border-stone-400 last:border-b-0 ' + (article.length >= 2 ? 'pb-3' : '')">
                            <div class="flex flex-col gap-3 lg:flex-row lg:mb-4">
                                <!-- image -->
                                <div class="h-24 lg:w-28 lg:flex-none rounded-custom">
                                    <img :src="item.image" :alt="item.title" class="h-full mx-auto object-contain lg:mx-0" />
                                </div>
                                <!-- info -->
                                <div class="flex flex-col text-stone-700 gap-1 lg:gap-2">
                                    <p class="text-sm lg:text-base xl:text-lg font-medium lg:line-clamp-1"> {{ item.title }} </p>
                                    <p class="text-xs lg:text-sm lg:leading-6 font-normal line-clamp-1 lg:line-clamp-2 h-4 lg:h-12"> {{ item.description }} </p>
                                </div>
                            </div>
                            <div class="hidden lg:flex items-center justify-end gap-4 text-normal text-base font-medium">
                                <span> ادامه </span>
                                <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 16L9.41 14.59L3.83 9L16 9V7L3.83 7L9.41 1.41L8 0L0 8L8 16Z" fill="current"/>
                                </svg>
                            </div>
                        </ArticleLink>
                    </section>
                </section>
            </div>
        </template>
    </template>

    <template v-if="type == 8">
        <ArticleLink v-for="(article, index) in (ArticlesList.length > 2 ? ArticlesList.slice(0, 2) : ArticlesList)" :key="index" :href="'/l/' + landSlug + '/a/' + article.slug" class="aspect-video rounded-custom overflow-hidden bg-center bg-cover bg-no-repeat hover:scale-[1.025] duration-300" :style="{'background-image': 'url(' + article.image + ')'}">
            <div class="bg-gradient-to-t w-full h-full flex flex-col gap-2 p-4 justify-end from-black/80 to-black/25">
                <p class="text-lg lg:text-2xl font-medium text-white line-clamp-1"> {{ article.title }} </p>
                <p class="text-sm font-normal text-white line-clamp-1"> {{ article.description }} </p>
            </div>
        </ArticleLink>
        <!-- extra items -->
        <div v-if="ArticlesList.length > 2" class="aspect-video rounded-custom overflow-hidden bg-center bg-cover bg-no-repeat bg-[url(https://paye1.com/storage/media/land/files/TSjaNrAaA470PmgitjoXLMwUJTHKQVvoVt62fvDP.png)] hover:scale-[1.025] duration-300">
            <div class="flex_center bg-gradient-to-t from-black/80 to-black/25 w-full h-full">
                <Link :href="'/l/' + landSlug + '/a/'" class="h-11 w-44 flex_center border border-white rounded-custom text-lg font-medium text-white bg-transparent hover:bg-black/20"> آرشیو اخبار و مقالات </Link>
            </div>
        </div>
    </template>

    <template v-if="type == 9">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" v-for="(article, index) in ArticlesList.slice(0,3)" :key="index" :class="'flex flex-col w-60 lg:w-full flex-none overflow-hidden rounded-custom bg-white ' + borderStyle">
            <div class="relative w-full pt-[56%]">
                <img :src="article.image" :alt="article.title"
                    class="absolute top-0 left-0 w-full h-full object-cover" />
            </div>
            <!-- info -->
            <div class="px-4 pt-3 pb-4">
                <h3 class="mb-4 text-sm sm:text-base lg:text-lg font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <p class="mb-6 text-xs sm:text-sm font-normal leading-5 sm:leading-6 md:h-12 text-justify text-stone-700 md:line-clamp-2">
                    {{ article.description }}
                </p>
                <p class="text-xs sm:text-sm font-normal text-stone-700">
                    {{ renderDate(article.created_at) }}
                </p>
            </div>
        </ArticleLink>
    </template>

    <template v-if="type == 10">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" v-for="(article, index) in ArticlesList.slice(0,4)" :key="index" class="flex flex-col sm:flex-row gap-4">
            <!-- image -->
            <div
                class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-custom">
                <img :src="article.image" :alt="article.title" class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
            </div>
            <!-- docs -->
            <div class="flex flex-col sm:justify-center sm:flex-1">
                <h3 class="mb-1 text-base font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <h4 class="text-normal text-sm font-normal mb-4"> {{ renderDate(article.created_at) }} </h4>
                <p
                    class="text-sm text-justify lg:text-base line-clamp-3 lg:line-clamp-2 lg:h-24 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500">
                    {{ article.description }}
                </p>
                <div class="flex items-center justify-end">
                    <div
                        class="text-sm font-medium flex_center gap-4 text-stone-700">
                        <span> ادامه </span>
                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 16L9.41 14.59L3.83 9L16 9V7L3.83 7L9.41 1.41L8 0L0 8L8 16Z" fill="current"/>
                        </svg>
                    </div>
                </div>
            </div>
        </ArticleLink>
    </template>

    <template v-if="type == 11">
        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug" v-for="(article, index) in ArticlesList.slice(0, 4)" :key="index" :class="'flex flex-col w-60 lg:w-full flex-none overflow-hidden rounded-custom bg-white ' + borderStyle + (evenOdd == 1 ? ' evenOdd_cards ' : ' bg-white ')">
            <div class="relative w-full pt-[56%]">
                <img :src="article.image" :alt="article.title"
                    class="absolute top-0 left-0 w-full h-full object-cover" />
            </div>
            <!-- info -->
            <div class="px-4 pt-3 pb-4">
                <h3 class="mb-2 text-sm font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                <p class="mb-3 text-xs font-normal leading-5 h-10 text-justify text-stone-700  line-clamp-2">
                    {{ article.description }}
                </p>
                <div class="text-lg font-medium flex_center h-10 w-32 rounded-custom mx-auto lg:ml-0 text-white bg-normal hover:bg-focus focus:shadow-focus focus:shadow-shadowNormal">
                    <span> بیشتر </span>
                </div>
            </div>
        </ArticleLink>
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
        evenOdd: [String, Number],
    },
    setup(props){
        const ArticlesList = ref(JSON.parse(props.data));
        const ArticlesRowList = ref(Object.groupBy(JSON.parse(props.data), ({ type }) => type));

        // convert date to fa local
        const renderDate = (string) => {
            return new Intl.DateTimeFormat('fa-IR', { dateStyle: 'medium' }).format(new Date(string))
        }


        // console.log(props.evenOdd);

        // console.log(ArticlesRowList.value);
        // ArticlesRowList.value.map(item => console.log(item))
        // for (const [key, value] of Object.entries(ArticlesRowList.value)) {
        //    console.log(key);
        // }

        // console.log(ArticlesList.value);
        return {
            ArticlesList,
            renderDate,
            ArticlesRowList,
        }
    }
}
</script>