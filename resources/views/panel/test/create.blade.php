<x-layout.admin>

    <x-splade-modal close-explicitly
        {{--        :position="\App\Support\Help::isRTL() ? 'right' : 'left'"--}}
    >
        <x-splade-form confirm :action="route('panel.user.store')" class="space-y-5">

            <x-layout.panel.form.card title="title" desc="description text for all user...">


                <x-layout.panel.form.division :col="2">
                    <x-splade-input label="password" name="password" type="password"/>
                    <x-splade-input label="confirm" name="password_confirm" type="password"/>
                    <x-splade-input name="birthed_at" label="x" date time/>
                </x-layout.panel.form.division>


                <x-layout.panel.form.division :col="2">
                    <x-splade-group inline name="tags" label="Pick one or more interests c">
                        <x-splade-checkbox name="tags[]" :show-errors="false" value="laravel" label="Laravel"/>
                        <x-splade-checkbox name="tags[]" :show-errors="false" value="tailwindcss" label="Tailwind"/>
                    </x-splade-group>
                    <x-splade-group inline name="tagsx" label="Pick one or more interests">
                        <x-splade-radio name="tagsx" :show-errors="false" value="laravel" label="Laravel"/>
                        <x-splade-radio name="tagsx" :show-errors="false" value="tailwindcss" label="Tailwind"/>
                    </x-splade-group>
                </x-layout.panel.form.division>

                <x-layout.panel.form.division :col="1">
                    <x-splade-file label="Label" name="a" filepond/>
                    <x-splade-file label="Label" name="b" multiple filepond preview/>
                    <x-splade-file label="Label" name="c" filepond preview/>
                </x-layout.panel.form.division>
                <x-layout.panel.form.division :col="3">
                    <x-splade-file name="d" preview/>
                    <x-splade-file name="e" multiple/>
                    <x-splade-file name="f" :show-filename="false"/>
                    <img v-if="form.f" :src="form.$fileAsUrl('f')"/>
                </x-layout.panel.form.division>

                <x-splade-select name="country_code" choices multiple label="Choices.js">
                    <option value="ir">ایران</option>
                    <option value="be">Belgium</option>
                    <option value="nl">The Netherlands</option>
                </x-splade-select>

                <x-splade-wysiwyg class="col-span-full" name="biography" jodit="{
                            'showCharsCounter': false,
                            'showWordsCounter': false,
                            'showXPathInStatusbar': false,
                            'buttons': 'bold,italic,underline,strikethrough,ul,ol,font,fullsize',
                            }"/>

                <x-layout.panel.form.division :col="2">
                    <x-splade-input name="xxx" :label="__('User')"
                                    help="help text for this input"
                                    placeholder="Whats your name?"
                    />
                    <x-splade-input name="color"
                                    type="color"
                                    :label="__('User')"
                                    help="help text for this input"
                                    placeholder="Whats your name?"
                    />
                </x-layout.panel.form.division>

                <x-splade-submit label="Apply settings"/>

            </x-layout.panel.form.card>


        </x-splade-form>

    </x-splade-modal>

</x-layout.admin>
