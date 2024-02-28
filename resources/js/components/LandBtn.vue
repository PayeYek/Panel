<template>
    <component :is="tag" :href="to" :class="classNames"> {{ text }} </component>
</template>

<script>


export default {
    name: "Landing_Button",
    // props: ['classNames', 'to', 'text'],
    // setup(props){

    //     return {
    //         classNames: props.classNames,
    //         text: props.text,
    //         to: props.to
    //     }
    // },
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