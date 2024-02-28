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

 import {createApp} from "vue";
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
     .component('Slider', Slider)
     .component('SwitchStyle', SwitchStyle)
     .component('Breakpoint', Breakpoint)
     .component('CopyText', CopyText)
     .component('PersianDate', PersianDate)
     .component('ShowPassword', ShowPassword)
     .component('LandBtn', LandBtn)
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

