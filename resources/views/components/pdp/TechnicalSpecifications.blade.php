@props(['radius' => '8'])

<x-splade-data default="{ toggle: false }">
    <li class="p-4 drop-shadow-base bg-white {{ $radius }} lg:pr-16 lg:pl-8 xl:pr-28">
        {{-- title --}}
        <div class="flex items-center justify-between">
            <p class="text-sm lg:text-base font-bold"> مشخصات فنی </p>
            <button type="button" class="cursor-pointer" @click="data.toggle = !data.toggle">
                <svg class="duration-1000" :class="data.toggle ? 'rotate-180' : 'rotate-0'" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <ul class="list-inside list-disc marker:text-gray-900 text-sm lg:text-base font-normal flex flex-col gap-2 duration-1000 overflow-hidden lg:pr-2" v-bind:class="data.toggle ? 'max-h-96 pb-4 mt-4' : 'max-h-0 pb-0'">
            <li class=""> مدل کامیون: N721-KGT </li>
            <li class=""> مدل کامیون: N721-KGT </li>
            <li class=""> مدل کامیون: N721-KGT </li>
            <li class=""> مدل کامیون: N721-KGT </li>
            <li class=""> مدل کامیون: N721-KGT </li>
        </ul>
    </li>
</x-splade-data>