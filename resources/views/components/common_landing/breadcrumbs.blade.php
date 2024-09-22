@props([
    'data' => '{}',
])

<ul class="default_container flex items-center text-[10px] sm:text-xs lg:text-sm font-normal gap-1.5 lg:gap-2 text-[#8A8B8C] mb-4 overflow-auto pb-1.5">
    @foreach ($data as $link)
        @if($loop->last)
            <li class="flex-none font-medium text-stone-700">
                {{ $link['title'] }}
            </li>
        @else
            <li class="flex items-center gap-1.5 flex-none">
                <a href="{{ $link['url'] }}"> {{ $link['title'] }} </a>

                <svg class="stroke-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 17L10 12L15 7" stroke="current" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </li>
        @endif
    @endforeach
</ul>