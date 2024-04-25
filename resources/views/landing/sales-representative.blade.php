@php
    $borderStyle = match($land->styles->border_type."") {
        '0'  => 'drop-shadow-base border-0',
        '1' => 'border-stone-700/20 focus:ring-0 focus:border-stone-700/20',
        default => 'drop-shadow-base',
    };
@endphp

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var pathname = window.location.pathname;
            var containsArianDiesel = pathname.includes('arian-diesel');
            if (containsArianDiesel) {
                document.getElementById('sale-title').classList.remove('hidden');
                document.getElementById('sale-subtitle').classList.remove('hidden');
                document.getElementById('sale-desc').classList.remove('hidden');
            }
        });
                    
    </script>
@endpush

<x-layout.default.main :land="$land">
    <main class="pt-4 relative mb-8 sm:mb-24 lg:mb-28">
        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        {{-- titles --}}
        <section class="default_container">
            {{-- <p class="text-[10px] md:text-sm md:font-medium font-normal mb-6 text-stone-700"> نمایندگی فروش </p> --}}
            <h1 id="sale-title" class="text-center px-8 text-2xl md:text-[32px] font-normal mb-5 md:mb-8 text-normal hidden"> نمایندگی 2111 آرین دیزل </h1>
            <h3 id="sale-subtitle" class="text-xl font-normal mb-6 text-stone-700 md:text-2xl hidden"> آرین دیزل </h3>
            <p id="sale-desc" class="text-justify text-sm md:text-base md:mb-10 lg:mb-14 font-normal leading-6 md:leading-7 mb-5 hidden">
                شرکت آرین دیزل پایا به عنوان نماینده رسمی خودروهای سبک تجاری (Light Truck) شرکت جک موتورز در ایران می باشد که با بهره وری از تجارب ارزنده مدیران و مهندسان خویش در عرصه خودروسازی، نسبت به انتخاب و عرضه محصولات کیفی، قابل اطمینان و رقابتی اقدام نموده است. با توجه به خط مشی این شرکت و در راستای کسب حداکثری رضایت مشتریان، شرکت آرین دیزل نسبت به ارائه مدل های مناسب، سخت کار و سازگار با اقلیم ایران با قیمت های رقابتی و شرایط فروش متنوع و نیز خدمات پس از فروش بطور گسترده در سطح کشور اقدام نموده است.
            </p>

            {{-- chart --}}
            <AmChart borderStyle="{{ $borderStyle }}" />
        </section>
        {{-- send message --}}
        {{-- @switch($land->styles->land_id)
            @case(1)
            @case(2)
                <x-home_landing.contact.type-three />
            @break

            @case(7)
                <x-home_landing.contact.type-two />
            @break

        @endswitch --}}
    </main>
</x-layout.default.main>

