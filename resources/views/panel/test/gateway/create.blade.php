<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.application.gateway.store')">

            <x-layout.panel.form.card title="New Gateway">
                <x-splade-input label="Title" name="title" class="col-span-full"/>
                <x-layout.panel.form.division :col="2">
                    <x-splade-input label="Access token" name="access_token"/>
                    <x-splade-input label="Refresh code" name="refresh_code"/>
                    <x-splade-input label="Code" name="code"/>
                    <x-splade-input label="Client id" name="client_id"/>
                    <x-splade-input label="Client secret" name="client_secret"/>
                    <x-splade-input label="Redirect uri" name="redirect_uri"/>
                </x-layout.panel.form.division>

                <x-splade-group inline name="status" label="Status" class="col-span-full">
                    <x-splade-radio name="status" value="1" label="Active"/>
                    <x-splade-radio name="status" value="0" label="Inactive"/>
                </x-splade-group>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
