import {defineConfig} from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import {VitePWA} from 'vite-plugin-pwa';

export default defineConfig({
    server: {
        // host: '127.0.0.1',
        // host: '192.168.140.78',
        // host: '192.168.120.155',
    },
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
    },
    plugins: [
        laravel({
            input: ["resources/js/app.js"],
            ssr: "resources/js/ssr.js",
            refresh: true,
        }),
        /*VitePWA({
            registerType: 'autoUpdate',
            injectRegister: 'auto',
            srcDir: 'public',
            filename: 'service-worker.js',
            workbox: {
                globPatterns: ['**!/!*.{js,css,html,png,jpg,svg,ico}'],
                runtimeCaching: [
                    {
                        urlPattern: /^https:\/\/fonts\.googleapis\.com\/.*!/i,
                        handler: 'CacheFirst',
                        options: {
                            cacheName: 'google-fonts-stylesheets',
                        },
                    },
                    {
                        urlPattern: /^https:\/\/fonts\.gstatic\.com\/.*!/i,
                        handler: 'CacheFirst',
                        options: {
                            cacheName: 'google-fonts-webfonts',
                        },
                    },
                ],
            },
            manifest: {
                name: 'Paye1 Panel',
                short_name: 'Paye1Panel',
                start_url: '/panel',
                display: 'standalone',
                background_color: '#f7f7f7',
                theme_color: '#1d4ed8',
                icons: [
                    {
                        src: 'icon.png',
                        sizes: '192x192',
                        type: 'image/png',
                    },
                    {
                        src: 'icon.png',
                        sizes: '512x512',
                        type: 'image/png',
                    },
                ],
            },
        }),*/
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    // build: {
    //     rollupOptions: {
    //         input: {
    //             'app': 'resources/js/app.js',
    //             'service-worker': 'resources/js/service-worker.js',
    //         },
    //         output: {
    //             entryFileNames: 'assets/js/[name].js',
    //         },
    //     },
    // },
    ssr: {
        noExternal: ["vue", "@protonemedia/laravel-splade"]
    },
});
