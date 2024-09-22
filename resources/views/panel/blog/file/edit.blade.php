<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$file" method="put" :action="route('panel.blog.file.update', $file)">
            <x-layout.panel.form.card title="Edit File">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>
                    <x-splade-input name="name" label="Name"/>
                    <x-splade-file name="path" label="File"
                                   filepond
                                   preview
                                   max-size="5MB"
                    />
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
