<template>
    <section :class="classNames">
        <h5 class="text-xl sm:text-2xl font-medium p-4 tracking-tight text-gray-900 dark:text-white rtl:font-bakh">
            مشخصات عمومی را وارد کنید
        </h5>

        <section class="grid gap-5 grid-cols-1 lg:grid-cols-2">
            <label class="block group/input" for="advertise-title">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  عنوان </span>
                <div
                    class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/input:ring-1 group-focus-within/input:ring-primary-500 group-focus-within/input:border-primary-500 transition duration-200">
                    <div class="relative flex flex-1">
                        <input type="text" id="advertise-title" v-model="title"
                               class="min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 dark:text-white w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed rounded-[7px]"/>
                    </div>
                </div>
            </label>

            <label class="block group/input" for="advertise-price">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  قیمت (تومان) </span>
                <div
                    class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/input:ring-1 group-focus-within/input:ring-primary-500 group-focus-within/input:border-primary-500 transition duration-200">
                    <div class="relative flex flex-1">
                        <input type="number" id="advertise-price" v-model="price"
                               class="min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 dark:text-white w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed rounded-[7px]"/>
                    </div>
                </div>
            </label>

            <Statecity />

            <label class="block group/input" for="advertise-main-image">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> عکس خودرو </span>
                <div
                    class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/input:ring-1 group-focus-within/input:ring-primary-500 group-focus-within/input:border-primary-500 transition duration-200">
                    <div class="relative flex flex-1">
                        <input type="file" id="advertise-main-image" @change="handleFileUpload"
                               class="min-h-[2.5rem] px-3 block bg-gray-50 dark:bg-gray-700 dark:text-white w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed rounded-[7px]"/>
                    </div>
                </div>
            </label>

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

            <label class="block group/textarea col-span-full" for="advertise-description">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> توضیحات </span>
                <div
                    class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/textarea:ring-1 group-focus-within/textarea:ring-primary-500 group-focus-within/textarea:border-primary-500 transition duration-200">
                    <textarea v-model="description" id="advertise-description" class="rounded-[7px] px-3 block bg-gray-50 dark:bg-gray-700 w-full border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed"></textarea>
                </div>
            </label>
        </section>
    </section>
</template>

<script>
import {ref, onMounted, computed, watch} from 'vue';
import {useAdvertise} from "@/store/panel/advertise/index.js";
import Statecity from "@/components/panelAdvertise/children/introduction/statecity/index.vue";

export default {
    name: 'Introduction',
    props: {
        classNames: String,
    },
    components: {
        Statecity,
    },
    setup(){
        const advertiseStore = useAdvertise();
        const title = ref(null);
        const price = ref(null);
        const description = ref(null);
        const files = ref(null);
        const multipleFiles = ref(null);
        const fileName = computed(() => files.value?.name);
        const fileExtension = computed(() => fileName.value?.substr(fileName.value?.lastIndexOf(".") + 1));
        const fileMimeType = computed(() => files.value?.type);
        const formData = ref(new FormData());
        const multipleImages = ref([]);

        const handleFileUpload = (event) => {
            let formdata = new FormData()
            // files.value = event.target.files[0];
            console.log(event.target.files[0])
            formdata.append('file', event.target.files[0]);
            console.log(formdata)

            // const reader = new FileReader();
            // reader.readAsDataURL(files.value);
            // reader.onload = async () => {
            //     const encodedFile = reader.result.split(",")[1];
            //     formdata.append('file', encodedFile);
            //     console.log(formdata)
            //     const data = {
            //         file: encodedFile,
            //         fileName: fileName.value,
            //         fileExtension: fileExtension.value,
            //         fileMimeType: fileMimeType.value,
            //     };
            //
            //
                advertiseStore.savePrimaryImage(formdata);
            // };
        }

        const handleMultipleFileUpload = (event) => {
            // let formData = new FormData();

            multipleFiles.value = event.target.files;
            for (var i = 0; i < multipleFiles.value.length; i++ ){
                let file = multipleFiles.value[i];
                formData.value['file[' + i + ']'] = file;
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = async () => {
                    const encodedFile = reader.result.split(",")[1];
                    // console.log(encodedFile)
                    const data = {
                        file: encodedFile,
                        fileName: file?.name,
                        fileExtension: file.name?.substr(file.name?.lastIndexOf(".") + 1),
                        fileMimeType: file?.type,
                    };
                    multipleImages.value.push(data);
                };
            }
            advertiseStore.saveSliderImages(multipleImages.value);
            console.log(multipleImages.value);
            //Upload to server
        }

        watch(description, n => {
            advertiseStore.saveDescription(n);
        })

        watch(title, n => {
            advertiseStore.saveTitle(n);
        })

        watch(price, n => {
            advertiseStore.savePrice(n);
        })

        return {
            handleFileUpload,
            description,
            handleMultipleFileUpload,
            title,
            price,
        }
    }
}
</script>
