<x-layout.admin>

    <x-splade-table :for="$items"
          :primaryLink="route('panel.landing.product.product.create')"
          :title="__('Product list')"
          pagination-scroll="preserve"
    >

    @cell('product', $item)
    <Link
        slideover
        href="{{ route('panel.landing.product.product.edit', $item) }}"
        class="flex flex-col pe-10">
    <div class="flex gap-2">
        <img class="aspect-2 h-14 rounded shrink-0" src="{{$item->image}}"
             alt="{{$item->name}}">
        <div class="flex flex-col">
            <span class="truncate max-w-60">{{$item->name}}</span>
            <div class="flex gap-1 items-center mt-2 text-gray-600 dark:text-gray-500">
                {{--<div class="flex gap-1 items-center text-amber-500 dark:text-amber-500">
                    <x-iconsax-bul-mouse-square class="h-5 w-5 fill-current"/>
                    <span class="font-bold">{{$item->view}}</span>
                </div>--}}
                <svg class="h-3 w-3 fill-current opacity-50" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 33C28.9706 33 33 28.9706 33 24C33 19.0294 28.9706 15 24 15C19.0294 15 15 19.0294 15 24C15 28.9706 19.0294 33 24 33Z" fill="currentColor" stroke="currentColor" stroke-width="2"></path></svg>
                <span class="text-xs">{{$item->year}}</span>
                <svg class="h-3 w-3 fill-current opacity-50" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="48" height="48" fill="white" fill-opacity="0.01"></rect><path d="M24 33C28.9706 33 33 28.9706 33 24C33 19.0294 28.9706 15 24 15C19.0294 15 15 19.0294 15 24C15 28.9706 19.0294 33 24 33Z" fill="currentColor" stroke="currentColor" stroke-width="2"></path></svg>
                <span class="text-xs">{{$item->model}}</span>

            </div>

            <span
                class="text-sm truncate max-w-60 lg:max-w-xs text-black dark:text-white">{{$item->land->title}}</span>
        </div>
    </div>
    </Link>
    @endcell

    <x-layout.panel.timestamps/>

    @cell('attribute', $item)
    <div>
        <Link href="{{ route('panel.landing.product.product.attribute.edit', $item->id) }}">
            {{__('Attribute')}}
        </Link>
    </div>

    @endcell

    @cell('action', $item)
    <x-layout.panel.more-buttons>
        <div class="py-2 first:pt-0 last:pb-0">
            <x-layout.panel.list.edit table="landing.product.product" :item="$item"/>
        </div>
        <div class="py-2 first:pt-0 last:pb-0">
            <x-layout.panel.list.destroy table="landing.product.product" :item="$item"/>
        </div>
    </x-layout.panel.more-buttons>
    @endcell

    </x-splade-table>
</x-layout.admin>
