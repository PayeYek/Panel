<template>
    <section class="flex flex-col gap-4 mb-8 lg:mb-16 sm:flex-row-reverse sm:justify-between sm:items-center">
        <section class="relative w-full h-12 sm:w-72">
            <input type="text"
                class="w-full h-full outline-none border-b border-x-0 border-t-0 border-b-dark-100 focus:ring-0 focus:border-b-stone-700 transition-[border] peer pl-10 pr-3 placeholder:text-[#888b93] text-sm font-normal text-stone-700"
                placeholder="جستجو مطلب" v-model="searchFilterState" />
            <div class="absolute flex-none w-8 h-8 left-2 top-2 flex_center text-stone-400 peer-focus:text-[#111827]">
                <svg class="size-6 stroke-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.9284 17.0396L20.4016 20.3996M19.2816 11.4396C19.2816 15.7695 15.7715 19.2796 11.4416 19.2796C7.11165 19.2796 3.60156 15.7695 3.60156 11.4396C3.60156 7.1097 7.11165 3.59961 11.4416 3.59961C15.7715 3.59961 19.2816 7.1097 19.2816 11.4396Z"
                        stroke="current" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </section>


        <ul class="flex items-center flex-wrap gap-x-2 gap-y-4 list-none text-base font-medium *:rounded-custom *:flex_center *:h-8 *:px-3 *:cursor-pointer *:border *:border-stone-700 *:text-stone-700">
            <li :class="activeSort === 'ASC' ? '!border-normal !text-normal' : ''" @click="sortByParam('ASC')"> جدید ترین </li>
            <li :class="activeSort === 'DESC' ? '!border-normal !text-normal' : ''" @click="sortByParam('DESC')"> قدیمی ترین </li>
        </ul>
    </section>

    <section :class="'default_container ' + containerClasses">
        <template v-for="(video, index) in sortedVideoList" :key="index">
            <div class="flex flex-col w-full" v-if="type == 6">
                <div class="relative w-full pt-[56%] mb-4 cursor-pointer rounded-custom overflow-hidden videoThumbnails" @click="showVideoByThumbnail(video.link)">
                    <img :src="video.image" :alt="video.alt" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                    <svg class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" viewBox="0 0 85 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.5">
                            <path d="M60.5643 39.0118L33.1702 25.0264C32.3958 24.6309 31.5352 24.4441 30.6701 24.4837C29.805 24.5234 28.9642 24.7883 28.2276 25.2531C27.4911 25.718 26.8833 26.3674 26.4619 27.1396C26.0406 27.9119 25.8197 28.7813 25.8203 29.6652V56.0809C25.8197 56.9649 26.0406 57.8343 26.4619 58.6065C26.8833 59.3787 27.4911 60.0282 28.2276 60.493C28.9642 60.9579 29.805 61.2227 30.6701 61.2624C31.5352 61.3021 32.3958 61.1152 33.1702 60.7197L60.5643 46.7344C61.2662 46.3753 61.8564 45.8239 62.2688 45.142C62.6813 44.4601 62.8997 43.6745 62.8997 42.8731C62.8997 42.0717 62.6813 41.286 62.2688 40.6041C61.8564 39.9222 61.2662 39.3709 60.5643 39.0118Z" fill="white" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M42.7466 81.7443C63.779 81.7443 80.8291 64.3406 80.8291 42.8721C80.8291 21.4036 63.779 4 42.7466 4C21.7142 4 4.66406 21.4036 4.66406 42.8721C4.66406 64.3406 21.7142 81.7443 42.7466 81.7443Z" stroke="white" stroke-width="8"/>
                        </g>
                    </svg>
                    <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end bg-gradient-to-t from-black/90 to-transparent h-full">
                    </div>
                </div>
                <p class="w-full px-4 text-sm font-medium sm:text-lg line-clamp-1 select-none"> {{ video.alt }} </p>
            </div>

            <div v-else class="w-full">
                <div class="relative w-full pt-[56%] cursor-pointer rounded-custom overflow-hidden videoThumbnails" @click="showVideoByThumbnail(video.link)">
                    <img :src="video.image" :alt="video.alt" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                    <!-- play icon -->
                    <svg class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" viewBox="0 0 85 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.5">
                            <path d="M60.5643 39.0118L33.1702 25.0264C32.3958 24.6309 31.5352 24.4441 30.6701 24.4837C29.805 24.5234 28.9642 24.7883 28.2276 25.2531C27.4911 25.718 26.8833 26.3674 26.4619 27.1396C26.0406 27.9119 25.8197 28.7813 25.8203 29.6652V56.0809C25.8197 56.9649 26.0406 57.8343 26.4619 58.6065C26.8833 59.3787 27.4911 60.0282 28.2276 60.493C28.9642 60.9579 29.805 61.2227 30.6701 61.2624C31.5352 61.3021 32.3958 61.1152 33.1702 60.7197L60.5643 46.7344C61.2662 46.3753 61.8564 45.8239 62.2688 45.142C62.6813 44.4601 62.8997 43.6745 62.8997 42.8731C62.8997 42.0717 62.6813 41.286 62.2688 40.6041C61.8564 39.9222 61.2662 39.3709 60.5643 39.0118Z" fill="white" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M42.7466 81.7443C63.779 81.7443 80.8291 64.3406 80.8291 42.8721C80.8291 21.4036 63.779 4 42.7466 4C21.7142 4 4.66406 21.4036 4.66406 42.8721C4.66406 64.3406 21.7142 81.7443 42.7466 81.7443Z" stroke="white" stroke-width="8"/>
                        </g>
                    </svg>
                    <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black/90 to-transparent h-1/2">
                        <p class="w-full text-sm font-medium sm:text-lg line-clamp-1"> {{ video.alt }} </p>
                    </div>
                </div>
            </div>
        </template>
    </section>

    <!-- modal layer -->
    <section v-show="isPlaying" class="fixed inset-0 z-[4] bg-black/60" @click="hideVideoByThumbnail"></section>

    <!-- video -->
    <div v-if="isPlaying" class="fixed top-1/2 right-1/2 -translate-y-1/2 translate-x-1/2 z-[5] w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center" v-html="videoIframe"></div>
