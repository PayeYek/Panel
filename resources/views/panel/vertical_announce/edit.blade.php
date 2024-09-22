<x-layout.admin>
    <x-splade-modal>
        <x-splade-form
            :default="$vertical_announce" method="put"
            :action="route('panel.vertical_announce.update', $vertical_announce)"
            class="space-y-5">

            <x-layout.panel.form.card title="Edit Announce">

                <x-layout.panel.form.alerts/>

                <x-splade-input name="title" label="Title" required/>

                <x-splade-select name="status" label="State">
                    <option value="0">{{__("Inactive")}}</option>
                    <option value="1">{{__("Active")}}</option>
                </x-splade-select>

                <x-splade-input name="link" label="Link" class="col-span-full" ltr placeholder="https://sample.com" required/>

            </x-layout.panel.form.card>

            <x-layout.panel.form.card title="Images">
                <x-splade-file name="desktop" label="Desktop image" class="col-span-full" required filepond
                               preview/>
                <x-splade-file name="tablet" label="Tablet image" class="col-span-full" required filepond
                               preview/>
                <x-splade-file name="mobile" label="Mobile image" class="col-span-full" required filepond
                               preview/>

                <x-splade-submit label="Update"/>
            </x-layout.panel.form.card>

        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
