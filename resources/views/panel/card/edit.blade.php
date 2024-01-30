<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$card" method="put" :action="route('panel.marketing.card.update', $card)">

            <x-layout.panel.form.card title="Edit Card">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division col="1">

                    {{--TYPE--}}
                    <x-splade-group name="type" label="Type" inline required>
                        <x-splade-radio name="type" value="0" label="Rectangle"  :checked="$card->type == 0"/>
                        <x-splade-radio name="type" value="1" label="Circle"  :checked="$card->type == 1"/>
                    </x-splade-group>

                    <x-splade-input name="title" label="Title" required/>


                    <x-splade-select name="address" label="Common links"
                                     @change="form.link = form.address"
                                     :options="\App\Support\Help::commonLinks()"
                                     :placeholder="__('Select an item')"/>

                    <x-splade-input name="link" label="Link" required ltr/>

                    <div
                        v-bind:class="form.type == 1 ? 'hidden' : 'col-span-full grid gap-5 group-[.is-modal]/modal:!grid-cols-1' ">
                        <x-splade-textarea name="description" label="Description" autosize rows="4"/>
                    </div>

                    <x-splade-file name="image" label="Image" filepond preview
                                   :resolution="512 * 512"
                                   help="Must be 512x512 pixels."
                                   max-size="2MB"
                    />

                    <div
                        v-bind:class="form.type == 1 ? 'hidden' : 'col-span-full grid gap-5 group-[.is-modal]/modal:!grid-cols-1' ">

                        <div class="flex gap-4">
                            <x-splade-select label="Color selection" name="theme" :options="\App\Support\Help::colors()"
                                             placeholder="Select an item" class="flex-1"/>
                            <span class="h-10 w-10 rounded-md border border-dashed border-body shrink-0 mt-7"
                                  :class="{
                          'bg-none-color' : form.theme === 'none',
                          'bg-multi-color' : form.theme === 'multi',
                          'bg-black' : form.theme === 'black',
                          'bg-white' : form.theme === 'white',
                          'bg-red-500 dark:bg-red-500' : form.theme === 'red',
                          'bg-orange-500 dark:bg-orange-500' : form.theme === 'orange',
                          'bg-amber-500 dark:bg-amber-500' : form.theme === 'amber',
                          'bg-yellow-500 dark:bg-yellow-500' : form.theme === 'yellow',
                          'bg-lime-500 dark:bg-lime-500' : form.theme === 'lime',
                          'bg-green-500 dark:bg-green-500' : form.theme === 'green',
                          'bg-emerald-500 dark:bg-emerald-500' : form.theme === 'emerald',
                          'bg-teal-500 dark:bg-teal-500' : form.theme === 'teal',
                          'bg-cyan-500 dark:bg-cyan-500' : form.theme === 'cyan',
                          'bg-sky-500 dark:bg-sky-500' : form.theme === 'sky',
                          'bg-blue-500 dark:bg-blue-500' : form.theme === 'blue',
                          'bg-indigo-500 dark:bg-indigo-500' : form.theme === 'indigo',
                          'bg-violet-500 dark:bg-violet-500' : form.theme === 'violet',
                          'bg-purple-500 dark:bg-purple-500' : form.theme === 'purple',
                          'bg-fuchsia-500 dark:bg-fuchsia-500' : form.theme === 'fuchsia',
                          'bg-pink-500 dark:bg-pink-500' : form.theme === 'pink',
                          'bg-rose-500 dark:bg-rose-500' : form.theme === 'rose',
                          'bg-slate-500 dark:bg-slate-500' : form.theme === 'slate',
                          'bg-gray-500 dark:bg-gray-500' : form.theme === 'gray',
                          'bg-zinc-500 dark:bg-zinc-500' : form.theme === 'zinc',
                          'bg-neutral-500 dark:bg-neutral-500' : form.theme === 'neutral',
                          'bg-stone-500 dark:bg-stone-500' : form.theme === 'stone'
                          }"
                            ></span>
                        </div>

                        <x-splade-input name="button" label="Button text"/>

                        <x-splade-file name="background" label="Image background" filepond preview
                                       :min-resolution="1536 * 720"
                                       max-size="2MB"
                                       help="Must be 1536x720 pixels."
                        />
                    </div>
                    {{--STATUS--}}
                    <x-splade-group name="status" label="Status" inline required>
                        <x-splade-radio name="status" value="0" label="Invisible" :checked="$card->status == 0"/>
                        <x-splade-radio name="status" value="1" label="Visible"   :checked="$card->status == 1"/>
                    </x-splade-group>


                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
