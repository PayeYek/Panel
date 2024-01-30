<x-layout.admin>

    <x-splade-table :for="$colors" search-debounce="1000" striped
                    :primaryLink="route('panel.product.variety.color.create')"
                    :title="__('Color list')"
                    slideover
                    {{--:desc="__('test test test')"--}}
                    pagination-scroll="preserve"
    >

        @cell('color', $color)
        <x-splade-data :default="$color">
            <div class="flex items-center gap-2">
                <span class="h-5 w-5 rounded-full  shrink-0"
                  :class="{
                          'bg-none-color' : data.name === 'none',
                          'bg-multi-color' : data.name === 'multi',
                          'bg-black' : data.name === 'black',
                          'bg-white' : data.name === 'white',
                          'bg-red-500 dark:bg-red-500' : data.name === 'red',
                          'bg-orange-500 dark:bg-orange-500' : data.name === 'orange',
                          'bg-amber-500 dark:bg-amber-500' : data.name === 'amber',
                          'bg-yellow-500 dark:bg-yellow-500' : data.name === 'yellow',
                          'bg-lime-500 dark:bg-lime-500' : data.name === 'lime',
                          'bg-green-500 dark:bg-green-500' : data.name === 'green',
                          'bg-emerald-500 dark:bg-emerald-500' : data.name === 'emerald',
                          'bg-teal-500 dark:bg-teal-500' : data.name === 'teal',
                          'bg-cyan-500 dark:bg-cyan-500' : data.name === 'cyan',
                          'bg-sky-500 dark:bg-sky-500' : data.name === 'sky',
                          'bg-blue-500 dark:bg-blue-500' : data.name === 'blue',
                          'bg-indigo-500 dark:bg-indigo-500' : data.name === 'indigo',
                          'bg-violet-500 dark:bg-violet-500' : data.name === 'violet',
                          'bg-purple-500 dark:bg-purple-500' : data.name === 'purple',
                          'bg-fuchsia-500 dark:bg-fuchsia-500' : data.name === 'fuchsia',
                          'bg-pink-500 dark:bg-pink-500' : data.name === 'pink',
                          'bg-rose-500 dark:bg-rose-500' : data.name === 'rose',
                          'bg-slate-500 dark:bg-slate-500' : data.name === 'slate',
                          'bg-gray-500 dark:bg-gray-500' : data.name === 'gray',
                          'bg-zinc-500 dark:bg-zinc-500' : data.name === 'zinc',
                          'bg-neutral-500 dark:bg-neutral-500' : data.name === 'neutral',
                          'bg-stone-500 dark:bg-stone-500' : data.name === 'stone'
                      }"
            ></span>
                <span>{{$color->title}}</span>
            </div>
        </x-splade-data>
        @endcell


        {{--EDIT--}}
        @cell('action', $color)
        <Link slideover
            href="{{ route('panel.product.variety.color.edit', $color) }}"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
            {{ __('Edit') }}
        </Link>
        <Link method="delete" confirm
              href="{{ route('panel.product.variety.color.destroy', $color) }}"
              class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">
            {{ __('Delete') }}
        </Link>

        @endcell
    </x-splade-table>

</x-layout.admin>
