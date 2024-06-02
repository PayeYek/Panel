<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$article" method="put" :action="route('panel.landing.article.update', $article)">
            <x-layout.panel.form.card title="Edit Article">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">
                    <x-splade-select name="land_id" label="Landing" :options="$lands" placeholder="Select an item"
                                     choices/>
                    <x-splade-select name="type" label="Type">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        <option value="blog">{{__('Blog')}}</option>
                        <option value="news">{{__('News')}}</option>
                        <option value="sell">{{__('Sell')}}</option>
                    </x-splade-select>
                </x-layout.panel.form.division>
                <x-layout.panel.form.division>
                    <x-splade-file name="image" label="Image" filepond preview
                                   max-size="2MB"
                                   required
                    />
                    <x-splade-input name="title" label="Title" required/>
                    <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>
                    <x-splade-checkbox class="text-sm" name="publish" label="{{ __('Dou you want to publish?') }}"/>
                    <x-splade-checkbox class="text-sm" name="pinned" label="{{ __('Dou you want to pin?') }}"/>
                    <x-splade-textarea name="description" label="Description" help="For SEO"/>
                    <x-splade-wysiwyg name="body" label="Article content" required/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
