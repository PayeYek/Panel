<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ \App\Support\Help::isRTL() ? 'rtl' : 'ltr' }}" class="dark scrollbar-none">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <x-layout.loader.style/>
        <x-favicon/>

        @spladeHead
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased scrollbar-none loader-hide-scrollbar">
        <x-layout.loader.html/>
        @splade
    </body>
</html>
