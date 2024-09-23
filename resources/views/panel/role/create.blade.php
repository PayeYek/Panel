<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.role.store')">
            <x-layout.panel.form.card title="New Role">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="1">
                    <x-splade-input name="name" label="Name"/>
                    <x-splade-select label="Permissions" name="permissions[]" option-value="id" :options="$permissions"
                                     choices multiple class="col-span-full"/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create" class="mb-52"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
