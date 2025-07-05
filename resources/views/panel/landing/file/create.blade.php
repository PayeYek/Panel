<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.file.store')">
            <x-layout.panel.form.card title="New File">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>
                    <x-splade-file name="file[]" label="File"
                                   filepond
                                   preview
                                   multiple
                                   max-size="5MB"
                    />
                </x-layout.panel.form.division>
                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
