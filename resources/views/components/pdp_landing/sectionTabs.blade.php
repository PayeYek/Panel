<div class="overflow-hidden sticky top-16 sm:top-20 mb-4 z-[1] bg-white pt-2 sm:default_container">
    <div class="overflow-auto flex sm:border-b-2 sm:border-[#e7e8e9] sm:overflow-visible">
        <ul class="flex-none text-sm lg:text-base sm:gap-12 md:gap-14 lg:gap-10 mx-4 sm:mx-0 font-normal text-gray-900 gap-10 flex items-center border-b-2 border-[#e7e8e9] sm:border-b-0 l_tab_styles">
            <li class="flex-none lg:px-4 duration-0 lg:py-3 py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:opacity-0" @click="data.activeTab = 1" v-bind:class="{'text-normal before:opacity-100 font-medium before:bg-normal' : data.activeTab == 1 }"> مشخصات فنی </li>
            <li class="flex-none lg:px-4 duration-0 lg:py-3 py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:opacity-0" @click="data.activeTab = 2" v-bind:class="{'text-normal before:opacity-100 font-medium before:bg-normal' : data.activeTab == 2 }"> توضیحات تکمیلی </li>
            <li class="flex-none lg:px-4 duration-0 lg:py-3 py-2.5 cursor-pointer relative before:absolute before:content-[''] before:-bottom-0.5 before:inset-x-0 before:h-1 before:w-full before:rounded-lg before:opacity-0" @click="data.activeTab = 3" v-bind:class="{'text-normal before:opacity-100 font-medium before:bg-normal' : data.activeTab == 3 }"> دیدگاه مشتریان </li>
        </ul>
    </div>
</div>