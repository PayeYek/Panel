<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$article" method="put" :action="route('panel.blog.article.update', $article)">
            <x-layout.panel.form.card title="Edit Article">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="3">
                    <x-splade-select name="company_id" label="Company" :options="$companies" placeholder="Select an item"/>
                    <x-splade-select name="type" label="Type">
                        <option value="" disabled>{{__('Select an item')}}</option>
{{--                        <option value="blog">{{__('Blog')}}</option>--}}
                        <option value="news">{{__('News')}}</option>
                        <option value="sell">{{__('Sell')}}</option>
                    </x-splade-select>
                    <x-splade-input name="expired_at" label="Expire date" date time ltr/>
                </x-layout.panel.form.division>
                <x-layout.panel.form.division>
                    <x-splade-file name="image" label="Image" filepond preview
                                   max-size="2MB"
                                   required
                    />
                    <x-splade-input name="title" label="Title" required/>
                    <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>
                    <x-splade-textarea name="description" label="Description" help="For SEO"/>
                    <x-splade-input ltr name="voice" label="فایل صوتی"/>
                    <x-splade-wysiwyg name="body" label="Article content" required/>

                    {{--                    <x-layout.panel.form.divider text="Publish setting"/>--}}

                    {{--                    <x-splade-input--}}
                    {{--                        help="جهت زمان بندی انتشار مقاله تاریخ را وارد کنید. در صورتی که می خواهید مقاله به صورت آنی منتظر شود کافیست تیک گزینه انتشار داده شود را بزنید. "--}}
                    {{--                        label="Release schedule"--}}
                    {{--                        name="published_at" date time ltr/>--}}
                    {{--                    <x-splade-checkbox--}}
                    {{--                        help="جهت انتشار مقالات (انتشار آنی یا زمانبندی شده) می بایست تیک گزینه >>انتشار داده شود<< فعال باشد."--}}
                    {{--                        class="text-sm" name="publish" label="{{ __('Dou you want to publish?') }}"/>--}}
                    {{--                    <x-splade-checkbox class="text-sm" name="pinned" label="{{ __('Dou you want to pin?') }}"/>--}}

                </x-layout.panel.form.division>

                <x-splade-submit label="Update" class="mb-52"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
