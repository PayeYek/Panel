<script>
export default {
    name: "ShowPassword",
    data() {
        return {
            isShow: false
        }
    },
    props: {
        input: null,
        ltr:false
    },
    methods: {
        toggle() {
            let elems = document.querySelectorAll(`input[name="${this.input}"]`);
            [].forEach.call(elems, function (el) {
                if (el.type === "password") {
                    el.type = "text";
                } else {
                    el.type = "password";
                }
            });
            this.isShow = !this.isShow;
        }
    }
}
</script>

<template>
    <div :class="{'right-0':ltr, 'ltr:right-0 rtl:left-0':!ltr}"
        class="cursor-pointer text-gray-400 hover:text-primary-500 absolute h-full px-2 grid place-items-center transition duration-200"
        @click.prevent="toggle"
    >
        <svg v-if="isShow" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
             aria-hidden="true">
            <path
                d="M21.271 9.178c-.29-.46-.6-.89-.92-1.29a1 1 0 00-1.49-.09l-3 3c.22.66.26 1.42.06 2.21a4.021 4.021 0 01-2.9 2.9c-.79.2-1.55.16-2.21-.06l-2.46 2.46c-.5.5-.34 1.38.33 1.64 1.07.41 2.18.62 3.32.62 1.78 0 3.51-.52 5.09-1.49 1.61-1 3.06-2.47 4.23-4.34.95-1.51.9-4.05-.05-5.56zM14.02 9.98l-4.04 4.04c-.51-.52-.84-1.24-.84-2.02 0-1.57 1.28-2.86 2.86-2.86.78 0 1.5.33 2.02.84z"/>
            <path
                d="M18.25 5.75l-3.39 3.39A3.986 3.986 0 0012 7.96c-2.24 0-4.04 1.81-4.04 4.04 0 1.12.45 2.13 1.18 2.86l-3.38 3.39h-.01c-1.11-.9-2.13-2.05-3-3.41-1-1.57-1-4.12 0-5.69C3.91 7.33 5.33 5.9 6.91 4.92c1.58-.96 3.31-1.49 5.09-1.49 2.23 0 4.39.82 6.25 2.32zM14.858 11.998c0 1.57-1.28 2.86-2.86 2.86-.06 0-.11 0-.17-.02l3.01-3.01c.02.06.02.11.02.17z"/>
            <path
                d="M21.769 2.229c-.3-.3-.79-.3-1.09 0l-18.45 18.46c-.3.3-.3.79 0 1.09a.758.758 0 001.08-.01l18.46-18.46c.31-.3.31-.78 0-1.08z"/>
        </svg>
        <svg v-else class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
             aria-hidden="true">
            <path
                d="M21.25 9.15C18.94 5.52 15.56 3.43 12 3.43c-1.78 0-3.51.52-5.09 1.49-1.58.98-3 2.41-4.16 4.23-1 1.57-1 4.12 0 5.69 2.31 3.64 5.69 5.72 9.25 5.72 1.78 0 3.51-.52 5.09-1.49 1.58-.98 3-2.41 4.16-4.23 1-1.56 1-4.12 0-5.69zM12 16.04c-2.24 0-4.04-1.81-4.04-4.04S9.76 7.96 12 7.96s4.04 1.81 4.04 4.04-1.8 4.04-4.04 4.04z"/>
            <path d="M11.998 9.14a2.855 2.855 0 000 5.71c1.57 0 2.86-1.28 2.86-2.85s-1.29-2.86-2.86-2.86z"/>
        </svg>

    </div>
</template>
