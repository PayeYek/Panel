<x-layout.admin>

    <x-splade-modal>
        <x-splade-form :default="$commodity" method="put"
                       :action="route('panel.application.commodity.update', $commodity)">

            <x-layout.panel.form.card title="Edit Commodity">

                <x-layout.panel.form.division :col="1">
                    <x-splade-input label="Title" name="title"/>
                    <x-splade-textarea label="Description" name="description" autosize/>
                </x-layout.panel.form.division>

                <x-layout.panel.form.division :col="3" class="mt-5"
                                              title="Specifications"
                                              desc="Please specify, through which product (application) and through which portal (store) the above commodity is available."
                >
                    <x-splade-select label="Product" name="product_id"
                                     :options="$products"
                                     :placeholder="__('Select an item')"/>

                    <x-splade-select label="Gateway" name="gateway_id"
                                     :options="$gateways"
                                     :placeholder="__('Select an item')"/>

                    <x-splade-input label="SKU" name="sku" :help="__('Unique ID of the commodity in the store')"/>
                </x-layout.panel.form.division>

                <x-layout.panel.form.division :col="2" class="mt-5"
                                              title="Commodity type and pricing"
                                              desc="Please specify the type of product and its price."
                >
                    <x-splade-select label="Type" name="type" @change="form.type!=2 ? (form.day=0) : null">
                        <option disabled value>{{__('Select an item')}}</option>
                        @foreach($types as $key=> $value)
                            <option
                                value="{{$key}}" @selected( old('type') == $key )>{{$value}}</option>
                        @endforeach
                    </x-splade-select>

                    <x-splade-select label="Subscription period" name="day"
                                     v-bind:disabled="form.type!=2"
                    >
                        <option disabled value="0">{{__('Select an item')}}</option>
                        @foreach($periods as $key=> $value)
                            <option
                                value="{{$key}}" @selected( old('type') == $key )>{{$value}}</option>
                        @endforeach
                    </x-splade-select>

{{--                    <x-splade-select label="Subscription period" name="subscription_period"--}}
{{--                                     v-bind:disabled="form.type!=2"--}}
{{--                                     :options="$periods"--}}
{{--                                     :placeholder="__('Select an item')"/>--}}

{{--                    <input name="day" type="hidden" v-bind:value="form.type!=2 ? form.day : form.period"/>--}}

                    <x-splade-input name="price" :label="__('Price')" type="number" min="0"/>

                    <x-splade-select label="Currency" name="currency"
                                     :options="$currencies"
                                     :placeholder="__('Select an item')"/>
                </x-layout.panel.form.division>

                <x-layout.panel.form.division :col="2" class="mt-5"
                                              title="Additives"
                                              desc="These are items that are added to a user's account or wallet."
                >
                    <x-splade-input name="coin" :label="__('Coin')" type="number" min="0"/>
                    <x-splade-input name="booster" :label="__('Booster')" type="number" min="0"/>
                </x-layout.panel.form.division>

                <x-splade-group inline name="is_visible" label="Publicly available">
                    <x-splade-radio name="is_visible" value="1" label="Active"/>
                    <x-splade-radio name="is_visible" value="0" label="Inactive"/>
                </x-splade-group>

                <x-splade-group inline name="is_active" label="Status">
                    <x-splade-radio name="is_active" value="1" label="Active"/>
                    <x-splade-radio name="is_active" value="0" label="Inactive"/>
                </x-splade-group>

                <x-splade-submit label="Update"/>
            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
