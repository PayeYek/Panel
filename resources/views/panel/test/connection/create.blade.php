<x-layout.admin>

    <x-splade-modal>
        <x-splade-form :action="route('panel.application.connection.store')">

            <x-layout.panel.form.card title="New Connection">

                <x-layout.panel.form.division :col="3" class="mt-5">
                    <x-splade-select label="Operation system" name="os"
                                     :options="$os"
                                     :placeholder="__('Select an item')"/>

                    <x-splade-select label="Product" name="product_id"
                                     :options="$products"
                                     :placeholder="__('Select an item')"/>

                    <x-splade-select label="Gateway" name="gateway_id"
                                     :options="$gateways"
                                     :placeholder="__('Select an item')"/>
                </x-layout.panel.form.division>


                <x-splade-input label="Package name" name="package_name"
                                placeholder="com.domain.example" ltr/>
                <x-splade-input label="Api key" name="api_key" ltr append placeholder="Key">
                    <button @click.prevent="form.api_key = Math.floor(Math.random() * Date.now()).toString(36)"
                            type="button"
                            class="text-xs font-medium text-blue-600 underline dark:text-blue-500 hover:no-underline">
                        Generate
                    </button>
                </x-splade-input>
                <x-layout.panel.form.division :col="3" class="mt-5"
                                              title="Commodity type and pricing"
                                              desc="Please specify the type of product and its price."
                >
                    <x-splade-input label="Api version" name="api_version" type="number" min="1" ltr/>
                    <x-splade-input label="Last version code" name="last_version_code" type="number" min="1" ltr/>
                    <x-splade-input label="Force update code" name="force_update_code" type="number" min="1" ltr/>
                </x-layout.panel.form.division>


                <x-splade-group inline name="is_active" label="Status" class="col-span-full">
                    <x-splade-radio name="is_active" value="1" label="Active"/>
                    <x-splade-radio name="is_active" value="0" label="Inactive"/>
                </x-splade-group>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>


