<template>
    <svg :class="classNames" viewBox="0 0 188 150" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="160" cy="123" r="27" fill="#F3F3F4" />
        <circle cx="16" cy="62" r="16" fill="#F3F3F4" />
        <circle cx="123" cy="65" r="64" stroke="#F3F3F4" stroke-width="2" stroke-dasharray="4 4" />
    </svg>
</template>

<script>
export default {
    name: 'Form Icon Two',
    props: {
        classNames: String,
    }
}
</script>