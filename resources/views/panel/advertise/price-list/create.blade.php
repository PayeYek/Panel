<x-layout.admin>
    <x-splade-modal>
        <x-splade-form
            :action="route('panel.priceList.store')">

            <x-layout.panel.form.card title="Create">

                <x-splade-input required label="Product name" name="product_name" class="col-span-full"/>
                <x-layout.panel.form.division :col="3">
                    <x-splade-select name="category_id" label="Category" >
                        <option value="">{{ __('Other') }}</option>
                        @foreach(\App\Models\Category::whereNull('parent_id')->get() as $ground)
                            @foreach($ground->children as $parent)
                                <optgroup label="{{$parent->title}}">
                                    @foreach($parent->children as $child)
                                        <option value="{{ $child->id }}">{{ $child->title }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        @endforeach
                    </x-splade-select>
                    <x-splade-input name="production_year"  label="Production year" type="number" min="0" ltr/>
                    <x-splade-input name="price" label="Price" type="number" min="0" prepend="{{__('Toman')}}"
                                    required ltr/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>
            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
