@props(['radiusSize' => '8'])

<li class="px-4 pt-4 pb-8 drop-shadow-base bg-white {{ $radiusSize }}">
    {{-- title --}}
    <div class="flex items-center justify-between mb-4">
        <p class="text-sm font-bold"> مشخصات فنی </p>
        <button type="button" class="cursor-pointer">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10L12.0008 14.58L17 10" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
    <ul class="list-inside list-disc marker:text-gray-900 text-sm font-normal flex flex-col gap-2">
        <li class=""> مدل کامیون: N721-KGT </li>
        <li class=""> مدل کامیون: N721-KGT </li>
        <li class=""> مدل کامیون: N721-KGT </li>
        <li class=""> مدل کامیون: N721-KGT </li>
        <li class=""> مدل کامیون: N721-KGT </li>
    </ul>
</li>