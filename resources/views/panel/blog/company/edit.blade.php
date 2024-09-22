<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$company" method="put" :action="route('panel.blog.company.update', $company)">
            <x-layout.panel.form.card title="Edit Company">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>
                    <x-splade-file name="logo" label="Logo" filepond preview
                                   max-size="2MB"
                    />
                    <x-splade-input name="title" label="Title"/>

                    <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
