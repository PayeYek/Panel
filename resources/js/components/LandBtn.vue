<template>
    <component :is="tag" :href="to" :class="classNames"> {{ text }} </component>
</template>

<script>


export default {
    name: "Landing_Button",
    
    props: {
        to: {
            type: String,
            default: null,
        },
        classNames: {
            type: String,
            default: null,
        },
        text: {
            type: String,
            default: null,
        },
    },
    computed: {
        tag() {
            if (this.to) {
                return "a";
            } else {
                return "button";
            }
        },
    }
}
</script>