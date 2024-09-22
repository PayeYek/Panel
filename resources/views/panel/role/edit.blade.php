<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="[
        'name' => $role->name,
         'permissions' => $role->permissions->pluck('id')->toArray()
         ]"
                       method="put" :action="route('panel.role.update', $role)">
            <x-layout.panel.form.card title="Edit Role">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="1">
                    <x-splade-input name="name" label="Name"/>
                    <x-splade-select name="permissions[]" label="Permissions" :options="$permissions" multiple choices/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Update" class="mb-52"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
