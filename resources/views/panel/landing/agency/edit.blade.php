<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$agency" method="put" :action="route('panel.landing.agency.update', $agency)">
            <x-layout.panel.form.card title="Edit Agency">

                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">
                    <x-splade-select name="land_id" label="Landing" :options="$lands" placeholder="Select an item"
                                     choices/>
                    <x-splade-select name="province_id" label="Province" choices remote-url="/api/provinces"
                                     option-label="name" option-value="id" :placeholder="__('Select an item')"/>
                    <x-splade-select name="city_id" label="City" choices
                                     remote-url="`/api/provinces/${form.province_id}/cities`" option-label="name"
                                     option-value="id" :placeholder="__('Select an item')"/>

                    <x-splade-select name="types" label="Type" multiple choices="{ searchEnabled: false }">
                        <option value="service">{{__('After sell service')}}</option>
                        <option value="sell">{{__('Sales representative')}}</option>
                    </x-splade-select>
                </x-layout.panel.form.division>
                <x-splade-input name="code" label="Agent code" ltr/>
                <x-splade-input name="name" label="Title"/>
                <x-splade-input name="manager" label="Manager"/>

                <x-layout.panel.form.division>
                    <x-splade-input name="address" label="Address"/>
                    <x-splade-input name="location" label="Navigation on the map" ltr placeholder="https://simple-map-link/"/>
                </x-layout.panel.form.division>
                <x-splade-input name="telephones[0]" label="Telephone Master" ltr/>
                <x-splade-input name="telephones[1]" label="Telephone 2" ltr/>
                <x-splade-input name="telephones[2]" label="Telephone 3" ltr/>
                <x-layout.panel.form.division>
                    <x-splade-wysiwyg name="description" label="Description"/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
