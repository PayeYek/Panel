<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$permission" method="put" :action="route('panel.permission.update', $permission)">
            <x-layout.panel.form.card title="Edit Permission">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="1">
                    <x-splade-input name="name" label="Name"/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
