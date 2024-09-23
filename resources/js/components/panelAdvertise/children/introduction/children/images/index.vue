<template>
    <div>
        <div>
            <label class="block group/input" for="advertise-images">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> عکس های بیشتر </span>
                <div
                    class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/input:ring-1 group-focus-within/input:ring-primary-500 group-focus-within/input:border-primary-500 transition duration-200">
                    <div class="relative flex flex-1">
                        <input type="file" id="advertise-image" @change="handleMultipleFileUpload" multiple
                               class="min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 dark:text-white w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed rounded-[7px]"/>
                    </div>
                </div>
            </label>
            <div class="text-red-600 dark:text-red-500 text-sm mt-0.5 flex items-center" v-if="titleError !== ''">
                <svg class="w-4 h-4 me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.76 15.92L15.36 4.4C14.5 2.85 13.31 2 12 2s-2.5.85-3.36 2.4l-6.4 11.52c-.81 1.47-.9 2.88-.25 3.99.65 1.11 1.93 1.72 3.61 1.72h12.8c1.68 0 2.96-.61 3.61-1.72.65-1.11.56-2.53-.25-3.99z" opacity=".4"></path><path d="M12 14.75c-.41 0-.75-.34-.75-.75V9c0-.41.34-.75.75-.75s.75.34.75.75v5c0 .41-.34.75-.75.75zM12 18c-.06 0-.13-.01-.2-.02a.636.636 0 01-.18-.06.757.757 0 01-.18-.09l-.15-.12c-.18-.19-.29-.45-.29-.71 0-.26.11-.52.29-.71l.15-.12c.06-.04.12-.07.18-.09.06-.03.12-.05.18-.06.13-.03.27-.03.39 0 .07.01.13.03.19.06.06.02.12.05.18.09l.15.12c.18.19.29.45.29.71 0 .26-.11.52-.29.71l-.15.12c-.06.04-.12.07-.18.09-.06.03-.12.05-.19.06-.06.01-.13.02-.19.02z"></path></svg>
                <span> {{titleError}} </span>
            </div>
        </div>
        <!-- images -->
        <div class="flex items-center gap-2 mt-2 flex-wrap" v-if="uploadedImages.length">
            <img v-for="image in uploadedImages" :src="image" class="size-20 object-cover rounded" />
            <div @click="emptyInputImages" class="size-20 flex items-center justify-center bg-gray-100 rounded cursor-pointer group dark:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 stroke-red-500 group-hover:stroke-red-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
    </div>
</template>

<script>
import {ref, computed} from "vue";
import {useAdvertise} from "@/store/panel/advertise/index.js";

export default {
    name: 'Images List',
    setup(){
        const advertiseStore = useAdvertise();
        const titleError = ref(computed(() => advertiseStore.imagesErrorMessage));
        const uploadedImages = ref(computed(() => advertiseStore.sliderImagesSrc));


        const handleMultipleFileUpload = (event) => {
            advertiseStore.saveSliderImages(event.target.files);
            const imagesLength = event.target.files.length;
            for (let i = 0; i < imagesLength; i++) {
                const reader = new FileReader();
                reader.readAsDataURL(event.target.files[i]);

                reader.onload = () => {
                    advertiseStore.saveSliderImagesSrc(reader.result)
                    // console.log(reader.result);
                };
            }
            // imagesLength.map(image => {
            //     const reader = new FileReader();
            //     reader.readAsDataURL(image);
            //
            //     reader.onload = () => {
            //         console.log(reader.result);
            //     };
            // })
            // event.target.files.map(item => {
            //     console.log(event.target.files)
            // })
            // const reader = new FileReader();
            // reader.readAsDataURL(event.target.files);
            //
            // reader.onload = () => {
            //     console.log(reader.result);
            // };
        }

        const emptyInputImages = () => {
            const fileInput = document.getElementById('advertise-image');
            console.log(fileInput.value);
            advertiseStore.emptySliderImagesSrc();
        }

        return {
            titleError,
            handleMultipleFileUpload,
            uploadedImages,
            emptyInputImages,
        }
    }
}
</script>
