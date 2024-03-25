<template>

</template>

<script>
export default {
    name: 'Product',
    props: {
        type: [String, Number],
        evenOdd: Boolean,
        data: Array,
        landSlug: String,
        borderType: Number,
    },
    setup(props){
        console.log(props.data);
    }
}
</script>