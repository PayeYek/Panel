@push('script')
    <script>
        
        function showVideoByThumbnail(e) {
            const videoHolder = document.getElementById('ifame-box')
            const videocontainer = document.getElementById('ifame-container')
            const videoHtml = e.parentElement
            const videoFromServer = videoHtml.dataset.videolink
            // const videocontainer = document.getElementById('ifame-container')
            // console.log(videocontainer);
            // videoHolder.innerHTML= ""
            videoHolder.innerHTML = videoFromServer
            videocontainer.classList.remove("hidden")
            videocontainer.classList.add("flex_center")
        }
        
        function hideVideoByThumbnail(e) {
            const iframe = e.childNodes[0].childNodes[1].childNodes[1]
            const refreshSrc = iframe.src
            iframe.src = refreshSrc
            const videocontainer = document.getElementById('ifame-container')
            videocontainer.classList.remove("flex_center")
            videocontainer.classList.add("hidden")
            // const videoHolder = document.getElementById('ifame-box')
            // videoHolder.innerHTML= ""
            // close old video
        }
    </script>
@endpush

<x-layout.default.main :land="$land">

    <main class="pt-4 relative mb-8 sm:mb-24 lg:mb-28">
        {{-- breadcrumbs --}}
        <x-common_landing.breadcrumbs :data="$breadcrumbs" />

        <section class="flex flex-col gap-4 mb-8 lg:mb-16 default_container sm:flex-row-reverse sm:justify-between sm:items-center">
            <section class="relative w-full h-12 sm:w-72">
                <input type="text"
                    class="w-full h-full outline-none border-b border-x-0 border-t-0 border-b-dark-100 focus:ring-0 focus:border-b-dark-100 pl-10 pr-3 placeholder:text-[#888b93] text-sm font-normal text-stone-700"
                    placeholder="جستجو مطلب" v-model="searchFilterState" />
                <div class="absolute flex-none w-8 h-8 left-2 top-2 flex_center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.9284 17.0396L20.4016 20.3996M19.2816 11.4396C19.2816 15.7695 15.7715 19.2796 11.4416 19.2796C7.11165 19.2796 3.60156 15.7695 3.60156 11.4396C3.60156 7.1097 7.11165 3.59961 11.4416 3.59961C15.7715 3.59961 19.2816 7.1097 19.2816 11.4396Z"
                            stroke="#111827" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
            </section>
    
            <!-- filters -->
            <ul
                class="flex items-center flex-wrap gap-x-2 gap-y-4 list-none text-base font-medium *:rounded-custom *:flex_center *:h-8 *:px-3 *:cursor-pointer *:border *:border-stone-700 *:text-stone-700">
                <li> جدید ترین </li>
                <li> قدیمی ترین </li>
                <li> پربیننده ترین </li>
            </ul>
        </section>


        <section class="grid grid-cols-1 sm:grid-cols-2 gap-5 default_container">
            @foreach ($land->videos as $video)
                <div class="w-full" data-videoLink="{{ $video->link }}">
                    <div class="relative w-full pt-[62%] cursor-pointer rounded-custom overflow-hidden videoThumbnails" onclick="showVideoByThumbnail(this)">
                        <img src="{{ $video->image }}" alt="{{ $video->alt }}" class="absolute top-0 left-0 w-full h-full object-cover z-[1]" />
                        <x-icons.playIcon class="size-14 sm:w-20 sm:h-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[3]" />
                        <div class="absolute text-white bottom-0 left-0 w-full z-[2] flex flex-col justify-end px-4 pb-5 bg-gradient-to-t from-black/90 to-transparent h-1/2">
                            <p class="w-full text-sm font-medium sm:text-lg line-clamp-1"> {{ $video->alt }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <section class="fixed inset-0 z-[4] bg-black/60 hidden" id="ifame-container"
            onclick="hideVideoByThumbnail(this)">
            <div class="w-full max-w-[640px] lg:max-w-[796px] xl:max-w-[900px] 2xl:max-w-[1024px] mx-auto iframe_styles flex_center"
                id="ifame-box"></div>
        </section>

    </main>

</x-layout.default.main>