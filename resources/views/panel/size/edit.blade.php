<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$size" method="put" :action="route('panel.product.variety.size.update', $size)">

            <x-layout.panel.form.card title="Edit Size">
                <x-splade-input label="Title" name="title" class="col-span-full"/>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
