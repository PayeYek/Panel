import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import "@protonemedia/laravel-splade/dist/jodit.css";
// import "./common";

import SwitchStyle from "@/components/SwitchStyle.vue";
import Breakpoint from "@/components/Breakpoint.vue";
import CopyText from "@/components/CopyText.vue";
import Slider from "@/components/Slider.vue";
import PersianDate from "@/components/PersianDate.vue";
import ShowPassword from "@/components/ShowPassword.vue";
import LandBtn from "@/components/LandBtn.vue";
import landPdpMobileSlider from "@/components/landPdpMobileSlider.vue";
import landPdpDesktopSlider from "@/components/landPdpDesktopSlider.vue";
import CategoryFilter from "@/components/category/CategoryFilter.vue";
import Products from "@/components/home/Products.vue";
import HomeArticles from "@/components/home/HomeArticles.vue";
import Articles from "@/components/articles/Articles.vue";
import MoreArticles from "@/components/articles/MoreArticles.vue";
import PdpMoreArticles from "@/components/articles/PdpMoreArticles.vue";
import ArticleLink from "@/components/articles/ArticleLink.vue";
import AmChart from "@/components/map/AmChart.vue";
import Branches from "@/components/map/Branches.vue";
import Videos from "@/components/videos/Videos.vue";
import Computing from "@/components/computing/index.vue";
import Facilities from "@/components/computing/children/Facilities.vue";
import Advertise from "@/components/advertise/Advertise.vue";
import FormIconOne from "@/components/computing/children/Icons/FormIconOne.vue";
import FormIconTwo from "@/components/computing/children/Icons/FormIconTwo.vue";
import PdpCounseling from "@/components/pdp/counseling.vue";
import PanelAdvertise from "@/components/panelAdvertise/index.vue";
import PanelAdvertiseEdit from "@/components/panelAdvertiseEdit/index.vue";
import { createPinia } from 'pinia';  // Import Pinia
// import Swiper from 'swiper';
// import 'swiper/css/bundle';
// let Swiper = require('swiper');

import { createApp } from "vue";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

const el = document.getElementById("app");

// const clickOutside = {
//     beforeMount: (el, binding) => {
//         el.clickOutsideEvent = event => {
//             // here I check that click was outside the el and his children
//             if (!(el == event.target || el.contains(event.target))) {
//                 // and if it did, call method provided in attribute value
//                 binding.value();
//             }
//         };
//         document.addEventListener("click", el.clickOutsideEvent);
//     },
//     unmounted: el => {
//         document.removeEventListener("click", el.clickOutsideEvent);
//     },
// };

const app = createApp({ render: renderSpladeApp({ el }) });

const pinia = createPinia();

app.use(pinia);

app.use(SpladePlugin,
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
    .component('Products', Products)
    .component('HomeArticles', HomeArticles)
    .component('Articles', Articles)
    .component('MoreArticles', MoreArticles)
    .component('PdpMoreArticles', PdpMoreArticles)
    .component('ArticleLink', ArticleLink)
    .component('AmChart', AmChart)
    .component('Branches', Branches)
    .component('Videos', Videos)
    .component('Computing', Computing)
    .component('Facilities', Facilities)
    .component('Advertise', Advertise)
    .component('FormIconOne', FormIconOne)
    .component('FormIconTwo', FormIconTwo)
    .component('PdpCounseling', PdpCounseling)
    .component('PanelAdvertise', PanelAdvertise)
    .component('PanelAdvertiseEdit', PanelAdvertiseEdit)
    // .directive("click-outside", clickOutside)
    .mount(el);



// app.mount("#app");

window.onload = function () {
    if (document.querySelector('.loader-hide-scrollbar')) {
        document.getElementById('loader-head').remove()

        let elems = document.querySelectorAll(".loader-hide-scrollbar");

        [].forEach.call(elems, function (el) {
            el.classList.remove("loader-hide-scrollbar");
        });
    }
}

if(document.getElementById('scrollToTopBtn')){
    document.getElementById('scrollToTopBtn').addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    })
}

// export function* numberWithCommas (price) {
//     return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
// }
