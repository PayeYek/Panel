<template>

    <section class="flex flex-col gap-4 mb-8 default_container sm:flex-row-reverse sm:justify-between sm:items-center">
        <section class="relative w-full h-12 sm:w-72">
            <input type="text"
                class="w-full h-full outline-none peer border-b border-x-0 border-t-0 border-b-dark-100 focus:border-b-stone-700 transition-[border] focus:ring-0 pl-10 pr-3 placeholder:text-[#888b93] text-sm font-normal text-stone-700"
                placeholder="جستجو مطلب" v-model="searchFilterState" @keyup="filterArticleByName" />
            <div class="absolute flex-none w-8 h-8 left-2 top-2 flex_center text-stone-400 peer-focus:text-[#111827]">
                <svg class="size-6 stroke-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.9284 17.0396L20.4016 20.3996M19.2816 11.4396C19.2816 15.7695 15.7715 19.2796 11.4416 19.2796C7.11165 19.2796 3.60156 15.7695 3.60156 11.4396C3.60156 7.1097 7.11165 3.59961 11.4416 3.59961C15.7715 3.59961 19.2816 7.1097 19.2816 11.4396Z"
                        stroke="current" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </section>

        <!-- filters -->
        <ul
            class="flex items-center flex-wrap gap-x-2 gap-y-4 list-none text-base font-medium *:rounded-custom *:flex_center *:h-8 *:px-3 *:cursor-pointer *:border *:border-stone-700 *:text-stone-700">
            <li :class="categoryFilterState === 'all' ? '!border-normal !text-normal' : ''"
                @click="changeFilter('all')"> همه موارد </li>
            <li :class="categoryFilterState === 'news' ? '!border-normal !text-normal' : ''"
                @click="changeFilter('news')"> اخبار </li>
            <li :class="categoryFilterState === 'sell' ? '!border-normal !text-normal' : ''"
                @click="changeFilter('sell')"> اطلاعیه </li>
            <li :class="categoryFilterState === 'blog' ? '!border-normal !text-normal' : ''"
                @click="changeFilter('blog')"> وبلاگ </li>
        </ul>
    </section>

    <template v-if="filteredArticles.length != 0">
        <section :class="'mb-10 ' + gridStyle">
            <template v-for="(article, index) in filteredArticles">
                <ArticleLink v-if="type == 1" :key="index" :href="'/l/' + landSlug + '/a/' + article.slug"
                    :class="'flex flex-col sm:flex-row rounded-custom bg-white overflow-hidden ' + borderStyle">
                    <!-- image -->
                    <div
                        class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none">
                        <img :src="article.image" :alt="article.title"
                            class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
                    </div>
                    <!-- docs -->
                    <div class="px-6 pb-6 pt-2.5 md:pl-10 flex flex-col sm:justify-center sm:flex-1">
                        <h3 class="mb-4 text-lg font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                        <p
                            class="mb-4 text-sm font-normal leading-7 text-justify line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-16 sm:h-20 lg:leading-8 text-dark-500 ">
                            {{ article.description }}
                        </p>
                    </div>
                </ArticleLink>

                <ArticleLink v-if="type == 2" :key="index" :href="'/l/' + landSlug + '/a/' + article.slug"
                    :class="'flex flex-col w-full flex-none overflow-hidden rounded-custom bg-white ' + borderStyle">
                    <div class="relative w-full pt-[56%]">
                        <img :src="article.image" :alt="article.title"
                            class="absolute top-0 left-0 object-cover w-full h-full" />
                    </div>
                    <!-- info -->
                    <div class="px-4 pt-3 pb-4">
                        <h3 class="mb-2 text-sm font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                        <p class="h-10 mb-3 text-xs font-normal leading-5 text-justify text-stone-700 line-clamp-2">
                            {{ article.description }}
                        </p>
                    </div>
                </ArticleLink>

                <ArticleLink v-if="type == 3" :key="index" :href="'/l/' + landSlug + '/a/' + article.slug"
                    class="flex flex-col py-4 bg-white border-t sm:flex-row first:border-t-0 first:pt-0 last:pb-0 border-dark-100">
                    <!-- image -->
                    <div
                        class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-custom">
                        <img :src="article.image" :alt="article.title"
                            class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
                    </div>
                    <!-- docs -->
                    <div class="flex flex-col px-6 md:pl-8 sm:justify-center sm:flex-1">
                        <h3 class="mb-4 text-lg font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                        <p
                            class="mb-4 text-sm font-normal leading-7 text-justify lg:text-base line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-24 sm:h-20 lg:leading-8 text-dark-500">
                            {{ article.description }}
                        </p>
                    </div>
                </ArticleLink>

                <div v-if="type == 4" :key="index"
                    class="flex flex-col py-4 bg-white border-t sm:flex-row first:border-t-0 first:pt-0 last:pb-0 border-dark-100">
                    <!-- image -->
                    <div
                        class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-custom">
                        <img :src="article.image" :alt="article.title"
                            class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
                    </div>
                    <!-- docs -->
                    <div class="flex flex-col px-6 md:pl-8 sm:justify-center sm:flex-1">
                        <h3 class="mb-4 text-lg font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                        <p
                            class="mb-4 text-sm font-normal leading-7 text-justify lg:text-base line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-24 sm:h-20 lg:leading-8 text-dark-500">
                            {{ article.description }}
                        </p>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-normal text-dark-500 lg:text-base"> {{ renderDate(article.created_at)
                                }}
                            </p>
                            <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug"
                                class="flex items-center gap-4 px-4 text-sm font-medium text-normal">
                                <span> ادامه </span>
                                <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 16L9.41 14.59L3.83 9L16 9V7L3.83 7L9.41 1.41L8 0L0 8L8 16Z"
                                        fill="current" />
                                </svg>
                            </ArticleLink>
                        </div>
                    </div>
                </div>

                <ArticleLink v-if="type == 5" :key="index" :href="'/l/' + landSlug + '/a/' + article.slug"
                    :class="'flex flex-col sm:flex-row bg-white overflow-hidden relative ' + borderStyle + (evenOdd == 1 ? ' evenOdd_cards rounded-custom sm:py-2 sm:px-1 lg:py-6 lg:px-4' : ' bg-white')">
                    <!-- image -->
                    <div
                        class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none">
                        <img :src="article.image" :alt="article.title"
                            class="absolute top-0 left-0 object-cover w-full h-full sm:static rounded-custom" />
                    </div>
                    <!-- docs -->
                    <div class="px-6 pb-6 pt-2.5 md:pl-10 lg:pl-4 flex flex-wrap sm:flex-1">
                        <div class="order-1 w-2/3 sm:w-full sm:mb-4 lg:flex_between lg:gap-8">
                            <h3 class="text-lg font-medium text-stone-700 line-clamp-2 sm:line-clamp-1"> {{ article.title
                                }} </h3>
                            <h4
                                class="absolute top-4 left-3 sm:left-auto sm:right-56 sm:top-4 md:right-64 lg:static px-3 py-1.5 lg:px-2 lg:w-28 lg:flex_center text-sm font-medium rounded-full bg-stone-400 text-stone-700">
                                {{ article.type === "blog" ? 'بلاگ' : (article.type === "sell" ? 'اطلاعیه' :
                    (article.type === "news" ? 'خبر' : article.type)) }} </h4>
                        </div>
                        <h3
                            class="flex justify-end order-2 w-1/3 text-base font-normal sm:order-3 text-stone-700 sm:w-full sm:justify-start">
                            {{ renderDate(article.created_at) }} </h3>

                        <div
                            class="order-3 w-full mt-2 text-sm font-normal leading-7 text-justify sm:mb-2 sm:mt-0 sm:order-2 line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-16 sm:h-20 lg:leading-8 text-dark-500">
                            {{ article.description }}
                        </div>
                    </div>
                </ArticleLink>

                <ArticleLink v-if="type == 6" :key="index" :href="'/l/' + landSlug + '/a/' + article.slug"
                    :class="'flex flex-col w-full flex-none overflow-hidden rounded-custom bg-white ' + borderStyle">
                    <div class="relative w-full pt-[56%]">
                        <img :src="article.image" :alt="article.title"
                            class="absolute top-0 left-0 object-cover w-full h-full" />
                    </div>
                    <!-- info -->
                    <div class="px-4 pt-3 pb-4">
                        <div class="flex flex-col mb-2 gap-1 sm:flex-row sm:justify-between sm:gap-4">
                            <h3 class="text-base font-medium text-stone-700 line-clamp-1"> {{ article.title }} </h3>
                            <h4 class="text-sm font-normal text-normal flex-none"> {{ renderDate(article.created_at) }} </h4>
                        </div>
                        <p class="h-12 mb-3 text-sm font-normal leading-6 text-justify text-stone-700 line-clamp-2 lg:line-clamp-3 lg:h-[84px] lg:leading-7">
                            {{ article.description }}
                        </p>

                        <div class="flex items-center gap-2 text-sm font-normal text-stone-700 float-right hover:text-stone-800">
                            <p> ادامه </p>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.332 12.6673L5.66536 8.00065L10.332 3.33398" stroke="#58595B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </ArticleLink>

                <ArticleLink v-if="type == 7" :href="'/l/' + landSlug + '/a/' + article.slug" :key="index" :class="'flex flex-col sm:flex-row border border-stone-400 rounded-custom ' + (evenOdd == '1' ? 'evenOdd_cards' : 'bg-white')">
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
        </section>
    </template>

    <section class="relative flex-col gap-4 flex_center h-80 sm:h-96 mb-10" v-else>
        <p class="pb-4 text-base font-normal border-b sm:text-lg border-b-normal text-stone-700 mr-6"> محتوایی با این مشخصات
            پیدا
            نشد. </p>
        <p class="text-sm font-normal sm:text-base text-stone-700 mr-6"> پیشنهاد می کنیم فیلتر ها را تغییر دهید. </p>

        <!-- icon -->
        <svg class="absolute translate-x-1/2 -translate-y-1/2 size-80 sm:size-96 top-1/2 right-1/2" viewBox="0 0 362 362" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.2"
                d="M281.179 283.479L351.799 351.799M329.026 169.613C329.026 257.654 257.654 329.026 169.613 329.026C81.571 329.026 10.1992 257.654 10.1992 169.613C10.1992 81.571 81.571 10.1992 169.613 10.1992C257.654 10.1992 329.026 81.571 329.026 169.613Z"
                stroke="#58595B" stroke-width="20" stroke-linecap="round" />
        </svg>

    </section>

