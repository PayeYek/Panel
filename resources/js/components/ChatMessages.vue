<template>
    <div>
        <span v-text="messages"></span>
<!--        <ul>-->
<!--            <li v-for="message in messages">{{ message.message }}</li>-->
<!--        </ul>-->
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import Pusher from 'pusher-js';

export default {
    name: 'ChatMessages',
    setup() {
        const messages = ref([]);

        onMounted(() => {
            Pusher.logToConsole = true;

            var pusher = new Pusher('bfd5f8248f1fd03e21e6', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('App\\Events\\MessageSent', function(data) {
                messages.value.push(data);
            });
        });

        return { messages };
    }
};
</script>
س شما خواهد بود...
