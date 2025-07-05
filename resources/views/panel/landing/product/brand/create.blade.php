<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :action="route('panel.landing.product.brand.store')">
            <x-layout.panel.form.card title="New Brand">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>
                    <x-splade-file name="image" label="Logo" filepond preview
                                   max-size="2MB"
                    />
                    <x-splade-input ltr name="title" label="Title"  help="in English" required/>
                    <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>
                    <x-splade-select name="country" label="Country" choices="{ searchEnabled: true }">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        <option value="Finland">{{__('Finland')}}</option>
                        <option value="SouthKorea">{{__('South Korea')}}</option>
                        <option value="Russia">{{__('Russia')}}</option>
                        <option value="France">{{__('France')}}</option>
                        <option value="Japan">{{__('Japan')}}</option>
                        <option value="China">{{__('China')}}</option>
                        <option value="Germany">{{__('Germany')}}</option>
                        <option value="Sweden">{{__('Sweden')}}</option>
                        <option value="Netherlands">{{__('Netherlands')}}</option>
                        <option value="Italy">{{__('Italy')}}</option>
                        <option value="Iran">{{__('Iran')}}</option>
                    </x-splade-select>
                    <x-splade-textarea name="description" label="Description" help="For SEO"/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
