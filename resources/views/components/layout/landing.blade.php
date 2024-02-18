<div class="antialiased bg-gray-white dark:bg-gray-900 font-inter rtl:font-iran rtl:number-fa">
{{--    <x-layout.landing.navbar/>--}}
{{--    <x-layout.landing.sidebar/>--}}
    <!-- Hotjar Tracking Code for https://paye1.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:3837026,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    {{--MAIN--}}
    <main class="relative h-auto min-h-screen text-gray-800 dark:text-white max-w-screen-xl mx-auto">

        {{ $slot }}

    </main>
</div>
