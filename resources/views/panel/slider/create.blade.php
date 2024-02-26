<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.marketing.slider.store')"
                       :default="['status' => 1, 'address'=>'', 'link'=>'https://niyaze.com/product']"
        >

            <x-layout.panel.form.card title="New Slide">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division col="1">

                    <x-splade-file name="background" label="Banner" filepond preview
{{--                                   :min-resolution="1536 * 720"--}}
                                   max-size="2MB"
                                   required
                    />

                    <x-splade-input name="title" label="Title" required/>


                    <x-splade-select name="address" label="Common links"
                                     @change="form.link = form.address"
                                     :options="\App\Support\Help::commonLinks()"
                                     :placeholder="__('Select an item')"/>

                    <x-splade-input name="link" label="Link" required ltr/>

                    <x-splade-textarea name="description" label="Description" autosize rows="4"/>

                    {{--STATUS--}}
                    <x-splade-group name="status" label="Status" inline required>
                        <x-splade-radio name="status" value="0" label="Invisible"/>
                        <x-splade-radio name="status" value="1" label="Visible"/>
                    </x-splade-group>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
