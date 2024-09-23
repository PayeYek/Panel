<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="[
                                    'publish' => true,
                                    'pinned' => false
                                ]"
                       :action="route('panel.noticeOfSale.list.store')">
            <x-layout.panel.form.card title="New Notice">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="3">
                    <x-splade-select name="company_id" label="Company" :options="$companies" placeholder="Select an item"/>
                    <x-splade-input name="expired_at" label="Expire date" date time ltr/>
                    <x-splade-input name="circularNo" label="Circular No" required/>
                </x-layout.panel.form.division>
                <x-layout.panel.form.division>
                    <x-splade-file name="file" label="File" filepond preview
                                   max-size="2MB"
                                   required
                    />
                    <x-splade-file name="voice" label="voice" filepond preview
                                   max-size="2MB"
                    />
                    <x-splade-input name="title" label="Title" required/>
                    <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>
                    <x-splade-textarea name="description" label="Description" help="For SEO"/>
                    <x-splade-wysiwyg name="body" label="Article content" required/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create" class="mb-52"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
