<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.permission.store')">
            <x-layout.panel.form.card title="New Permission">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="1">
                    <x-splade-input name="name" label="Name"/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
