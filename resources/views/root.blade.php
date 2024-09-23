<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ \App\Support\Help::getDir() }}">
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

{{--        @production--}}
{{--            <x-layout.loader.style/>--}}
{{--        @endproduction--}}
        <x-favicon/>

        @spladeHead
        @vite('resources/js/app.js')
    </head>
    {{-- loader-hide-scrollbar --}}
    <body class="antialiased">
{{--        @production--}}
{{--            <x-layout.loader.html/>--}}
{{--        @endproduction--}}

        @splade

        @production
            <x-layout.seo.hotjar/>
            <x-layout.seo.gtag/>
        @endproduction
    </body>
</html>
