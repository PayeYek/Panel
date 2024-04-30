<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$product" method="put" :action="route('panel.landing.product.product.update', $product)">
            <x-layout.panel.form.card title="Edit Product">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>
                    <x-splade-file name="image" label="Image" filepond preview
                                   max-size="2MB"
                                   required
                    />
                    <x-splade-file name="pictures[]" label="More Pictures" filepond preview multiple
                                   max-size="2MB"
                    />
                </x-layout.panel.form.division>

                <x-splade-select name="land_id" label="Landing" :options="$lands" placeholder="Select an item"
                                 choices/>
                <x-splade-select name="brand_id" label="Brand" :options="$brands" placeholder="Select an item"
                                 choices/>
                <x-splade-select name="category_id" label="Type" :options="$categories" placeholder="Select an item"
                                 choices/>

                <x-splade-select name="axle" label="Number of wheel axles">
                    <option value="1">{{__('Single axle')}}</option>
                    <option value="2">{{__('Pair axle')}}</option>
                    <option value="3">{{__('Triple axle')}}</option>
                    <option value="3">{{__('Four axle')}}</option>
                    <option value="3">{{__('Five axle')}}</option>
                </x-splade-select>

                <x-splade-select name="usage" label="Type of Use">
                    <option value="{{__('Bari')}}">{{__('Bari')}}</option>
                    <option value="{{__('Keshandeh')}}">{{__('Keshandeh')}}</option>
                    <option value="{{__('Kompresi')}}">{{__('Kompresi')}}</option>
                    <option value="{{__('Yakhchali')}}">{{__('Yakhchali')}}</option>
                    <option value="{{__('Atashneshani')}}">{{__('Atashneshani')}}</option>
                    <option value="{{__('Chadori')}}">{{__('Chadori')}}</option>
                    <option value="{{__('Tanker')}}">{{__('Tanker')}}</option>
                    <option value="{{__('Kafi')}}">{{__('Kafi')}}</option>
                    <option value="{{__('Tigheh')}}">{{__('Tigheh')}}</option>
                    <option value="{{__('OtagheIzolehMosaghafFelezi')}}">{{__('OtagheIzolehMosaghafFelezi')}}</option>
                    <option value="{{__('OtagheIzolehMosaghafChadori')}}">{{__('OtagheIzolehMosaghafChadori')}}</option>
                    <option value="{{__('OtagheIzolehYakhchaldar')}}">{{__('OtagheIzolehYakhchaldar')}}</option>
                </x-splade-select>

                <x-splade-select name="cabin" label="Cabin type">
                    <option value="1">{{__('Has a sleeping cabin')}}</option>
                    <option value="0">{{__('No sleeping cabin')}}</option>
                    <option value="">{{__('No cabin')}}</option>
                </x-splade-select>

                <x-splade-input name="tonnage" label="Tonnage"/>

                <x-splade-select name="colors[]" label="Colors" :options="$colors"
                                 placeholder="{{__('Select an item')}}"
                                 multiple choices/>

                <x-splade-input ltr name="model" label="Model"/>
                <x-splade-input ltr name="year" label="Year"/>
                <x-layout.panel.form.division :col="2">
                    <x-splade-input name="name" label="Name" required/>
                    <x-splade-input ltr name="slug" label="Slug" help="Exclusive name in English"/>
                </x-layout.panel.form.division>
                <x-layout.panel.form.division>
                    <x-splade-textarea name="description" label="Description" help="For SEO"/>
                    <x-splade-wysiwyg name="body" label="Product content"/>

                    <x-splade-file name="catalog" label="Catalog" filepond/>
                    <x-splade-file name="manual" label="Manual" filepond/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
