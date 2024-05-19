<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.ad.advertise.store')" :default="[]">

            <x-layout.panel.form.card title="Create Advertise">

                <x-splade-input label="Title" name="title" class="col-span-full"/>

                <x-splade-textarea label="Description" name="description" class="col-span-full" rows="4"/>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>

        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
