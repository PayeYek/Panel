@props([
    'land' => '',
    'classNames' => '',
])

<nav :class="'text-stone-700 text-base mb-16 *:h-10 *:px-4 *:rounded-custom *:bg-[#f5f5f5] *:w-full *:flex *:items-center flex-col lg:flex-row lg:items-center lg:*:h-auto lg:*:px-8 lg:*:rounded-none lg:*:w-auto lg:*:bg-transparent lg:mb-0 gap-4 lg:*:border-l lg:*:border-l-[#ccc] lg:gap-0 lg:*:leading-5 {{ $classNames }}'">
    <Link class="focus:bg-[#eaeaea] lg:hover:text-stone-900 lg:focus:bg-transparent font-medium lg:first:pr-0 lg:last:pl-0 lg:last:border-l-0" href="{{ route('landing.page.show', ['page'=>$land->slug]) }}">{{__('Home')}}</Link>
    <Link class="focus:bg-[#eaeaea] lg:hover:text-stone-900 lg:focus:bg-transparent font-medium lg:first:pr-0 lg:last:pl-0 lg:last:border-l-0" href="{{ route('landing.product.list', ['page' => $land->slug]) }}">{{__('Products')}}</Link>
    <a class="focus:bg-[#eaeaea] lg:hover:text-stone-900 lg:focus:bg-transparent font-medium lg:first:pr-0 lg:last:pl-0 lg:last:border-l-0" href="{{ route('landing.sales', ['page' => $land->slug]) }}">{{__('Sales Agency')}}</a>
    <Link class="focus:bg-[#eaeaea] lg:hover:text-stone-900 lg:focus:bg-transparent font-medium lg:first:pr-0 lg:last:pl-0 lg:last:border-l-0" href="{{ route('landing.article.list', ['page' => $land->slug, 'f' => 'sell']) }}">{{__('Notify')}}</Link>
    <Link class="focus:bg-[#eaeaea] lg:hover:text-stone-900 lg:focus:bg-transparent font-medium lg:first:pr-0 lg:last:pl-0 lg:last:border-l-0" href="{{ route('landing.page.calculator', ['page'=>$land->slug]) }}"> {{__('Load Calculator')}} </Link>
    <Link class="focus:bg-[#eaeaea] lg:hover:text-stone-900 lg:focus:bg-transparent font-medium lg:first:pr-0 lg:last:pl-0 lg:last:border-l-0" href="{{ route('landing.page.about', ['page'=>$land->slug]) }}">{{__('About us')}}</Link>
</nav>
