<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$facility"
                       method="put"
                       :action="route('panel.landing.facility.update', $facility)">
            <x-layout.panel.form.card title="Edit Facility Request">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>

                    <x-splade-textarea rows="4" name="comment" label="Comment"/>

                </x-layout.panel.form.division>

                <x-layout.panel.form.division :col="3">

                    <x-splade-select name="state" label="State">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        @foreach($states as $state)
                            <option value="{{ $state }}">{{ __($state->value) }}</option>
                        @endforeach
                    </x-splade-select>
                    <x-splade-select name="land" label="Land" disabled>
                        <option value="" disabled>{{ $landTitle }}</option>
                    </x-splade-select>
                    <x-splade-select name="category" label="Request" disabled>
                        <option value="" disabled>{{ $categoryTitle }}</option>
                    </x-splade-select>
                    <x-splade-input name="full_name" label="Full name" disabled/>
                    <x-splade-input name="phone" label="Phone" disabled/>
                    <x-splade-input name="amount" label="Amount" disabled/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
