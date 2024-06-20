@php use App\Support\Help; @endphp
<x-layout.admin>
    <x-splade-modal>

        <x-splade-form
            :default="$ad" method="put" :action="route('panel.advertise.ad.update', $ad)"
            class="space-y-5">

            <x-layout.panel.form.card title="Create Advertise">

                <x-splade-input name="title" label="Title" class="col-span-full" required/>

                <x-splade-textarea name="description" label="Description" rows="4" class="col-span-full" required/>

                <x-splade-select name="province_id" label="Province" required choices remote-url="/api/provinces"
                                 option-label="name" option-value="id" :placeholder="__('Select an item')"/>

                <x-splade-select name="city_id" label="City" required choices
                                 remote-url="`/api/provinces/${form.province_id}/cities`" option-label="name"
                                 option-value="id" :placeholder="__('Select an item')"/>

                <x-splade-select name="agreement" label="Agreement">
                    <option value="0">{{__("No")}}</option>
                    <option value="1">{{__("Yes")}}</option>
                </x-splade-select>

                <x-splade-select name="exchange" label="Changeable">
                    <option value="0">{{__("No")}}</option>
                    <option value="1">{{__("Yes")}}</option>
                </x-splade-select>

                <x-splade-input name="price" label="Price" type="number" min="0" step="1000" prepend="{{__('Toman')}}"
                                required ltr/>

                <x-splade-input name="mobile" label="Communication Mobile" required ltr
                                maxlength="10" prepend="+98" placeholder="9-- --- ----"/>

            </x-layout.panel.form.card>

            <x-layout.panel.form.card title="Images">
                <x-splade-file name="primary_image" label="Primary Image" class="col-span-full" required filepond
                               preview/>
                <x-splade-file name="more_images[]" label="More Image" class="col-span-full" filepond preview
                               multiple/>

                <x-splade-submit label="Update"/>
            </x-layout.panel.form.card>

        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
