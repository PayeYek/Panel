@props([
    'land' => '',
    'classNames' => '',
])

<nav :class="'text-slate-700 text-base mb-16 *:h-10 *:px-4 *:rounded-custom *:bg-[#f5f5f5] *:w-full *:flex *:items-center flex-col lg:flex-row lg:items-center lg:*:h-auto lg:*:px-0 lg:*:rounded-none lg:*:w-auto lg:*:bg-transparent lg:mb-0 gap-4 {{ $classNames }}'">
    <Link class="focus:bg-[#eaeaea] font-medium hover:font-bold focus:font-bold" href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Home')}}</Link>
    <Link class="focus:bg-[#eaeaea] font-medium hover:font-bold focus:font-bold" href="{{ route('landing.product.list', ['page' => $land->slug]) }}">{{__('Products')}}</Link>
    <Link class="focus:bg-[#eaeaea] font-medium hover:font-bold focus:font-bold" href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Sales Agency')}}</Link>
    <Link class="focus:bg-[#eaeaea] font-medium hover:font-bold focus:font-bold" href="{{ route('landing.page.about', ['page'=>$land->slug]) }}">{{__('About us')}}</Link>
</nav>