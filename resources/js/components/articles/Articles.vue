<template>

    <section class="default_container flex flex-col sm:flex-row-reverse sm:justify-between sm:items-center gap-4 mb-8">
        <section class="w-full h-12 relative sm:w-72">
            <input type="text"
                class="w-full h-full outline-none border-b border-x-0 border-t-0 border-b-dark-100 focus:ring-0 focus:border-b-dark-100 pl-10 pr-3 placeholder:text-[#888b93] text-sm font-normal text-gray-900"
                placeholder="جستجو مطلب" v-model="searchFilterState" @keyup="filterArticleByName" />
            <div class="w-8 h-8 absolute left-2 top-2 flex-none flex_center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.9284 17.0396L20.4016 20.3996M19.2816 11.4396C19.2816 15.7695 15.7715 19.2796 11.4416 19.2796C7.11165 19.2796 3.60156 15.7695 3.60156 11.4396C3.60156 7.1097 7.11165 3.59961 11.4416 3.59961C15.7715 3.59961 19.2816 7.1097 19.2816 11.4396Z"
                        stroke="#111827" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </section>

        <!-- filters -->
        <ul
            class="flex items-center flex-wrap gap-x-2 gap-y-4 list-none text-base font-bold *:rounded-custom *:flex_center *:h-8 *:px-3 *:cursor-pointer *:border *:border-stone-700 *:text-stone-700">
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

    <section :class="'mb-4 ' + gridStyle">
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
                    <h3 class="mb-4 text-lg font-bold text-gray-900 line-clamp-1"> {{ article.title }} </h3>
                    <p
                        class="text-sm text-justify line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-16 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500 ">
                        {{ article.description }}
                    </p>
                </div>
            </ArticleLink>

            <ArticleLink v-if="type == 2" :key="index" :href="'/l/' + landSlug + '/a/' + article.slug"
                :class="'flex flex-col w-full flex-none overflow-hidden rounded-custom bg-white ' + borderStyle">
                <div class="relative w-full pt-[62%]">
                    <img :src="article.image" :alt="article.title"
                        class="absolute top-0 left-0 w-full h-full object-cover" />
                </div>
                <!-- info -->
                <div class="px-4 pt-3 pb-4">
                    <h3 class="mb-2 text-sm font-bold text-gray-900 line-clamp-1"> {{ article.title }} </h3>
                    <p class="mb-3 text-xs font-normal leading-5 h-10 text-justify text-gray-900  line-clamp-2">
                        {{ article.description }}
                    </p>
                </div>
            </ArticleLink>

            <ArticleLink v-if="type == 3" :key="index" :href="'/l/' + landSlug + '/a/' + article.slug"
                class="flex flex-col sm:flex-row bg-white border-t first:border-t-0 py-4 first:pt-0 last:pb-0 border-dark-100">
                <!-- image -->
                <div
                    class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-custom">
                    <img :src="article.image" :alt="article.title"
                        class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
                </div>
                <!-- docs -->
                <div class="px-6 md:pl-8 flex flex-col sm:justify-center sm:flex-1">
                    <h3 class="mb-4 text-lg font-bold text-gray-900 line-clamp-1"> {{ article.title }} </h3>
                    <p
                        class="text-sm text-justify lg:text-base line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-24 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500">
                        {{ article.description }}
                    </p>
                </div>
            </ArticleLink>

            <div v-if="type == 4" :key="index"
                class="flex flex-col sm:flex-row bg-white border-t first:border-t-0 py-4 first:pt-0 last:pb-0 border-dark-100">
                <!-- image -->
                <div
                    class="overflow-hidden md:flex-none w-full relative pt-[61%] sm:pt-0 sm:w-72 md:w-80 lg:w-[23rem] sm:flex-none mb-3 sm:mb-0 rounded-custom">
                    <img :src="article.image" :alt="article.title"
                        class="absolute top-0 left-0 object-cover w-full h-full sm:static" />
                </div>
                <!-- docs -->
                <div class="px-6 md:pl-8 flex flex-col sm:justify-center sm:flex-1">
                    <h3 class="mb-4 text-lg font-bold text-gray-900 line-clamp-1"> {{ article.title }} </h3>
                    <p
                        class="text-sm text-justify lg:text-base line-clamp-5 sm:line-clamp-3 lg:line-clamp-2 lg:h-24 leading-7 sm:h-20 lg:leading-8 mb-4 font-normal text-dark-500">
                        {{ article.description }}
                    </p>
                    <div class="flex items-center justify-between">
                        <p class="text-dark-500 text-sm font-normal lg:text-base"> {{ renderDate(article.created_at) }}
                        </p>
                        <ArticleLink :href="'/l/' + landSlug + '/a/' + article.slug"
                            class="text-sm font-bold flex items-center px-4 gap-4 text-normal">
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
        </template>
    </section>

</template>

<script>
import { ref, computed, watch } from 'vue';
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
            type: String,
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
    },

    setup(props) {
        const articleList = ref(JSON.parse(props.data));
        const categoryFilterState = ref('all');
        const searchFilterState = ref("");

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
            categoryFilterState.value = filter
            searchFilterState.value = ""
        }

        const filterArticleByName = () => {
            setTimeout(() => {
                categoryFilterState.value = "all"
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