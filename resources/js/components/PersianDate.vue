<script>
import moment from 'jalali-moment';
export default {
    name: "PersianDate",
    props: {
        date: {
            type: String,
            default: null
        },
    }, methods: {
        jalaliDate(time) {
            return moment(time).locale('fa').format('dddd، DD MMMM YYYY');
        }
    }
}
</script>

<template>
    <span v-if="date" v-text="jalaliDate(date)"></span>
</template>
