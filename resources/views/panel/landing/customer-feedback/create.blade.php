<x-layout.admin>
    <x-splade-modal>
        <x-splade-form
            :action="route('panel.landing.customer-feedback.store')"
        >

            <x-layout.panel.form.card title="New Feedback">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division :col="2">
                    <x-splade-select required name="land_id" label="Landing" :options="$lands" placeholder="Select an item"
                                     choices/>
                    <x-splade-input name="title" label="Title"/>
                    <x-splade-input name="description" label="Description"/>
                    <x-splade-select required name="gender" label="Gender">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        @if($genderTypes)
                            @foreach($genderTypes as $gender)
                                <option value="{{ $gender['id'] }}">{{ $gender['label'] }}</option>
                            @endforeach
                        @endif
                    </x-splade-select>
                    <x-splade-input required name="first_name" label="Name"/>
                    <x-splade-input required name="last_name" label="Family"/>
                    <x-splade-input required name="city" label="City"/>
                    <x-splade-input required name="purchased_product" label="Purchased Product"/>
                    <x-splade-file name="image" label="Image" filepond preview
                                   max-size="2MB"
                                   required
                                   help="ابعاد عکس باید 284 در 400 باشد"
                    />
                    <x-splade-textarea name="video" label="Video script code" required ltr/>
                    <x-splade-input help="کمترین عدد اولویت بالاتری جهت نمایش دارد" name="priority" label="Order of display" type="number" min="0" required/>
                </x-layout.panel.form.division>

                <x-splade-submit label="Create"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>

</x-layout.admin>
