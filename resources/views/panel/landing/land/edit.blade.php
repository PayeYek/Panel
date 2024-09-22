<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$land" method="put" :action="route('panel.landing.land.update', $land)">
            <x-layout.panel.form.card title="Edit Landing">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>
                    <x-splade-file name="logo" label="Logo" filepond preview
                                   max-size="2MB"
                    />
                    <x-splade-file name="logo_origin" label="Logo origin" filepond preview
                                   max-size="2MB"
                    />
                    <x-splade-input name="title" label="Title"/>

                    <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>

                    <x-splade-textarea name="description" label="Description" help="For SEO and footer descriptions"/>

                    <x-splade-wysiwyg name="body" label="About us page content"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
