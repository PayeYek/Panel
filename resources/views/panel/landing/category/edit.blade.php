<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$category" method="put" :action="route('panel.landing.category.update', $category)">
            <x-layout.panel.form.card title="Edit Category">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>

                    <x-splade-input name="title" label="Title" required/>
                    <x-splade-input name="slug" label="Slug"/>
                    <x-splade-textarea name="description" label="Description"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
