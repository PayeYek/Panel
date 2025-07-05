<x-layout.admin>

    <x-splade-modal>
        <x-splade-form :action="route('panel.application.product.store')">

            <x-layout.panel.form.card title="New Product">

                <x-layout.panel.form.division :col="1">
                    <x-splade-input label="Title" name="title"/>
                    <x-splade-textarea label="Description" name="description" autosize/>
                    <x-splade-group inline name="status" label="Status">
                        <x-splade-radio name="status" value="1" label="Active"/>
                        <x-splade-radio name="status" value="0" label="Inactive"/>
                    </x-splade-group>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
