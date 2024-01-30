import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";
//import scrollbar from "tailwind-scrollbar";
//import flowbite from "flowbite/plugin";

/* @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./resources/js/flowbite/**/*.js",
        "./node_modules/flowbite/**/*.js"
        // "./app/Forms/*.php",
        // "./app/Tables/*.php",
    ],

    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
            },
            screens: {
                '3xl': '1600px',
            },
            fontFamily: {
                morabba: "Morabba !important",
                bakh: "YekanBakh !important",
                bakhfa: "YekanBakhFA !important",
                yekan: "IRANYekan !important",
                iran: "IRANSansX, serif !important",
                inter: "Inter, IRANSansX, sans-serif !important",
            }
        },
    },

    plugins: [
        // forms,
        typography,
        require('tailwind-scrollbar')({ nocompatible: true }),
        require('flowbite/plugin')
    ],
};
