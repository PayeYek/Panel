import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";
import scrollbar from "tailwind-scrollbar";
import flowbite from "flowbite/plugin";

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
    safelist: [
        'iframe_styles',
    //     'before:rounded-none',
    //     'before:rounded-sm',
    //     'before:rounded',
    //     'before:rounded-xl',
    //     'before:rounded-r-none',
    //     'before:rounded-r-sm',
    //     'before:rounded-r',
    //     'before:rounded-r-xl',
    //     'rounded-none',
    //     'rounded',
    //     'rounded-sm',
    //     'rounded-xl',
    //     'first:rounded-t-none',
    //     'first:rounded-t',
    //     'first:rounded-t-sm',
    //     'first:rounded-t-xl',
    //     'last:rounded-b-none',
    //     'last:rounded-b',
    //     'last:rounded-b-sm',
    //     'last:rounded-b-xl',
    //     'sm:rounded-none',
    //     'sm:rounded',
    //     'sm:rounded-sm',
    //     'sm:rounded-xl',
    //     'gap-x-4',
    //     'gap-y-4',
    //     'sm:gap-x-4',
    //     'sm:gap-y-4',
    ],
    // darkMode: 'false',
    theme: {
        extend: {
            // backgroundColor: {
            //     normal: 'var(--theme-normal)',
            //     focus: 'var(--theme-focus)',
            // },
            colors: {
                primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a", "950": "#172554" },
                dark: {
                    "50": "#f3f3f4",
                    "100": "#CFD1D4", //apply for borders
                    "300": "#9BA3A7",
                    "500": "#818284",
                    "700": "#2e2e2e",
                },
                red: {
                    "800": "#9A0707",
                },
                blue: {
                    "700": "#2e3092",
                    "800": "#151769",
                },
                rose: {
                    "700": "#ed2027",
                    "800": "#d41118",
                },
                zinc: {
                    "700": "#0f0f0f",
                    "800": "#000",
                },
                cobalt: {
                    "700": "#241f47",
                    "800": "#1b163e",
                },
                normal: 'var(--theme-normal)',
                focus: 'var(--theme-focus)',
                shadowLight: 'var(--theme-shadow-normal)',
                shadowFocus: 'var(--theme-shadow-focus)',
            },
            dropShadow: {
                'red': '0 2px 8px rgba(185,28,28,0.3)',
                'white': '0 2px 8px rgba(255,255,255,0.3)',
                'base': '0 2px 10px rgba(0,0,0,0.15)'
            },
            boxShadow: {
                'focus': '0 0 4px',
                'lg': '0 2px 8px',
                'glass': 'inset 0 1px 4px',
                // 'normal': 'var(--theme-normal)',
                // 'focus': 'var(--theme-focus)',
            },
            screens: {
                '3xl': '1600px',
            },
            fontFamily: {
                morabba: "Morabba !important",
                bakh: "YekanBakh !important",
                bakhfa: "YekanBakhFA !important",
                yekan: "IRANYekanX, serif !important",
                iran: "IRANSansX, serif !important",
                inter: "Inter, IRANSansX, sans-serif !important",
            }
        },
    },

    plugins: [
        // forms,
        typography,
        scrollbar({ nocompatible: true }),
        flowbite
    ],
};
