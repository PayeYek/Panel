<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.product.attribute.store')">
            <x-layout.panel.form.card title="New Attribute">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>

                    <x-splade-select name="parent_id" label="Parent" :options="$attributes" choices/>
                    <x-splade-input name="name" label="Name"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
