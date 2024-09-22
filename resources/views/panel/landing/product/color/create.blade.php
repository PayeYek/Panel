<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.product.color.store')">

            <x-layout.panel.form.card title="New Color">
                <x-splade-input label="Title" name="title"/>
                <div class="flex gap-4">
                    <x-splade-select label="Color selection" name="name" :options="\App\Support\Help::colors()" required placeholder="Select an item" class="flex-1"/>
                    <span class="h-10 w-10 rounded-md border border-dashed border-body shrink-0 mt-7"
                          :class="{
                          'bg-none-color' : form.name === 'none',
                          'bg-multi-color' : form.name === 'multi',
                          'bg-black' : form.name === 'black',
                          'bg-white' : form.name === 'white',
                          'bg-red-500 dark:bg-red-500' : form.name === 'red',
                          'bg-orange-500 dark:bg-orange-500' : form.name === 'orange',
                          'bg-amber-500 dark:bg-amber-500' : form.name === 'amber',
                          'bg-yellow-500 dark:bg-yellow-500' : form.name === 'yellow',
                          'bg-lime-500 dark:bg-lime-500' : form.name === 'lime',
                          'bg-green-500 dark:bg-green-500' : form.name === 'green',
                          'bg-emerald-500 dark:bg-emerald-500' : form.name === 'emerald',
                          'bg-teal-500 dark:bg-teal-500' : form.name === 'teal',
                          'bg-cyan-500 dark:bg-cyan-500' : form.name === 'cyan',
                          'bg-sky-500 dark:bg-sky-500' : form.name === 'sky',
                          'bg-blue-500 dark:bg-blue-500' : form.name === 'blue',
                          'bg-indigo-500 dark:bg-indigo-500' : form.name === 'indigo',
                          'bg-violet-500 dark:bg-violet-500' : form.name === 'violet',
                          'bg-purple-500 dark:bg-purple-500' : form.name === 'purple',
                          'bg-fuchsia-500 dark:bg-fuchsia-500' : form.name === 'fuchsia',
                          'bg-pink-500 dark:bg-pink-500' : form.name === 'pink',
                          'bg-rose-500 dark:bg-rose-500' : form.name === 'rose',
                          'bg-slate-500 dark:bg-slate-500' : form.name === 'slate',
                          'bg-gray-500 dark:bg-gray-500' : form.name === 'gray',
                          'bg-zinc-500 dark:bg-zinc-500' : form.name === 'zinc',
                          'bg-neutral-500 dark:bg-neutral-500' : form.name === 'neutral',
                          'bg-stone-500 dark:bg-stone-500' : form.name === 'stone'
                          }"
                    ></span>
                </div>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
