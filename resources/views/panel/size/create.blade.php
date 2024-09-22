<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.product.variety.size.store')">

            <x-layout.panel.form.card title="New Size">
                <x-splade-input label="Title" name="title" class="col-span-full"/>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