</template>

<script>
import { ref, onMounted, computed } from 'vue';

export default {
    name: 'Videos',
    props: {
        data: {
            type: [Array, Object],
            required: true,
        },
        type: Number,
    },

    setup(props){
        const activeSort = ref(null);
        const videoList = ref(JSON.parse(props.data));
        const isPlaying = ref(false);
        const videoIframe = ref(null);
        const searchFilterState = ref("");
        const containerClasses = ref("");

        const sortedVideoList = computed(() => {
            let filteredVideos = [...videoList.value];

            // Apply search filter if search term is provided
            if (searchFilterState.value.trim() !== '') {
                const searchTerm = searchFilterState.value.trim().toLowerCase();
                filteredVideos = filteredVideos.filter(video =>
                    video.alt.toLowerCase().includes(searchTerm)
                );
            }

            // Apply sorting based on the active sort parameter
            if (activeSort.value === 'ASC') {
                filteredVideos.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
            } else if (activeSort.value === 'DESC') {
                filteredVideos.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
            }

            return filteredVideos;
        })

        const sortByParam = param => {
            activeSort.value = param;
        }

        const showVideoByThumbnail = iframe => {
            videoIframe.value = iframe;
            isPlaying.value = true;
        }

        const hideVideoByThumbnail = () => {
            isPlaying.value = false;
        }

        onMounted(() => {
            sortByParam('ASC');
        })

        switch (props.type) {
            case 6:
                containerClasses.value = "grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5";
                break;
        
            default:
                containerClasses.value = "grid grid-cols-1 sm:grid-cols-2 gap-5";
                break;
        }

        return {
            activeSort,
            sortByParam,
            sortedVideoList,
            showVideoByThumbnail,
            isPlaying,
            videoIframe,
            hideVideoByThumbnail,
            searchFilterState,
            containerClasses,
        }
    }
}
</script>