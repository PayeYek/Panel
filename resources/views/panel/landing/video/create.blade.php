<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.video.store')"
                       :default="['status' => 1]">
            <x-layout.panel.form.card title="New Video">

                <x-layout.panel.form.alerts/>
                {{--
                    'published_at',
                    'expired_at',
                    --}}
                <x-layout.panel.form.division>
                    <x-splade-select name="land_id" label="Landing" :options="$lands" placeholder="Select an item"
                                     choices/>
                    <x-splade-select name="product_id" label="Product"
                                     remote-url="`/api/land/${form.land_id}/products`"
                                     placeholder="Select an item"
                                     choices/>
                    <x-splade-input name="alt" label="Title" required/>
                    <x-splade-textarea name="link" label="Script code" required ltr/>

                    <x-splade-file name="image" label="Image" filepond preview
                                   max-size="2MB"
                    />

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
