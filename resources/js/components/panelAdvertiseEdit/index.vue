<template>
    <section class="-m-4 md:m-0 px-4 pb-4 shadow-md sm:rounded-lg bg-white dark:bg-gray-800 relative scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-white dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-800 overflow-y-auto">

    </section>
</template>

<script>
import {ref} from "vue";
import axios from "axios";

export default {
    name: 'Panel Edit Advertise',
    props: {
        listItem: Number,
    },
    setup(props){
        const advertiseId = ref(props.listItem);

        const loadData = async () => {
            await axios.get(`/api/ad/${advertiseId.value}`)
                .then(function (response) {
                    // handle success
                    console.log(response.data)
                    if(response.data.status == 200){
                        // advertiseStore.saveCategoryMain(response.data.data);
                        // categoryLoaded.value = true;
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);

                })
                .finally(function () {
                    // always executed
                });
        }

        loadData();
    }
}
</script>
