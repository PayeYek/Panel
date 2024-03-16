import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import "@protonemedia/laravel-splade/dist/jodit.css";

import SwitchStyle from "@/components/SwitchStyle.vue";
import Breakpoint from "@/components/Breakpoint.vue";
import CopyText from "@/components/CopyText.vue";
import Slider from "@/components/Slider.vue";
import PersianDate from "@/components/PersianDate.vue";
import ShowPassword from "@/components/ShowPassword.vue";
import LandBtn from "@/components/LandBtn.vue";
import landPdpMobileSlider from "@/components/landPdpMobileSlider.vue";
import landPdpDesktopSlider from "@/components/landPdpDesktopSlider.vue";
import CategoryFilter from "@/components/CategoryFilter.vue";
import Articles from "@/components/articles/Articles.vue";
import MoreArticles from "@/components/articles/MoreArticles.vue";
import ArticleLink from "@/components/articles/ArticleLink.vue";
import AmChart from "@/components/map/AmChart.vue";
import Branches from "@/components/map/Branches.vue";
// import Swiper from 'swiper';
// import 'swiper/css/bundle';
// let Swiper = require('swiper');

import { createApp } from "vue";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

const el = document.getElementById("app");

const clickOutside = {
    beforeMount: (el, binding) => {
        el.clickOutsideEvent = event => {
            // here I check that click was outside the el and his children
            if (!(el == event.target || el.contains(event.target))) {
                // and if it did, call method provided in attribute value
                binding.value();
            }
        };
        document.addEventListener("click", el.clickOutsideEvent);
    },
    unmounted: el => {
        document.removeEventListener("click", el.clickOutsideEvent);
    },
};

createApp({ render: renderSpladeApp({ el }) })
    .use(SpladePlugin,
        {
            "max_keep_alive": 10,
            "transform_anchors": false,
            'progress_bar': {
                delay: 250,
                color: "#ef0e0e",
                css: true,
                spinner: false,
            }
        })
    .component('Slider', Slider)
    .component('SwitchStyle', SwitchStyle)
    .component('Breakpoint', Breakpoint)
    .component('CopyText', CopyText)
    .component('PersianDate', PersianDate)
    .component('ShowPassword', ShowPassword)
    .component('LandBtn', LandBtn)
    .component('landPdpMobileSlider', landPdpMobileSlider)
    .component('landPdpDesktopSlider', landPdpDesktopSlider)
    .component('CategoryFilter', CategoryFilter)
    .component('Articles', Articles)
    .component('MoreArticles', MoreArticles)
    .component('ArticleLink', ArticleLink)
    .component('AmChart', AmChart)
    .component('Branches', Branches)
    .directive("click-outside", clickOutside)
    .mount(el);

window.onload = function () {
    if (document.querySelector('.loader-hide-scrollbar')) {
        document.getElementById('loader-head').remove()

        let elems = document.querySelectorAll(".loader-hide-scrollbar");

        [].forEach.call(elems, function (el) {
            el.classList.remove("loader-hide-scrollbar");
        });
    }
}

