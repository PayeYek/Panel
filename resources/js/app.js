import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import "@protonemedia/laravel-splade/dist/jodit.css";
// import "./common";


import SwitchStyle from "@/components/SwitchStyle.vue";
import Breakpoint from "@/components/Breakpoint.vue";
import CopyText from "@/components/CopyText.vue";
import PersianDate from "@/components/PersianDate.vue";
import ShowPassword from "@/components/ShowPassword.vue";
import ChatMessages from "@/components/ChatMessages.vue";


import { createApp } from "vue";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

/** PWA ****************/
// import { registerSW } from 'virtual:pwa-register';
//
// const updateSW = registerSW({
//     onNeedRefresh() {},
//     onOfflineReady() {},
// });
/** PWA ****************/

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

// const pinia = createPinia();
//
// app.use(pinia);

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
    .component('SwitchStyle', SwitchStyle)
    .component('Breakpoint', Breakpoint)
    .component('CopyText', CopyText)
    .component('PersianDate', PersianDate)
    .component('ShowPassword', ShowPassword)
    .component('ChatMessages', ChatMessages)

    // .component('Priority', Priority)
    //.component('Slider', Slider)
    //.component('LandBtn', LandBtn)
    //.component('landPdpMobileSlider', landPdpMobileSlider)
    //.component('landPdpDesktopSlider', landPdpDesktopSlider)
    //.component('CategoryFilter', CategoryFilter)
    //.component('Products', Products)
    //.component('HomeArticles', HomeArticles)
    //.component('Articles', Articles)
    //.component('MoreArticles', MoreArticles)
    //.component('PdpMoreArticles', PdpMoreArticles)
    //.component('ArticleLink', ArticleLink)
    //.component('AmChart', AmChart)
    //.component('Branches', Branches)
    //.component('Videos', Videos)
    //.component('Computing', Computing)
    //.component('Facilities', Facilities)
    //.component('Advertise', Advertise)
    //.component('FormIconOne', FormIconOne)
    //.component('FormIconTwo', FormIconTwo)
    //.component('PdpCounseling', PdpCounseling)
    //.component('PanelAdvertise', PanelAdvertise)
    //.component('PanelAdvertiseEdit', PanelAdvertiseEdit)
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

/** PWA ****************/
// if ('serviceWorker' in navigator && 'PushManager' in window) {
//     // navigator.serviceWorker.register('/build/assets/service-worker.js').then(registration => {
//     navigator.serviceWorker.register('/service-worker.js').then(registration => {
//         console.log('Service Worker registered with scope:', registration.scope);
//
//         Notification.requestPermission(status => {
//             console.log('Notification permission status:', status);
//         });
//     });
// }
/** PWA ****************/
