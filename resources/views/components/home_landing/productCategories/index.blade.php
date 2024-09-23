@props([
    'colorPalette' => '1',
    'data' => '',
    'landSlug' => '',
])

@php
    // $linkStyle = match($colorPalette) {
    //     '1' => 'hover:text-red-800 hover:shadow-red-800/50',
    //     '2' => 'shadow-blue-700/50 hover:text-blue-800 text-blue-700 hover:shadow-blue-800/50',
    //     '3' => 'shadow-rose-700/50 hover:text-rose-800 text-rose-700 hover:shadow-rose-800/50',
    //     '4' => 'shadow-zinc-700/50 hover:text-zinc-800 text-zinc-700 hover:shadow-zinc-800/50',
    //     '5' => 'shadow-cobalt-700/50 hover:text-cobalt-800 text-cobalt-700 hover:shadow-cobalt-800/50',
    //     default => null
    // };
    
@endphp

@push('script')
    <script>
        function changeTheme(theme){
            console.log(theme.value);
            // const root = document
            console.log(document.documentElement.className);
            document.documentElement.className = theme.value
            // root.className = theme
        }

        // document.getElementById("themeChanger").addEventListener("change", function(){
        //     console.log(this.value);
        //     // changeTheme(this.value);
        // })
    </script>
@endpush
{{-- @dd($data); --}}
<section
    class="default_container flex items-center flex-col md:flex-row gap-2.5 lg:gap-3 mb-9 lg:mb-16 md:justify-start relative z-[1]">
    <h3 class="text-lg font-medium text-gray-900 dark:text-white"> محصولات </h3>
    <div
        class="flex flex-col flex-wrap items-center content-center w-full h-20 text-base font-medium md:flex-row md:flex-nowrap md:content-normal md:h-auto gap-y-4 gap-x-5">
        @foreach ($data as $item)
            <a href="{{ route('landing.product.category', ['page' => $landSlug, 'category' => $item["category"]->slug]) }}"
                class="h-8 rounded-custom w-36 flex_center bg-white shadow-[0_2px_8px] shadow-shadowLight text-normal hover:text-focus ">
                {{ $item["category"]->title }}
            </a>
        @endforeach
    </div>
</section>