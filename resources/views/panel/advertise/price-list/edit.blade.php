@php use App\Support\Help; @endphp
<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$priceList" method="put" :action="route('panel.ad.priceList.update', $priceList)">

            <x-layout.panel.form.card title="Update Price List">

                <x-splade-input required label="Product name" name="product_name" class="col-span-full"/>
                <x-splade-select required label="Category" name="category_id" class="col-span-full">
                    @foreach($landCategories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                </x-splade-select>
                <x-splade-input label="Production year" name="production_year" class="col-span-full"/>
                <x-splade-input help="برحسب تومان" required ltr label="Price" name="price" type="number"
                                class="col-span-full"/>

                <x-splade-submit label="Update"/>
            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
