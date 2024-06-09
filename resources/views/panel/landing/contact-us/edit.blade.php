<x-layout.admin>
    <x-splade-modal>
        <x-splade-form :default="$contact"
                       method="put"
                       :action="route('panel.landing.contact.update', $contact)">
            <x-layout.panel.form.card title="Edit Contact Info">
                <x-layout.panel.form.alerts/>

                <x-layout.panel.form.division>

                    <x-splade-select required name="state" label="State">
                        <option value="" disabled>{{__('Select an item')}}</option>
                        @foreach($states as $state)
                            <option value="{{ $state }}">{{ __($state->value) }}</option>
                        @endforeach
                    </x-splade-select>
                    <x-splade-textarea rows="4" name="note" label="Note"
                                       help="در صورت نیاز می توانید برای این درخواست یک یادداشت ثبت کنید."/>
                    <x-splade-textarea disabled rows="4" name="message" label="Message"/>

                </x-layout.panel.form.division>

                <x-layout.panel.form.division :col="3">

                    <x-splade-select name="land" label="Land" disabled>
                        <option value="" disabled>{{ $landTitle }}</option>
                    </x-splade-select>
                    <x-splade-input name="name" label="Full name" disabled/>
                    <x-splade-input name="phone" label="Phone" disabled/>

                </x-layout.panel.form.division>

                <x-splade-submit label="Update"/>

            </x-layout.panel.form.card>
        </x-splade-form>
    </x-splade-modal>
</x-layout.admin>