</template>

<script>
import { ref, computed, watch, onMounted } from 'vue';
// import { useRouter, useRoute } from 'vue-router'
// import moment from 'moment';
import 'moment-jalaali';

export default {
    name: 'Articles',

    props: {
        gridStyle: {
            type: String,
            required: true,
        },
        landSlug: {
            type: String,
            required: true,
        },
        type: {
            type: [String, Number],
            required: true,
        },
        data: {
            type: String,
            required: true,
        },
        borderStyle: {
            type: String,
            required: true,
        },
        evenOdd: {
            type: [String, Number],
            required: true,
        },
    },

    setup(props) {
        const articleList = ref(JSON.parse(props.data));
        const categoryFilterState = ref('all');
        const searchFilterState = ref("");
        const queryParam = ref('all');
        const firstTime = ref(false);

        // get filter params
        onMounted(() => {
            const urlParams = new URLSearchParams(window.location.search);
            queryParam.value = urlParams.get('f') != null ? urlParams.get('f') : 'all';
            
            changeFilter(queryParam.value);
        })

        // convert date to fa local
        const renderDate = (string) => {
            return new Intl.DateTimeFormat('fa-IR', { dateStyle: 'medium' }).format(new Date(string))
        }

        const filteredArticles = computed(() => {
            return articleList.value.filter(article => {
                // Filter by category
                if (categoryFilterState.value !== 'all' && article.type !== categoryFilterState.value) {
                    return false;
                }

                // Filter by search term (title or description)
                if (searchFilterState.value) {
                    const searchString = searchFilterState.value.toLowerCase();
                    const title = article.title?.toLowerCase() ?? "";
                    const description = article.description?.toLowerCase() ?? "";
                    return title.includes(searchString) || description.includes(searchString);
                }

                return true;
            });
        });

        const changeFilter = (filter) => {
            if(firstTime.value)
            {
                window.history.replaceState( {}, "",`?f=${filter}`);
            }
            categoryFilterState.value = filter;
            searchFilterState.value = "";
            firstTime.value = true;
        }

        const filterArticleByName = () => {
            setTimeout(() => {
                categoryFilterState.value = "all";
            }, 300);
        }

        watch(searchFilterState, filterArticleByName);


        return {
            categoryFilterState,
            changeFilter,
            renderDate,
            searchFilterState,
            filterArticleByName,
            filteredArticles,
        }
    }
}
</script>