import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import "@protonemedia/laravel-splade/dist/jodit.css";


import SwitchStyle from "@/components/SwitchStyle.vue";
import Breakpoint from "@/components/Breakpoint.vue";
import PersianDate from "@/components/PersianDate.vue";
import ShowPassword from "@/components/ShowPassword.vue";
// require('plyr')
import Plyr from 'plyr';
// window.Swiper = require('swiper');
import "./swiper"


import Flickity from "flickity";
import "flickity/css/flickity.css";

import {createApp} from "vue/dist/vue.esm-bundler.js";
import {renderSpladeApp, SpladePlugin} from "@protonemedia/laravel-splade";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({el})
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        'progress_bar': {
            delay: 250,
            color: "#ef0e0e",
            css: true,
            spinner: false,
        }
    })
    .component('SwitchStyle', SwitchStyle)
    .component('Breakpoint', Breakpoint)
    .component('PersianDate', PersianDate)
    .component('ShowPassword', ShowPassword)
    // .component('Plyr', Plyr)
    .mount(el);

window.onload = function () {
    document.getElementById('loader-head').remove()

    let elems = document.querySelectorAll(".loader-hide-scrollbar");

    [].forEach.call(elems, function (el) {
        el.classList.remove("loader-hide-scrollbar");
    });

    // const player = new Plyr('#player');

}

/* SLIDER */
Flickity('.main-carousel', {
    pageDots: false, prevNextButtons: false, autoPlay: 500, cellAlign: "left", contain: true
});

const player1 = new Plyr('#player1');
const player2 = new Plyr('#player2');
const player3 = new Plyr('#player3');