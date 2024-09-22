<template>
    <Link :href="href" :class="classNames">
        <slot />
    </Link>
</template>

<script>
// import { Link } from 'vue';

export default {
    name: 'ArticleLink',

    props: {
        href: {
            type: String,
            default: null,
        },
        classNames: {
            type: String,
            default: null,
        },
    },
}
</script>