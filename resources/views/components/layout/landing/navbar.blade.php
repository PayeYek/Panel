@props([
    'land' => '',
    'classNames' => '',
])

<nav :class="'text-slate-700 text-base mb-16 font-bold *:h-10 *:px-4 *:rounded-custom *:bg-[#f5f5f5] *:w-full *:flex *:items-center flex-col gap-4 {{ $classNames }}'">
    <Link class="focus:bg-[#eaeaea]" href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Home')}}</Link>
    <Link class="focus:bg-[#eaeaea]" href="{{ route('landing.product.list', ['page' => $land->slug]) }}">{{__('Products')}}</Link>
    <Link class="focus:bg-[#eaeaea]" href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Sales Agency')}}</Link>
    <Link class="focus:bg-[#eaeaea]" href="{{ route('landing.page.about', ['page'=>$land->slug]) }}">{{__('About us')}}</Link>
</nav>