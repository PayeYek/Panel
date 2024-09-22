<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.advertise.category.store')">
            <x-layout.panel.form.card title="New Category">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>

                    <x-splade-select name="parent_id" label="Parent" :options="$categories" choices/>
                    <x-splade-input name="title" label="Title"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
