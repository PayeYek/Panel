<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.product.store')">
            <x-layout.panel.form.card title="New Product">

                <x-layout.panel.form.alerts/>

                <x-splade-select name="land_id" label="Landing" :options="$lands" placeholder="Select an item"
                                 choices/>
                <x-splade-select name="brand_id" label="Brand" :options="$brands" placeholder="Select an item"
                                 choices/>
                <x-splade-select name="category_id" label="Type" :options="$categories" placeholder="Select an item"
                                 choices/>
                <x-splade-select name="colors[]" label="Colors" :options="$colors" placeholder="Select an item"
                                 multiple choices/>

                <x-layout.panel.form.division>
                    <x-splade-file name="image" label="Image" filepond preview
                                   max-size="2MB"
                                   required
                    />
                </x-layout.panel.form.division>
                <x-splade-input name="name" label="Name" required/>
                <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>
                <x-splade-input ltr name="model" label="Model" required/>
                <x-splade-input ltr name="year" label="Year" required/>
                <x-layout.panel.form.division>
                    <x-splade-textarea name="description" label="Description" help="For SEO"/>
                    <x-splade-wysiwyg name="body" label="Product content"/>

                    <x-splade-file name="catalog" label="Catalog" filepond/>
                    <x-splade-file name="manual" label="Manual" filepond/>

                </x-layout.panel.form.division>

                {{-- TODO: MORE PICs--}}
                {{-- TODO: ATTIRBUTE--}}

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
