<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.brand.store')">
            <x-layout.panel.form.card title="New Brand">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>
                    <x-splade-file name="image" label="Logo" filepond preview
                                   max-size="2MB"
                    />
                    <x-splade-input ltr name="title" label="Title"  help="in English" required/>
                    <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>
                    <x-splade-select name="country" label="Country" choices="{ searchEnabled: false }">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        <option value="{{__('Germany')}}">{{__('Germany')}}</option>
                        <option value="{{__('Sweden')}}">{{__('Sweden')}}</option>
                        <option value="{{__('Netherlands')}}">{{__('Netherlands')}}</option>
                        <option value="{{__('Italy')}}">{{__('Italy')}}</option>
                        <option value="{{__('China')}}">{{__('China')}}</option>
                    </x-splade-select>
                    <x-splade-textarea name="description" label="Description" help="For SEO"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
